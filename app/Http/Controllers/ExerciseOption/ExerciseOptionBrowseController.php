<?php

namespace App\Http\Controllers\ExerciseOption;

use App\Models\ExerciseOption;

use App\Traits\Browse;
use App\Traits\ExerciseOption\ExerciseOptionCollection;

use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Support\Response\Json;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use DB;

class ExerciseOptionBrowseController extends Controller
{
    use Browse, ExerciseOptionCollection {
        ExerciseOptionCollection::__construct as private __ExerciseOptionCollectionConstruct;
    }

    protected $search = [
        'name'
    ];

    public function __construct(Request $request)
    {
        if ($request) {
            $this->_Request = $request;
        }
        $this->__ExerciseOptionCollectionConstruct();
    }

    public function get(Request $request)
    {
        $Now = Carbon::now();
        if (!isset($request->OriginalArrQuery->take)) {
            $request->ArrQuery->take = 5000;
        }

        $ExerciseOption = ExerciseOption::where(function ($query) use($request) {
            if (isset($request->ArrQuery->id)) {
                $query->where("$this->ExerciseOptionTable.id", $request->ArrQuery->id);
            }

            if (!empty($request->get('q'))) {
                $query->where(function ($query) use($request) {
                    $query->where("$this->ExerciseOptionTable.name", 'like', '%'.$request->get('name').'%');
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
            // ExerciseOption
            "$this->ExerciseOptionTable.id as ExerciseOption.id",
            "$this->ExerciseOptionTable.name as ExerciseOption.name",
            "$this->ExerciseOptionTable.created_at as ExerciseOption.created_at"
        );

        if(!empty($request->get('sort'))) {
            if(!empty($request->get('sort_type'))) {
              if ($request->get('sort') == 'name') $ExerciseOption->orderBy("$this->ExerciseOptionTable.name", $request->get('sort_type'));
              if ($request->get('sort') == 'created_at') $ExerciseOption->orderBy("$this->ExerciseOptionTable.created_at", $request->get('sort_type'));
            } else {
              $ExerciseOption->orderBy("$this->ExerciseOptionTable.created_at", 'desc');
            }
        } else {
            $ExerciseOption->orderBy("$this->ExerciseOptionTable.created_at", 'desc');
        }


       $Browse = $this->Browse($request, $ExerciseOption, function ($data) use($request) {
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
                $this->Group($item, $key, 'ExerciseOption.', $item);
            }
            return $item;
        });
    }
}
