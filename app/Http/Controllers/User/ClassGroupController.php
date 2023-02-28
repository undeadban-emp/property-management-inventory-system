<?php

namespace App\Http\Controllers\User;

use App\Models\ClassGroup;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;

class ClassGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.class-group.index');
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
    public function list()
    {
        if (request()->ajax()) {
            $data = ClassGroup::get();
            return DataTables::of($data)
            ->addColumn('action', function ($row) {
                $btn = "<button value='$row' class='btnEdit btn btn-success'><span class='align middle fas fa-edit'></span></button>&nbsp;&nbsp;";
                $btn .= "<button value='$row->id' class='btnDelete btn btn-danger'><span class='align middle fas fa-trash'></span></button>";
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
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
            'description' => 'required',
        ]);
        ClassGroup::create([
            'description' => $request['description'],
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
    public function update()
    {
        $update = ClassGroup::find(request()->id);
        $update->description = request()->description;
        $update->save();
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
        $delete = ClassGroup::find($id);
        $delete->delete();
        return response()->json(['success' => true]);
    }
}