<?php

namespace App\Http\Middleware\ExerciseOption;

use App\Models\ExerciseOption;

use Illuminate\Support\Facades\Hash;
use Closure;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\BaseMiddleware;

class Update extends BaseMiddleware
{
    private function Initiate($request)
    {
        $this->Model->ExerciseOption = ExerciseOption::where('id', $this->Id)->first();
        if ($this->Model->ExerciseOption) {
          if(!empty($this->_Request->input('name'))) $this->Model->ExerciseOption->name = $this->_Request->input('name');
          if(!empty($this->_Request->input('is_answer'))) $this->Model->ExerciseOption->is_answer = $this->_Request->input('is_answer');
        }
    }

    private function Validation()
    {
        // $validator = Validator::make($this->_Request->all(), [
        //     'name' => 'required'
        // ]);
        // if (!$this->Model->ExerciseOption) {
        //     $this->Json::set('exception.key', 'NotFoundExerciseOption');
        //     $this->Json::set('exception.message', trans('validation.'.$this->Json::get('exception.key')));
        //     return false;
        // }
        // if ($validator->fails()) {
        //     $this->Json::set('errors', $validator->errors());
        //     return false;
        // }
        return true;
    }

    public function handle($request, Closure $next)
    {
        $this->Initiate($request);
        if ($this->Validation()) {
            $this->Payload->put('Model', $this->Model);
            $this->_Request->merge(['Payload' => $this->Payload]);
            return $next($this->_Request);
        } else {
            return response()->json($this->Json::get(), $this->HttpCode);
        }
    }
}
