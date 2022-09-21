<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;

use App\Traits\Browse;
use App\Traits\Category\CategoryCollection;

use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Support\Response\Json;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use DB;

class CategoryBrowseController extends Controller
{
    use Browse, CategoryCollection {
        CategoryCollection::__construct as private __CategoryCollectionConstruct;
    }

    protected $search = [
        'name'
    ];

    public function __construct(Request $request)
    {
        if ($request) {
            $this->_Request = $request;
        }
        $this->__CategoryCollectionConstruct();
    }

    public function get(Request $request)
    {
        $Now = Carbon::now();
        if (!isset($request->OriginalArrQuery->take)) {
            $request->ArrQuery->take = 5000;
        }

        $Category = Category::where(function ($query) use($request) {
            if (isset($request->ArrQuery->id)) {
                $query->where("$this->CategoryTable.id", $request->ArrQuery->id);
            }

            if (!empty($request->get('q'))) {
                $query->where(function ($query) use($request) {
                    $query->where("$this->CategoryTable.name", 'like', '%'.$request->get('name').'%');
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
            // Category
            "$this->CategoryTable.id as category.id",
            "$this->CategoryTable.name as category.name",
            "$this->CategoryTable.created_at as category.created_at"
        );

        if(!empty($request->get('sort'))) {
            if(!empty($request->get('sort_type'))) {
              if ($request->get('sort') == 'name') $Category->orderBy("$this->CategoryTable.name", $request->get('sort_type'));
              if ($request->get('sort') == 'created_at') $Category->orderBy("$this->CategoryTable.created_at", $request->get('sort_type'));
            } else {
              $Category->orderBy("$this->CategoryTable.created_at", 'desc');
            }
        } else {
            $Category->orderBy("$this->CategoryTable.created_at", 'desc');
        }


       $Browse = $this->Browse($request, $Category, function ($data) use($request) {
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
