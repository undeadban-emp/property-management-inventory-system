<?php

namespace App\Http\Controllers\user;

use Throwable;
use App\Models\ClassGroup;
use Illuminate\Http\Request;
use PhpParser\Builder\Class_;
use App\Models\Classification;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classGroup = ClassGroup::select('id', 'description')->get();
        return view('users.classification.index', compact('classGroup'));
    }


    public function list()
    {
        if (request()->ajax()) {
            $data = Classification::get();
            return DataTables::of($data)
            ->addColumn('ClassGroup', function ($row) {
                $data = $row->classGroup->description;
                return $data;
            })
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
            'description' => 'required',
            'classGroup' => 'required',
        ]);
        Classification::create([
            'description' => $request['description'],
            'classgroup_id' => $request['classGroup']
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
        try {
            $update = Classification::find(request()->id);
            $update->description = request()->description;
            $update->classgroup_id = request()->classGroup;
            $update->save();
            return response()->json(['success' => true]);
        } catch (Throwable $e) {
            return response()->json(['error' => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Classification::find($id);
        $delete->delete();
        return response()->json(['success' => true]);
    }
}