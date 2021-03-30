<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Department;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = Department::all();
        return view('Admin.Department.view',compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Department.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'code' =>'required',
            'name'=>'required|unique:departments',
            'shortname' => 'required|max:15',            
            'description'=>'required',            
        ]);

        $data = $request->all();            
        $department = Department::create($data);        
        return redirect()->route('department.index')->with('success', 'Department added sucessfully');
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
        $department = Department::findorfail($id);
        return view('Admin.Department.edit', compact('department'));
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
        $department = Department::findorfail($id);
        $request->validate([
            'code' =>'required',
            'name'=>'required',
            'shortname' => 'required|max:15',            
            'description'=>'required',            
        ]);
        $department->code = $request->code;
        $department->name = $request->name;
        $department->shortname = $request->shortname;
        $department->description = $request->description;
        $update = $department->save();
        // dd($update);
        if ($update) {
            return redirect()->route('department.index')->with('success', 'Department updated successfully');
        } else {
            return redirect()->back()->with('error', 'Some error occured while updating.');
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
        $department = Department::find($id);
        $department->delete();
        return redirect()->route('department.index')->with('success', 'Deleted Successfully');
    }
}
