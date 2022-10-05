<?php

namespace App\Http\Middleware\UserExercise;

use App\Models\UserExercise;

use Illuminate\Support\Facades\Hash;
use Closure;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\BaseMiddleware;

class Update extends BaseMiddleware
{
    private function Initiate($request)
    {
        $this->Model->UserExercise = UserExercise::where('id', $this->Id)->first();
        if ($this->Model->UserExercise) {
          if(!empty($this->_Request->input('nilai'))) $this->Model->UserExercise->nilai = $this->_Request->input('nilai');
        }
    }

    private function Validation()
    {
        // $validator = Validator::make($this->_Request->all(), [
        //     'name' => 'required'
        // ]);
        // if (!$this->Model->UserExercise) {
        //     $this->Json::set('exception.key', 'NotFoundUserExercise');
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
