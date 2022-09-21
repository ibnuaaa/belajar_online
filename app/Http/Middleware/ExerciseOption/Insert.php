<?php

namespace App\Http\Middleware\ExerciseOption;

use App\Models\ExerciseOption;

use Closure;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\BaseMiddleware;

class Insert extends BaseMiddleware
{
    private function Initiate()
    {
        $this->Model->ExerciseOption = new ExerciseOption();

        if(!empty($this->_Request->input('name'))) $this->Model->ExerciseOption->name = $this->_Request->input('name');
        if(!empty($this->_Request->input('exercise_id'))) $this->Model->ExerciseOption->exercise_id = $this->_Request->input('exercise_id');
    }

    private function Validation()
    {
        // $validator = Validator::make($this->_Request->all(), [
        //     'name' => 'required'
        // ]);
        // if ($validator->fails()) {
        //     $this->Json::set('errors', $validator->errors());
        //     return false;
        // }
        return true;
    }

    public function handle($request, Closure $next)
    {
        $this->Initiate();
        if ($this->Validation()) {
            $this->Payload->put('Model', $this->Model);
            $this->_Request->merge(['Payload' => $this->Payload]);
            return $next($this->_Request);
        } else {
            return response()->json($this->Json::get(), $this->HttpCode);
        }
    }
}
