<?php

namespace App\Http\Controllers\Lecture;

use App\Models\Lecture;

use App\Traits\Browse;
use App\Traits\Lecture\LectureCollection;

use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Support\Response\Json;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use DB;

class LectureBrowseController extends Controller
{
    use Browse, LectureCollection {
        LectureCollection::__construct as private __LectureCollectionConstruct;
    }

    protected $search = [
        'name'
    ];

    public function __construct(Request $request)
    {
        if ($request) {
            $this->_Request = $request;
        }
        $this->__LectureCollectionConstruct();
    }

    public function get(Request $request)
    {
        $Now = Carbon::now();
        if (!isset($request->OriginalArrQuery->take)) {
            $request->ArrQuery->take = 5000;
        }

        $Lecture = Lecture::where(function ($query) use($request) {
            if (isset($request->ArrQuery->id)) {
                $query->where("$this->LectureTable.id", $request->ArrQuery->id);
            }

            if (!empty($request->get('q'))) {
                $query->where(function ($query) use($request) {
                    $query->where("$this->LectureTable.name", 'like', '%'.$request->get('name').'%');
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
            // Lecture
            "$this->LectureTable.id as Lecture.id",
            "$this->LectureTable.name as Lecture.name",
            "$this->LectureTable.created_at as Lecture.created_at"
        );

        if(!empty($request->get('sort'))) {
            if(!empty($request->get('sort_type'))) {
              if ($request->get('sort') == 'name') $Lecture->orderBy("$this->LectureTable.name", $request->get('sort_type'));
              if ($request->get('sort') == 'created_at') $Lecture->orderBy("$this->LectureTable.created_at", $request->get('sort_type'));
            } else {
              $Lecture->orderBy("$this->LectureTable.created_at", 'desc');
            }
        } else {
            $Lecture->orderBy("$this->LectureTable.created_at", 'desc');
        }


       $Browse = $this->Browse($request, $Lecture, function ($data) use($request) {
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
                $this->Group($item, $key, 'Lecture.', $item);
            }
            return $item;
        });
    }
}
