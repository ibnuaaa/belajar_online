<?php

namespace App\Http\Controllers\UserExercise;

use App\Models\UserExercise;

use App\Traits\Browse;
use App\Traits\UserExercise\UserExerciseCollection;

use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Support\Response\Json;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use DB;

class UserExerciseBrowseController extends Controller
{
    use Browse, UserExerciseCollection {
        UserExerciseCollection::__construct as private __UserExerciseCollectionConstruct;
    }

    protected $search = [
        'name'
    ];

    public function __construct(Request $request)
    {
        if ($request) {
            $this->_Request = $request;
        }
        $this->__UserExerciseCollectionConstruct();
    }

    public function get(Request $request)
    {
        $Now = Carbon::now();
        if (!isset($request->OriginalArrQuery->take)) {
            $request->ArrQuery->take = 5000;
        }

        $UserExercise = UserExercise::where(function ($query) use($request) {
            if (isset($request->ArrQuery->id)) {
                $query->where("$this->UserExerciseTable.id", $request->ArrQuery->id);
            }

            if (!empty($request->get('q'))) {
                $query->where(function ($query) use($request) {
                    $query->where("$this->UserExerciseTable.name", 'like', '%'.$request->get('name').'%');
                });
            }

            if (!empty($request->ArrQuery->search)) {
                $searched = explode(' ',$request->ArrQuery->search);
                foreach ($searched as $key => $value) {
                    $query->where(function ($query) use($request, $value) {
                        $search = '%' . $value . '%';
                        foreach ($this->search as $keySearch => $valueSearch) {
                            $query->orWhere($valueSearch, 'like', $search);
                        }
                    });
                }
            }
        })
        ->select(
            // UserExercise
            "$this->UserExerciseTable.id as UserExercise.id",
            "$this->UserExerciseTable.name as UserExercise.name",
            "$this->UserExerciseTable.created_at as UserExercise.created_at"
        );

        if(!empty($request->get('sort'))) {
            if(!empty($request->get('sort_type'))) {
              if ($request->get('sort') == 'name') $UserExercise->orderBy("$this->UserExerciseTable.name", $request->get('sort_type'));
              if ($request->get('sort') == 'created_at') $UserExercise->orderBy("$this->UserExerciseTable.created_at", $request->get('sort_type'));
            } else {
              $UserExercise->orderBy("$this->UserExerciseTable.created_at", 'desc');
            }
        } else {
            $UserExercise->orderBy("$this->UserExerciseTable.created_at", 'desc');
        }


       $Browse = $this->Browse($request, $UserExercise, function ($data) use($request) {
            $data = $this->Manipulate($data);
            return $data;
       });
       Json::set('data', $Browse);
       return response()->json(Json::get(), 200);
    }

    private function Manipulate($records)
    {
        return $records->map(function ($item) {
            foreach ($item->getAttributes() as $key => $value) {
                $this->Group($item, $key, 'UserExercise.', $item);
            }
            return $item;
        });
    }
}
