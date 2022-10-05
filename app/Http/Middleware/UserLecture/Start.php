<?php

namespace App\Http\Middleware\UserLecture;

use App\Models\UserLecture;

use Illuminate\Support\Facades\Hash;
use Closure;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\BaseMiddleware;

use Illuminate\Support\Facades\Auth;

class Start extends BaseMiddleware
{
    private function Initiate($request)
    {
        $this->Model->UserLecture = UserLecture::where('lecture_id', $this->Id)->where('user_id', Auth::user()->id)->first();

        if (empty($this->Model->UserLecture)) {
            $this->Model->UserLecture = new UserLecture();
            $this->Model->UserLecture->lecture_id = $this->Id;
            $this->Model->UserLecture->user_id = Auth::user()->id;   
        }

    }

    private function Validation()
    {
        // $validator = Validator::make($this->_Request->all(), [
        //     'name' => 'required'
        // ]);
        // if (!$this->Model->UserLecture) {
        //     $this->Json::set('exception.key', 'NotFoundUserLecture');
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
