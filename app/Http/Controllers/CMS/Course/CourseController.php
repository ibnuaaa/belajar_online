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
