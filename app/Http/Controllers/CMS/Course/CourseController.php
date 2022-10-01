<?php

namespace App\Http\Controllers\CMS\Course;

use App\Http\Controllers\Course\CourseBrowseController;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Support\Response\Json;
use Illuminate\Support\Facades\Hash;
use App\Support\Generate\Hash as KeyGenerator;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use App\Models\Section;
use App\Models\Lecture;
use App\Models\UserLecture;
use App\Models\Document;
use App\Models\Exercise;



use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function Home(Request $request)
    {
        $TableKey = 'course-table';

        $filter_search = $request->input('filter_search');

        if (isset($request['course-table-show'])) {
            $selected = $request['course-table-show'];
        }
        else {
            $selected = 10;
        }

        $options = array(5,10,15,20);
        $Course = CourseBrowseController::FetchBrowse($request)
            ->where('take',  $selected)
            ->where('with.total', 'true');

        if (isset($filter_search)) {
            $Course = $Course->where('search', $filter_search);
        }

        $Course = $Course->middleware(function($fetch) use($request, $TableKey) {
                $fetch->equal('skip', ___TableGetSkip($request, $TableKey, $fetch->QueryRoute->ArrQuery->take));
                return $fetch;
            })
            ->get('fetch');

        $Take = ___TableGetTake($request, $TableKey);
        $DataTable = [
            'key' => $TableKey,
            'filter_search' => $filter_search,
            'placeholder_search' => "",
            'pageNow' => ___TableGetCurrentPage($request, $TableKey),
            'paginate' => ___TablePaginate((int)$Course['total'], (int)$Course['query']->take, ___TableGetCurrentPage($request, $TableKey)),
            'selected' => $selected,
            'options' => $options,
            'heads' => [
                (object)['name' => 'No', 'label' => 'No'],
                (object)['name' => 'name', 'label' => 'Nama Course'],
                (object)['name' => 'created_at', 'label' => 'Terbuat Pada'],
                (object)['name' => 'action', 'label' => 'Aksi']
            ],
            'records' => []
        ];

        if ($Course['records']) {
            $DataTable['records'] = $Course['records'];
            $DataTable['total'] = $Course['total'];
            $DataTable['show'] = $Course['show'];
        }

        $ParseData = [
            'data' => $DataTable,
            'result_total' => isset($DataTable['total']) ? $DataTable['total'] : 0
        ];
        return view('app.cms.course.home.index', $ParseData);
    }

    public function New(Request $request)
    {
        return view('app.cms.course.new.index', [
            'select' => [],
        ]);
    }

    public function Detail(Request $request, $id)
    {
        $QueryRoute = QueryRoute($request);
        $QueryRoute->ArrQuery->id = $id;
        $QueryRoute->ArrQuery->set = 'first';
        $QueryRoute->ArrQuery->{'with.total'} = 'true';
        $CourseBrowseController = new CourseBrowseController($QueryRoute);
        $data = $CourseBrowseController->get($QueryRoute);

        $Section = Section::where('course_id', $id)
                ->with('lecture')
                ->get();

        return view('app.cms.course.detail.index', [
          'id' => $id,
          'data' => $data->original['data']['records'],
          'section' => $Section
        ]);
    }

    public function Gallery(Request $request)
    {

        $data = Document::where('object', 'gallery')->get();

        return view('app.cms.course.gallery.index', [
          'data' => $data
        ]);
    }

    public function Lecture(Request $request, $id){

        $Lecture = Lecture::where('id', $id)
                ->with('exercise')
                ->first();

        return view('app.cms.course.lecture.index', [
          'id' => $id,
          'lecture' => $Lecture
        ]);
    }

    public function Rank(Request $request, $id){

        $Lecture = Lecture::where('id', $id)
                ->first();


        $UserLecture = UserLecture::where('lecture_id', $id)
                ->with('user')
                ->orderBy('nilai', 'DESC')
                ->get();


        // cetak($UserLecture);
        // die();

        return view('app.cms.course.rank.index', [
          'id' => $id,
          'lecture' => $Lecture,
          'user_lecture' => $UserLecture
        ]);
    }

    public function UserLecture(Request $request, $id){


        $UserLecture = UserLecture::where('id', $id)
                ->with('user_exercise')
                ->first();


        return view('app.cms.course.user_lecture.index', [
          'user_lecture' => $UserLecture
        ]);
    }

    public function UserLectureDownload_old(Request $request, $id){

        $user_lecture = UserLecture::where('id', $id)
        ->with('user_exercise')
        ->with('user')
        ->first();

        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=NILAI_SISWA_".$user_lecture->user->username."_".date("Y-m-d_H:i:s").".xls");


        // cetak($user_lecture->user);
        // die();

        echo '
        

            <table class="table table-bordered table-sm">
                <tr>
                    <th>
                        NAMA
                    </th>
                    <td colspan="4">
                        '.$user_lecture->user->name.'
                    </td>
                </tr>
                <tr>
                    <th>
                        NIS
                    </th>
                    <td colspan="4">
                    '.$user_lecture->user->username.'
                    </td>
                </tr>
                <tr>
                    <th>
                        NILAI
                    </th>
                    <td style="align:left:">
                    '.$user_lecture->nilai.'
                    </td>
                </tr>

                <tr>
                    <th>
                        <br>
                    </th>
                    <td colspan="4" style="align:left:">
                    </td>
                </tr>

                <tr>
                    <th style="width: 5%;">
                        No
                    </th>
                    <th style="width: 20%;">
                        Soal
                    </th>
                    <th style="width: 30%;">
                        Jawaban Siswa
                    </th>
                    <th style="width: 6%;">
                        Nilai
                    </th>
                </tr>
            ';


            foreach ($user_lecture->user_exercise as $key => $val) {
                echo '<tr>
                    <td>
                        '.($key+1).'
                    </td>
                    <td>
                        '. ($val->exercise->name) .'
                    </td>
                    <td>
                        '.($val->user_exercise_answer->description).'
                        '.(!empty($val->user_exercise_answer->exercise_option->name) ? $val->user_exercise_answer->exercise_option->name : '').'                        
                    </td>
                    <td>
                        '.($val->nilai).'
                    </td>
                </tr>
                ';
            }
            
            echo '
            </table>
        
        
        ';

        die();
    }


    public function UserLectureDownload(Request $request, $id){

        $lecture_id = $id;

        $user_lecture = UserLecture::where('lecture_id', $lecture_id)
        ->with('user_exercise')
        ->with('user')
        ->get();

        $exercise = Exercise::where('lecture_id', $lecture_id)
        ->get();


        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=NILAI_SISWA_".date("Y-m-d_H:i:s").".xls");

        foreach ($user_lecture as $key => $value) {
        
        echo '
        

            <table class="table table-bordered table-sm" border=1>
                <tr>
                    <th>
                        NAMA
                    </th>
                    <th>
                        NIS
                    </th>
                    <th>
                        NILAI
                    </th>
        ';

        foreach ($exercise as $key => $value) {
            echo '
                <th>
                    '.$value->name.'
                </th>
            ';
        }

        echo '
            </tr>
        ';


        foreach ($user_lecture as $key => $value) {
            echo '
                <tr>
                <td>'.$value->user->name.'</td>
                <td>'.$value->user->username.'</td>
                <td>'.$value->nilai.'</td>
                
            ';


            foreach ($exercise as $key2 => $value2) {

                foreach ($value->user_exercise as $key3 => $value3) {
                    if ($value3->excercise_id == $value2->id) {

                        $color = 'black';
                        if (!empty($value3->user_exercise_answer->exercise_option) && $value3->user_exercise_answer->exercise_option->is_answer != '1') {
                            $color = 'red';
                        }

                        echo '
                            <td style="color:'.$color.';">
                                '.(!empty($value3->user_exercise_answer->exercise_option->name) ? $value3->user_exercise_answer->exercise_option->name : $value3->user_exercise_answer->description).'
                            </td>
                        ';
                    }
                }
            }
            echo "</tr>";
        }




        }
            
            echo '
            </table>
        
        
        ';

        die();
    }

    public function Edit(Request $request, $id)
    {
        $Course = CourseBrowseController::FetchBrowse($request)
            ->equal('id', $id)->get('first');


        if (!isset($Course['records']->id)) {
            throw new ModelNotFoundException('Not Found Batch');
        }
        return view('app.cms.course.edit.index', [
            'select' => [],
            'data' => $Course['records']
        ]);
    }

}
