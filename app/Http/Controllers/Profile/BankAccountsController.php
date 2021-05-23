<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use App\Models\Admin\Employee;
use App\Models\Profile\BankAccount;
use Illuminate\Http\Request;

class BankAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = BankAccount::all();
        return view('Profile.BankAccount.view', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Employee::all();
        $customer = Customer::all();
        return view('Profile.BankAccount.add', compact('employee', 'customer'));
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
            'account_holder' => 'required',
            'user_id' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
            'branch' => 'required',
        ]);

        $data = $request->all();
        $bankaccount = BankAccount::create($data);
        return redirect()->route('bankaccount.index')->with('success', 'Bank Account added sucessfully');
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
        $banks = BankAccount::findOrFail($id);
        $employee = Employee::all();
        $customer = Customer::all();
        return view('Profile.BankAccount.edit', compact('employee', 'customer', 'banks'));
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
        $banks = BankAccount::find($id);
        $request->validate([
            'account_holder' => 'required',
            'user_id' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
            'branch' => 'required',
        ]);
        $banks->account_holder = $request->account_holder;
        $banks->user_id = $request->user_id;
        $banks->account_number = $request->account_number;
        $banks->bank_name = $request->bank_name;
        $banks->branch = $request->branch;
        $banks->remarks = $request->remarks;
        $update = $banks->save();
        if ($update) {
            return redirect()->route('bankaccount.index')->with('success', 'Account details updated successfully');
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
        $banks = BankAccount::find($id);
        $banks->delete();
        return redirect()->route('bankaccount.index')->with('success', 'Account Details Deleted Successfully');
    }
}
