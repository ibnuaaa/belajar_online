<?php

namespace App\Http\Middleware\Lecture;

use App\Models\Lecture;

use Illuminate\Support\Facades\Hash;
use Closure;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\BaseMiddleware;

class Update extends BaseMiddleware
{
    private function Initiate($request)
    {
        $this->Model->Lecture = Lecture::where('id', $this->Id)->first();
        if ($this->Model->Lecture) {
          if (!empty($this->_Request->input('name'))) $this->Model->Lecture->name = $this->_Request->input('name');
          if (!empty($this->_Request->input('description'))) $this->Model->Lecture->description = $this->_Request->input('description');
          if (!empty($this->_Request->input('video'))) $this->Model->Lecture->video = $this->_Request->input('video');
        }
    }

    private function Validation()
    {
        // $validator = Validator::make($this->_Request->all(), [
        //     // 'name' => 'required'
        // ]);
        // if (!$this->Model->Lecture) {
        //     $this->Json::set('exception.key', 'NotFoundLecture');
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
