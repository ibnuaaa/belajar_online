<?php

namespace App\Http\Middleware\Course;

use App\Models\Course;

use Illuminate\Support\Facades\Hash;
use Closure;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\BaseMiddleware;

class Update extends BaseMiddleware
{
    private function Initiate($request)
    {
        $this->Model->Course = Course::where('id', $this->Id)->first();
        if ($this->Model->Course) {
          $this->Model->Course->name = $this->_Request->input('name');
          $this->Model->Course->description = $this->_Request->input('description');
        }
    }

    private function Validation()
    {
        // $validator = Validator::make($this->_Request->all(), [
        //     'name' => 'required'
        // ]);
        // if (!$this->Model->Course) {
        //     $this->Json::set('exception.key', 'NotFoundCourse');
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
