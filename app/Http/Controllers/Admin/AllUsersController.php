<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AllUser;
use App\Models\Admin\Role;
use App\Models\Admin\Customer;
use App\Models\Admin\Employee;
use Illuminate\Support\Facades\Hash;
use Thebikramlama\Sparrow\Sparrow;

class AllUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = AllUser::orderBy('id', 'desc')->get();
        // dd($user);
        return view('Admin.AllUser.view', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        $customer = Customer::all();
        $employee = Employee::all();
        return view('Admin.AllUser.add', compact('role', 'customer', 'employee'));
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
            'username' => 'required|unique:all_users',
            'email' => 'required|unique:all_users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'status' => 'required',
            'role' => 'required'
        ]);

        $data = $request->except('confirm_password');

        $password = Hash::make($request->password);
        $data['password'] = $password;
        $user = AllUser::create($data);

        return redirect()->route('user.index')->with('success', 'User added sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = AllUser::findorfail($id);
        return view('Admin.AllUser.details', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::all();
        $customer = Customer::all();
        $employee = Employee::all();
        $user = AllUser::findorfail($id);
        return view('Admin.AllUser.edit', compact('user', 'role', 'customer', 'employee'));
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
        $user = AllUser::find($id);
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'status' => 'required',
            'role' => 'required'
        ]);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->status = $request->status;
        $update = $user->save();
        // dd($update);
        if ($update) {
            return redirect()->route('user.index')->with('success', 'Users details updated successfully');
        } else {
            return redirect()->back()->with('error', 'Some error occured while updating Admin');
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
        $user = AllUser::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Deleted Successfully');
    }
}
