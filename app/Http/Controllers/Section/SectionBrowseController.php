<?php

namespace App\Http\Controllers\Section;

use App\Models\Section;

use App\Traits\Browse;
use App\Traits\Section\SectionCollection;

use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Support\Response\Json;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use DB;

class SectionBrowseController extends Controller
{
    use Browse, SectionCollection {
        SectionCollection::__construct as private __SectionCollectionConstruct;
    }

    protected $search = [
        'name'
    ];

    public function __construct(Request $request)
    {
        if ($request) {
            $this->_Request = $request;
        }
        $this->__SectionCollectionConstruct();
    }

    public function get(Request $request)
    {
        $Now = Carbon::now();
        if (!isset($request->OriginalArrQuery->take)) {
            $request->ArrQuery->take = 5000;
        }

        $Section = Section::where(function ($query) use($request) {
            if (isset($request->ArrQuery->id)) {
                $query->where("$this->SectionTable.id", $request->ArrQuery->id);
            }

            if (!empty($request->get('q'))) {
                $query->where(function ($query) use($request) {
                    $query->where("$this->SectionTable.name", 'like', '%'.$request->get('name').'%');
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
            // Section
            "$this->SectionTable.id as Section.id",
            "$this->SectionTable.name as Section.name",
            "$this->SectionTable.created_at as Section.created_at"
        );

        if(!empty($request->get('sort'))) {
            if(!empty($request->get('sort_type'))) {
              if ($request->get('sort') == 'name') $Section->orderBy("$this->SectionTable.name", $request->get('sort_type'));
              if ($request->get('sort') == 'created_at') $Section->orderBy("$this->SectionTable.created_at", $request->get('sort_type'));
            } else {
              $Section->orderBy("$this->SectionTable.created_at", 'desc');
            }
        } else {
            $Section->orderBy("$this->SectionTable.created_at", 'desc');
        }


       $Browse = $this->Browse($request, $Section, function ($data) use($request) {
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
                $this->Group($item, $key, 'Section.', $item);
            }
            return $item;
        });
    }
}
