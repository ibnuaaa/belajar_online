<?php

namespace App\Http\Controllers\Exercise;

use App\Models\Exercise;
use App\Models\ExerciseOption;
use App\Models\UserLecture;
use App\Models\UserExercise;
use App\Models\UserExerciseAnswer;

use App\Traits\Browse;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Support\Response\Json;
use Illuminate\Support\Facades\Hash;
use App\Support\Generate\Hash as KeyGenerator;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class ExerciseController extends Controller
{
    use Browse;

    protected $search = [
        'id',
        'code',
        'name'
    ];
    public function get(Request $request)
    {
        $Exercise = Exercise::where(function ($query) use($request) {
            if (isset($request->ArrQuery->id)) {
                if ($request->ArrQuery->id === 'my') {
                    $query->where('id', $request->information()->id);
                } else {
                    $query->where('id', $request->ArrQuery->id);
                }
            }
            if (isset($request->ArrQuery->search)) {
               $search = '%' . $request->ArrQuery->search . '%';
               if (isset($request->ArrQuery->for) && ($request->ArrQuery->for === 'select')) {
                  $query->where('code', 'like', $search);
                  $query->orWhere('name', 'like', $search);
               } else {
                   $query->where(function ($query) use($search) {
                       foreach ($this->search as $key => $value) {
                           $query->orWhere($value, 'like', $search);
                       }
                   });
               }
           }
        });
        $Browse = $this->Browse($request, $Exercise, function ($data) use($request) {
            return $data;
        });
        Json::set('data', $Browse);
        return response()->json(Json::get(), 200);
    }

    public function Insert(Request $request)
    {
        $Model = $request->Payload->all()['Model'];
        $Model->Exercise->save();

        Json::set('data', $this->SyncData($request, $Model->Exercise->id));
        return response()->json(Json::get(), 201);
    }

    public function Answer(Request $request)
    {

        $exercise_option_id = $request->input('exercise_option_id');

        $ExerciseOption = ExerciseOption::where('id', $exercise_option_id)
              ->with('exercise')
              ->first();

        $nilai = 0;
        if ($ExerciseOption->is_answer == 1) {
              $nilai = 1;
        }

        $Exercise = Exercise::where('lecture_id', $ExerciseOption->exercise->lecture_id)
              ->get();


        $total_soal = count($Exercise);




        $UserLecture = UserLecture::where('user_id', MyAccount()->id)->where('lecture_id',$ExerciseOption->exercise->lecture_id)->first();
        if (empty($UserLecture)) {
            $UserLecture = new UserLecture();
            $UserLecture->lecture_id  = $ExerciseOption->exercise->lecture_id;
            $UserLecture->user_id  = MyAccount()->id;
        }
        $UserLecture->save();

        $UserExercise = UserExercise::where('user_id', MyAccount()->id)->where('excercise_id',$ExerciseOption->exercise_id)->first();


        if (empty($UserExercise)) {
            $UserExercise = new UserExercise();
            $UserExercise->user_lecture_id =$UserLecture->id;
            $UserExercise->user_id = MyAccount()->id;
            $UserExercise->excercise_id =$ExerciseOption->exercise_id;
        }
        $UserExercise->nilai = $nilai;
        $UserExercise->save();


        $UserExerciseAnswer = UserExerciseAnswer::where('user_id', MyAccount()->id)->where('user_excercise_id',$UserExercise->id)->first();
        if (empty($UserExerciseAnswer)) {
            $UserExerciseAnswer = new UserExerciseAnswer();
            $UserExerciseAnswer->user_id = MyAccount()->id;
            $UserExerciseAnswer->user_excercise_id =$UserExercise->id;
        }
        $UserExerciseAnswer->excercise_option_id = $exercise_option_id;
        $UserExerciseAnswer->save();

        $UserExerciseBetul = UserExercise::where('nilai', 1)->where('user_lecture_id',$UserLecture->id)->get();

        $jml_betul = count($UserExerciseBetul);

        $UserLecture = UserLecture::where('user_id', MyAccount()->id)->where('lecture_id',$ExerciseOption->exercise->lecture_id)->first();
        $UserLecture->nilai = ($jml_betul/$total_soal) * 100;
        $UserLecture->save();



        Json::set('data', 'success');
        return response()->json(Json::get(), 201);
    }

    public function Update(Request $request)
    {
        $Model = $request->Payload->all()['Model'];
        $Model->Exercise->save();

        Json::set('data', $this->SyncData($request, $Model->Exercise->id));
        return response()->json(Json::get(), 202);
    }

    public function Delete(Request $request)
    {
        $Model = $request->Payload->all()['Model'];
        $Model->Exercise->delete();
        return response()->json(Json::get(), 202);
    }

    public function SyncData($request, $id)
    {
        $QueryRoute = QueryRoute($request);
        $QueryRoute->ArrQuery->set = 'first';
        $QueryRoute->ArrQuery->id = $id;
        $data = $this->get($QueryRoute);
        return $data->original['data']['records'];
    }
}
