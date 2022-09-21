<?php

namespace App\Http\Middleware\Exercise;

use App\Models\Exercise;

use Closure;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\BaseMiddleware;

class Answer extends BaseMiddleware
{
    private function Initiate()
    {
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
        // $this->Initiate();
        // if ($this->Validation()) {
        //     $this->Payload->put('Model', $this->Model);
        //     $this->_Request->merge(['Payload' => $this->Payload]);
            return $next($this->_Request);
        // } else {
        //     return response()->json($this->Json::get(), $this->HttpCode);
        // }
    }
}
