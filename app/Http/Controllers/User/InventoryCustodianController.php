<?php

namespace App\Http\Controllers\User;

use Throwable;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\InventoryCustodian;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\InventoryCustodianItem;
use Yajra\DataTables\Facades\DataTables;

class InventoryCustodianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.inventory-custodian.index');
    }

    public function list()
    {
        if (request()->ajax()) {

            $data = DB::connection('PROPERTY_MANAGEMENT_INVENTORY_CONNECTION')
            ->table('inventory_custodians')
            ->join('DTRPayroll.dbo.Office', 'inventory_custodians.office_code', '=', 'Office.OfficeCode')
            ->get();
            return DataTables::of($data)
            ->addColumn('office', function ($row) {
                return $row->Description;
            })
            ->addColumn('action', function ($row) {
                $btn = "<button value='$row->id' class='btnEdit btn btn-success'><span class='align middle fas fa-edit'></span></button>&nbsp;&nbsp;";
                $btn .= "<button value='$row->id' class='btnDelete btn btn-danger'><span class='align middle fas fa-trash'></span></button>";
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $office = DB::connection('DTR_PAYROLL_CONNECTION')->table('Office')->select('OfficeCode', 'Description')->get();

        $employee = DB::connection('DTR_PAYROLL_CONNECTION')->table('Employees')
        ->join('Position', 'Employees.PosCode', '=', 'Position.PosCode')
        ->select(DB::raw("CONCAT(LastName, ', ' , FirstName , ' ' , MiddleName, ' ' , Suffix) AS fullname"), 'Employees.OfficeCode', 'Employees.PosCode', 'Position.Description as Description', 'Employees.isActive', 'Employees.Work_Status')
        ->where('Work_Status', 'not like', '%'.'JOB ORDER'.'%')
        ->where('Work_Status', 'not like', '%'.'CONTRACT OF SERVICE'.'%')
        ->where('Work_Status', '!=', '')
        ->where('isActive', 1)
        ->orderBy('LastName', 'ASC')->get();

        $position = DB::connection('DTR_PAYROLL_CONNECTION')->table('Position')->select('Description')->get();

        $item = Item::select('id', 'description', 'unit', 'acquisition_cost')->get();

        return view('users.inventory-custodian.create', compact('office', 'employee', 'position', 'item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $parentArrayData = explode('|', $request->parentData);
            $inventoryCustodian = InventoryCustodian::create([
                'office_code' => $parentArrayData[0],
                'fund_id' => $parentArrayData[1],
                'ics_no' => $parentArrayData[2],
                'received_from' => $parentArrayData[3],
                'received_from_pos' => $parentArrayData[4],
                'received_from_date' => $parentArrayData[5],
                'received_by' => $parentArrayData[6],
                'received_by_pos' => $parentArrayData[7],
                'received_by_date' => $parentArrayData[8],
            ]);

            $childArrayData = explode('~~', $request->childDatas);
            foreach($childArrayData as $childArrayDatas){
                $childArrayDataStore = explode('|', $childArrayDatas);
                InventoryCustodianItem::create([
                    'ic_id' => $inventoryCustodian->id,
                    'item_id' => $childArrayDataStore[0],
                    'quantity' => $childArrayDataStore[2],
                    'unit' => $childArrayDataStore[3],
                    'unit_cost' => $childArrayDataStore[4],
                    'unit_total_cost' => $childArrayDataStore[5],
                    'est_useful_life' => $childArrayDataStore[6],
                ]);
            }
            return response()->json(['success' => true]);
        } catch (Throwable $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage(), 'id' => $inventoryCustodian->id]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}