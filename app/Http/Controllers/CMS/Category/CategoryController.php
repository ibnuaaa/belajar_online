<?php

namespace App\Http\Controllers\CMS\Category;

use App\Http\Controllers\Category\CategoryBrowseController;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Support\Response\Json;
use Illuminate\Support\Facades\Hash;
use App\Support\Generate\Hash as KeyGenerator;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function Home(Request $request)
    {
        $TableKey = 'category-table';

        $filter_search = $request->input('filter_search');

        if (isset($request['category-table-show'])) {
            $selected = $request['category-table-show'];
        }
        else {
            $selected = 10;
        }

        $options = array(5,10,15,20);
        $Category = CategoryBrowseController::FetchBrowse($request)
            ->where('take',  $selected)
            ->where('with.total', 'true');

        if (isset($filter_search)) {
            $Category = $Category->where('search', $filter_search);
        }

        $Category = $Category->middleware(function($fetch) use($request, $TableKey) {
                $fetch->equal('skip', ___TableGetSkip($request, $TableKey, $fetch->QueryRoute->ArrQuery->take));
                return $fetch;
            })
            ->get('fetch');

        $Take = ___TableGetTake($request, $TableKey);
        $DataTable = [
            'key' => $TableKey,
            'filter_search' => $filter_search,
            'placeholder_search' => "",
            'pageNow' => ___TableGetCurrentPage($request, $TableKey),
            'paginate' => ___TablePaginate((int)$Category['total'], (int)$Category['query']->take, ___TableGetCurrentPage($request, $TableKey)),
            'selected' => $selected,
            'options' => $options,
            'heads' => [
                (object)['name' => 'No', 'label' => 'No'],
                (object)['name' => 'name', 'label' => 'Nama Category'],
                (object)['name' => 'created_at', 'label' => 'Terbuat Pada'],
                (object)['name' => 'action', 'label' => 'Aksi']
            ],
            'records' => []
        ];

        if ($Category['records']) {
            $DataTable['records'] = $Category['records'];
            $DataTable['total'] = $Category['total'];
            $DataTable['show'] = $Category['show'];
        }

        $ParseData = [
            'data' => $DataTable,
            'result_total' => isset($DataTable['total']) ? $DataTable['total'] : 0
        ];
        return view('app.cms.category.home.index', $ParseData);
    }

    public function New(Request $request)
    {
        return view('app.cms.category.new.index', [
            'select' => [],
        ]);
    }

    public function Detail(Request $request, $id)
    {
        $QueryRoute = QueryRoute($request);
        $QueryRoute->ArrQuery->id = $id;
        $QueryRoute->ArrQuery->set = 'first';
        $QueryRoute->ArrQuery->{'with.total'} = 'true';
        $CategoryBrowseController = new CategoryBrowseController($QueryRoute);
        $data = $CategoryBrowseController->get($QueryRoute);

        return view('app.cms.category.detail.index', [ 'data' => $data->original['data']['records'] ]);
    }

    public function Edit(Request $request, $id)
    {
        $Category = CategoryBrowseController::FetchBrowse($request)
            ->equal('id', $id)->get('first');


        if (!isset($Category['records']->id)) {
            throw new ModelNotFoundException('Not Found Batch');
        }
        return view('app.cms.category.edit.index', [
            'select' => [],
            'data' => $Category['records']
        ]);
    }

}
