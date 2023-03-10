<?php

namespace App\Http\Controllers\User;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        //
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