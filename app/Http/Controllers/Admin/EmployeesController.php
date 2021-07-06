<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Employee;
use App\Models\Admin\Title;
use App\Models\Admin\Level;
use App\Models\Admin\Department;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = Department::all();
        $employee = Employee::orderBy('id', 'desc')->get();
        // dd($employee);
        return view('Admin.Employee.view', compact('employee', 'department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = Title::all();
        $department = Department::all();
        $level = Level::all();
        return view('Admin.Employee.add', compact('title', 'department', 'level'));
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
            'staff_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:employees',
            'photo' => 'image',
            'pan' => 'required',
            'contact_number' => 'required',
            'title' => 'required',
            'level' => 'required',
            'department' => 'required',
        ]);
        // $employee = new Employee([
        //     'staff_id' => $request->employee_id,
        //     'firstname' => $request->firstname,
        //     'lastname' => $request->lastname,
        //     'email' => $request->email,
        //     'department' => $request->department,
        //     'level' => $request->level,
        //     'pan' => $request->pan,
        //     'contact_number' => $request->contact_number,
        // ]);
        $data = $request->all();
        // $employee->title()->attach($request->title);
        $data['title'] = $data['title'][0];

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = "Employee-" . time() . '.' . $image->getClientOriginalExtension();
            $image->move('Uploads/Employee/Image/', $name);
            $data['photo'] = $name;
        }
        $staff = Employee::create($data);
        $staff->title()->sync($request->title);
        if ($staff) {
            return redirect()->route('employee.index')->with('success', 'Employee added successfully');
        } else {
            return redirect()->back()->with('error', 'Oops!!! some error occurred');
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
        // $title = Title::all();
        $employee = Employee::findorfail($id);
        return view('Admin.Employee.details', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = Title::all();
        $department = Department::all();
        $level = Level::all();
        $employee = Employee::findorfail($id);
        return view('Admin.Employee.edit', compact('employee', 'title', 'level', 'department'));
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
        $employee = Employee::find($id);
        $request->validate([
            'staff_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'photo' => 'image',
            'pan' => 'required',
            'contact_number' => 'required',
            'title' => 'required',
            'level' => 'required',
            'department' => 'required',
        ]);
        $employee->staff_id = $request->staff_id;
        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->email = $request->email;
        $employee->photo = $request->photo;
        $employee->pan = $request->pan;
        $employee->title = $request->title;
        $employee->level = $request->level;
        $employee->department = $request->department;
        $employee->contact_number = $request->contact_number;
        if ($request->hasFile('photo')) {
            if ($employee->photo != null) {
                unlink(public_path() . '/Uploads/Employee/Image/' . $employee->photo);
            }
            $new_img = $request->file('photo');
            $name = "Employee-" . time() . '.' . $new_img->getClientOriginalExtension();
            $new_img->move('Uploads/Employee/Image/', $name);
            $employee->photo = $name;
        } else {
            $employee->photo =  $employee->photo;
        }
        $update = $employee->save();
        // dd($update);
        if ($update) {
            return redirect()->route('employee.index')->with('success', 'Employee details updated successfully');
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
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employee.index')->with('success', 'Deleted Successfully');
    }
}
