<?php

namespace App\Http\Controllers\UserLecture;

use App\Models\UserLecture;

use App\Traits\Browse;
use App\Traits\UserLecture\UserLectureCollection;

use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Support\Response\Json;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use DB;

class UserLectureBrowseController extends Controller
{
    use Browse, UserLectureCollection {
        UserLectureCollection::__construct as private __UserLectureCollectionConstruct;
    }

    protected $search = [
        'name'
    ];

    public function __construct(Request $request)
    {
        if ($request) {
            $this->_Request = $request;
        }
        $this->__UserLectureCollectionConstruct();
    }

    public function get(Request $request)
    {
        $Now = Carbon::now();
        if (!isset($request->OriginalArrQuery->take)) {
            $request->ArrQuery->take = 5000;
        }

        $UserLecture = UserLecture::where(function ($query) use($request) {
            if (isset($request->ArrQuery->id)) {
                $query->where("$this->UserLectureTable.id", $request->ArrQuery->id);
            }

            if (isset($request->ArrQuery->lecture_id)) {
              $query->where("$this->UserLectureTable.user_id", MyAccount()->id);
              $query->where("$this->UserLectureTable.lecture_id", $request->ArrQuery->lecture_id);

            }

            if (!empty($request->get('q'))) {
                $query->where(function ($query) use($request) {
                    $query->where("$this->UserLectureTable.name", 'like', '%'.$request->get('name').'%');
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
        });

        if(!empty($request->get('sort'))) {
            if(!empty($request->get('sort_type'))) {
              if ($request->get('sort') == 'name') $UserLecture->orderBy("$this->UserLectureTable.name", $request->get('sort_type'));
              if ($request->get('sort') == 'created_at') $UserLecture->orderBy("$this->UserLectureTable.created_at", $request->get('sort_type'));
            } else {
              $UserLecture->orderBy("$this->UserLectureTable.created_at", 'desc');
            }
        } else {
            $UserLecture->orderBy("$this->UserLectureTable.created_at", 'desc');
        }


       $Browse = $this->Browse($request, $UserLecture, function ($data) use($request) {
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
                $this->Group($item, $key, 'category.', $item);
            }
            return $item;
        });
    }
}
