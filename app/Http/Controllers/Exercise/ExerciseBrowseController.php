<?php

namespace App\Http\Controllers\Exercise;

use App\Models\Exercise;

use App\Traits\Browse;
use App\Traits\Exercise\ExerciseCollection;

use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Support\Response\Json;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use DB;

class ExerciseBrowseController extends Controller
{
    use Browse, ExerciseCollection {
        ExerciseCollection::__construct as private __ExerciseCollectionConstruct;
    }

    protected $search = [
        'name'
    ];

    public function __construct(Request $request)
    {
        if ($request) {
            $this->_Request = $request;
        }
        $this->__ExerciseCollectionConstruct();
    }

    public function get(Request $request)
    {
        $Now = Carbon::now();
        if (!isset($request->OriginalArrQuery->take)) {
            $request->ArrQuery->take = 5000;
        }

        $Exercise = Exercise::where(function ($query) use($request) {
            if (isset($request->ArrQuery->id)) {
                $query->where("$this->ExerciseTable.id", $request->ArrQuery->id);
            }

            if (!empty($request->get('q'))) {
                $query->where(function ($query) use($request) {
                    $query->where("$this->ExerciseTable.name", 'like', '%'.$request->get('name').'%');
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
            // Exercise
            "$this->ExerciseTable.id as Exercise.id",
            "$this->ExerciseTable.name as Exercise.name",
            "$this->ExerciseTable.created_at as Exercise.created_at"
        );

        if(!empty($request->get('sort'))) {
            if(!empty($request->get('sort_type'))) {
              if ($request->get('sort') == 'name') $Exercise->orderBy("$this->ExerciseTable.name", $request->get('sort_type'));
              if ($request->get('sort') == 'created_at') $Exercise->orderBy("$this->ExerciseTable.created_at", $request->get('sort_type'));
            } else {
              $Exercise->orderBy("$this->ExerciseTable.created_at", 'desc');
            }
        } else {
            $Exercise->orderBy("$this->ExerciseTable.created_at", 'desc');
        }


       $Browse = $this->Browse($request, $Exercise, function ($data) use($request) {
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
                $this->Group($item, $key, 'Exercise.', $item);
            }
            return $item;
        });
    }
}
