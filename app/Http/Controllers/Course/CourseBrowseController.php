<?php

namespace App\Http\Controllers\Course;

use App\Models\Course;

use App\Traits\Browse;
use App\Traits\Course\CourseCollection;

use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Support\Response\Json;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use DB;

class CourseBrowseController extends Controller
{
    use Browse, CourseCollection {
        CourseCollection::__construct as private __CourseCollectionConstruct;
    }

    protected $search = [
        'name'
    ];

    public function __construct(Request $request)
    {
        if ($request) {
            $this->_Request = $request;
        }
        $this->__CourseCollectionConstruct();
    }

    public function get(Request $request)
    {
        $Now = Carbon::now();
        if (!isset($request->OriginalArrQuery->take)) {
            $request->ArrQuery->take = 5000;
        }

        $Course = Course::where(function ($query) use($request) {
            if (isset($request->ArrQuery->id)) {
                $query->where("$this->CourseTable.id", $request->ArrQuery->id);
            }

            if (!empty($request->get('q'))) {
                $query->where(function ($query) use($request) {
                    $query->where("$this->CourseTable.name", 'like', '%'.$request->get('name').'%');
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
            // Course
            "$this->CourseTable.id as Course.id",
            "$this->CourseTable.name as Course.name",
            "$this->CourseTable.description as Course.description",
            "$this->CourseTable.created_at as Course.created_at"
        );

        if(!empty($request->get('sort'))) {
            if(!empty($request->get('sort_type'))) {
              if ($request->get('sort') == 'name') $Course->orderBy("$this->CourseTable.name", $request->get('sort_type'));
              if ($request->get('sort') == 'created_at') $Course->orderBy("$this->CourseTable.created_at", $request->get('sort_type'));
            } else {
              $Course->orderBy("$this->CourseTable.created_at", 'desc');
            }
        } else {
            $Course->orderBy("$this->CourseTable.created_at", 'desc');
        }


       $Browse = $this->Browse($request, $Course, function ($data) use($request) {
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
                $this->Group($item, $key, 'Course.', $item);
            }
            return $item;
        });
    }
}
