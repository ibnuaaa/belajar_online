<?php

namespace App\Http\Controllers\CMS\Position;
use App\Http\Controllers\Permission\PermissionBrowseController;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Support\Response\Json;
use Illuminate\Support\Facades\Hash;
use App\Support\Generate\Hash as KeyGenerator;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use App\Models\Position;


use App\Http\Controllers\Position\PositionBrowseController;

class PositionController extends Controller
{
    public function Home(Request $request)
    {
        $Browse = Position::tree();

        $ParseData = [
            'data' => $Browse
        ];

        return view('app.position.home.index', $ParseData);
    }

    public function HomeWithPaging(Request $request)
    {
        $TableKey = 'position';

        $filter_search = $request->input('filter_search');

        if (isset($request['position-show'])) {
            $selected = $request['position-show'];
        }
        else {
            $selected = 10;
        }


        $options = array(5,10,15,20);
        $Position = PositionBrowseController::FetchBrowse($request)
            ->where('take',  $selected)
            ->where('with.total', 'true');

        if (isset($filter_search)) {
            $Position = $Position->where('search', $filter_search);
        }

        $Position = $Position->middleware(function($fetch) use($request, $TableKey) {
                $fetch->equal('skip', ___TableGetSkip($request, $TableKey, $fetch->QueryRoute->ArrQuery->take));
                return $fetch;
            })
            ->get('fetch');

        $DataTable = [
            'key' => $TableKey,
            'filter_search' => $filter_search,
            'placeholder_search' => "",
            'pageNow' => ___TableGetCurrentPage($request, $TableKey),
            'paginate' => ___TablePaginate((int)$Position['total'], (int)$Position['query']->take, ___TableGetCurrentPage($request, $TableKey)),
            'selected' => $selected,
            'options' => $options,
            'heads' => [
                (object)['name' => 'no', 'label' => 'no', 'width' => '900'],
                (object)['name' => 'name', 'label' => 'Hak Akses', 'width' => '900'],
                (object)['name' => 'action', 'label' => 'ACTION', 'width' => '100']
            ],
            'records' => []
        ];



        if ($Position['records']) {
            $DataTable['records'] = $Position['records'];
            $DataTable['total'] = $Position['total'];
            $DataTable['show'] = $Position['show'];

            $DataTable['totalpage'] = (int)(ceil($DataTable['total'] / $selected)) ;
            $DataTable['startentries'] = (($DataTable['pageNow'] - 1 ) * $selected) + 1;
            $DataTable['endentries'] = $DataTable['startentries'] + ($selected - 1);
            if ($DataTable['endentries'] > $DataTable['total']){
                $DataTable['endentries'] = $DataTable['total'];
            }
            if ($DataTable['pageNow'] > $DataTable['totalpage']){
                $DataTable['pageNow'] = $DataTable['totalpage'];
            }
        }


        $ParseData = [
            'data' => $DataTable,
            'result_total' => isset($DataTable['total']) ? $DataTable['total'] : 0
        ];
        return view('app.position.home_with_paging.index', $ParseData);
    }

    public function New(Request $request, $position_id)
    {

        $Position = PositionBrowseController::FetchBrowse($request)
            ->equal('take', 'all')->equal('with.total', true)->get();

        $PositionSelect = FormSelect($Position['records'], true);

        return view('app.position.new.index', [
          'positions' => $PositionSelect,
          'selected_position_id' => $position_id
        ]);
    }

    public function PositionEdit(Request $request, $id)
    {

        $Position = PositionBrowseController::FetchBrowse($request)
            ->equal('id', $id)->get('first');

        $Permission = PermissionBrowseController::FetchBrowse($request)
            ->where('orderBy.created_at', 'desc')
            ->where('position_id', $id)
            ->where('with.total', 'true')
            ->where('take', 'all')
            ->get('fetch');

        $Permissions = $Permission['records']->chunk(3);

        $PositionList = PositionBrowseController::FetchBrowse($request)
            ->equal('take', 'all')->equal('with.total', true)->get();

        $PositionSelect = FormSelect($PositionList['records'], true);

        return view('app.position.edit.index', [
            'data' => $Position['records'],
            'select' => ['positions' => []],
            'permissions' => $Permissions,
            'positions' => $PositionSelect
        ]);
    }


}
