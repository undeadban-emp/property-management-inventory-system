<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.account.index');
    }

    public function list()
    {
        if (request()->ajax()) {
            $data = User::get();
            return DataTables::of($data)
            ->addColumn('accountLevel', function ($row) {
                if($row->account_level == 0){
                    return 'User';
                }else if($row->account_level == 1){
                    return 'Admin';
                }else{
                    return 'Superadmin';
                }
            })
            ->addColumn('fullname', function ($row) {
                return $row->lastname . ', ' .$row->firstname .' '. $row->middlename;
            })
            ->addColumn('action', function ($row) {
                $btn = "<button data-toggle='tooltip' data-placement='bottom' title='Edit' value='$row' class='btnEdit btn btn-success'><span class='align middle fas fa-edit'></span></button>&nbsp;&nbsp;";
                $btn .= "<button data-toggle='tooltip' data-placement='bottom' title='Delete' value='$row->id' class='btnDelete btn btn-danger'><span class='align middle fas fa-trash'></span></button>&nbsp;&nbsp;";
                $btn .= "<button data-toggle='tooltip' data-placement='bottom' title='Reset Password' value='$row->id' class='btnResetPass btn btn-primary'><span class='align middle fas fa-refresh'></span></button>";
                return $btn;
            })
            ->rawColumns(['action','fullname'])
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
            'username' => 'required',
            'password' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'accountLevel' => 'required',
        ]);
        User::create([
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'firstname' => $request['firstname'],
            'middlename' => $request['middlename'],
            'lastname' => $request['lastname'],
            'role' => 0,
            'account_level' => $request['accountLevel'],
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
            'username' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'accountLevel' => 'required',
        ]);
        $data = User::find($request->id);
        $data->username = $request->username;
        $data->firstname = $request->firstname;
        $data->middlename = $request->middlename;
        $data->lastname = $request->lastname;
        $data->account_level = $request->accountLevel;
        $data->save();
        return response()->json(['success' => true]);
    }

    public function reset(Request $request)
    {
        $data = User::find($request->id);
        $data->password = Hash::make('password');
        $data->save();
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
        $delete = User::find($id);
        $delete->delete();
        return response()->json(['success' => true]);
    }
}