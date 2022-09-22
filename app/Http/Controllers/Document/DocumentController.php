<?php

namespace App\Http\Controllers\Document;

use App\Models\Document;

use App\Traits\Browse;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Support\Response\Json;
use Illuminate\Support\Facades\Hash;
use App\Support\Generate\Hash as KeyGenerator;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    use Browse;

    protected $search = [
        'id',
        'code',
        'name'
    ];

    public function Delete(Request $request)
    {
        $Model = $request->Payload->all()['Model'];
        $Model->Document->delete();
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
