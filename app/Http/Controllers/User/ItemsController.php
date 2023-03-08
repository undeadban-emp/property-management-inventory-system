<?php

namespace App\Http\Controllers\User;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Classification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = Classification::select('id', 'description')->get();
        $natureOccupancy = ['SCHOOL', 'OFFICE', 'CLINIC', 'HOSPITAL', 'LABORATORY', 'PUBLIC MARKET', 'CAR PARKS', 'TERMINAL', 'RESIDENTIAL', 'OTHER SPECIFICATION'];
        return view('users.items.index', compact('class', 'natureOccupancy'));
    }

    public function list()
    {
        if (request()->ajax()) {
            $data = Item::get();
            return DataTables::of($data)
            ->addColumn('action', function ($row) {
                if(Auth::user()->account_level == 0){
                    $btn = "<button value='$row' class='btnEdit btn btn-primary'><span class='align middle fas fa-edit'></span></button>&nbsp;&nbsp;";
                }else if(Auth::user()->account_level == 1){
                    $btn = "<button value='$row' class='btnEdit btn btn-primary'><span class='align middle fas fa-edit'></span></button>&nbsp;&nbsp;";
                    $btn .= "<button value='$row->id' class='btnDelete btn btn-danger'><span class='align middle fas fa-trash'></span></button>";
                }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'itemNo' => 'required',
            'description' => 'required',
            'unit' => 'required',
            'modelNo' => 'required',
            'serialNo' => 'required',
            'brand' => 'required',
            'acquisitionDate' => 'required',
            'acquisitionCost' => 'required|numeric',
            'marketAppraisal' => 'required|numeric',
            'appraisalDate' => 'required',
            'remarks' => 'required',
            'class' => 'required',
            'natureOccupancy' => 'required',
        ]);
        Item::create([
            'item_no' => $request['itemNo'],
            'description' => $request['description'],
            'unit' => $request['unit'],
            'model_no' => $request['modelNo'],
            'serial_no' => $request['serialNo'],
            'brand' => $request['brand'],
            'acquisition_date' => $request['acquisitionDate'],
            'acquisition_cost' => $request['acquisitionCost'],
            'market_appraisal' => $request['marketAppraisal'],
            'appraisal_date' => $request['appraisalDate'],
            'remarks' => $request['remarks'],
            'class_id' => $request['class'],
            'nature_occupancy' => $request['natureOccupancy'],
        ]);
        return response()->json(['success' => true]);
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
    public function update(Request $request)
    {
        $this->validate($request, [
            'itemNo' => 'required',
            'description' => 'required',
            'unit' => 'required',
            'modelNo' => 'required',
            'serialNo' => 'required',
            'brand' => 'required',
            'acquisitionDate' => 'required',
            'acquisitionCost' => 'required|numeric',
            'marketAppraisal' => 'required|numeric',
            'appraisalDate' => 'required',
            'remarks' => 'required',
            'class' => 'required',
            'natureOccupancy' => 'required',
        ]);
        $item = Item::find($request->id);
        $item->item_no = $request->itemNo;
        $item->description = $request->description;
        $item->unit = $request->unit;
        $item->model_no = $request->modelNo;
        $item->serial_no = $request->serialNo;
        $item->brand = $request->brand;
        $item->acquisition_date = $request->acquisitionDate;
        $item->acquisition_cost = $request->acquisitionCost;
        $item->market_appraisal = $request->marketAppraisal;
        $item->appraisal_date = $request->appraisalDate;
        $item->remarks = $request->remarks;
        $item->class_id = $request->class;
        $item->nature_occupancy = $request->natureOccupancy;
        $item->save();
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Item::find($id);
        $delete->delete();
        return response()->json(['success' => true]);
    }
}