<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\CashOut;
use App\Models\Admin\Employee;
use Illuminate\Http\Request;

class CashOutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashOut = CashOut::all();
        return view('Account.CashOut.view', compact('cashOut'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Employee::all();
        return view('Account.CashOut.add', compact('employee'));
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
            'title' => 'required',
            'cash_to' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'mode' => 'required',
            'cashout_by' => 'required',
            'description' => 'required',
        ]);
        $data = $request->all();
        $cashOut = CashOut::create($data);
        return redirect()->route('cashOut.index')->with('success', 'CashOut added sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cashOut = CashOut::findOrFail($id);
        return view('Account.CashOut.details', compact('cashOut'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cashOut = CashOut::findOrFail($id);
        $employee = Employee::all();
        return view('Account.CashOut.edit', compact('employee', 'cashOut'));
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
        $cashOut = CashOut::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'cash_to' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'mode' => 'required',
            'cashout_by' => 'required',
            'description' => 'required',
        ]);
        $cashOut->title = $request->title;
        $cashOut->cash_to = $request->cash_to;
        $cashOut->amount = $request->amount;
        $cashOut->date = $request->date;
        $cashOut->mode = $request->mode;
        $cashOut->cashout_by = $request->cashout_by;
        $cashOut->description = $request->description;
        $cashOut->remarks = $request->remarks;
        $cashOut->entry_by = $request->entry_by;
        $update = $cashOut->save();
        // dd($update);
        if ($update) {
            return redirect()->route('cashOut.index')->with('success', 'CashOut  Updated sucessfully');
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
        $cashOut = CashOut::find($id);
        $cashOut->delete();
        return redirect()->route('cashOut.index')->with('success', 'Deleted Successfully');
    }
}
