<?php

namespace App\Http\Middleware\Exercise;

use App\Models\Exercise;

use Illuminate\Support\Facades\Hash;
use Closure;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\BaseMiddleware;

class Update extends BaseMiddleware
{
    private function Initiate($request)
    {
        $this->Model->Exercise = Exercise::where('id', $this->Id)->first();
        if ($this->Model->Exercise) {
          if(!empty($this->_Request->input('name'))) $this->Model->Exercise->name = $this->_Request->input('name');
          if(!empty($this->_Request->input('description'))) $this->Model->Exercise->decription = $this->_Request->input('description');
          if(!empty($this->_Request->input('bobot'))) $this->Model->Exercise->bobot = $this->_Request->input('bobot');
        }
    }

    private function Validation()
    {
        // $validator = Validator::make($this->_Request->all(), [
        //     'name' => 'required'
        // ]);
        // if (!$this->Model->Exercise) {
        //     $this->Json::set('exception.key', 'NotFoundExercise');
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
