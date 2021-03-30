<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $roles = Role::all();
        return view('Admin.Role.view',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('Admin.Role.add');
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
            'name'=>'required|unique:roles',            
            'description'=>'required',            
        ]);

        $data = $request->all();            
        $user = Role::create($data);        
        return redirect()->route('role.index')->with('success', 'Roles added sucessfully');
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
        $role = Role::findorfail($id);
        return view('Admin.Role.edit', compact('role'));
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
        $role = Role::findorfail($id);
        $request->validate([
            'name'=>'required',            
            'description'=>'required',            
        ]);
        $role->name = $request->name;
        $role->description = $request->description;
        $update = $role->save();
        // dd($update);
        if ($update) {
            return redirect()->route('role.index')->with('success', 'Roles updated successfully');
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
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('role.index')->with('warning', 'Deleted Successfully');
    }
}
