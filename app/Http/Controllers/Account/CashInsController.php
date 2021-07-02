<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\CashIn;
use App\Models\Admin\Employee;
use Illuminate\Http\Request;

class CashInsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashIn = CashIn::all();
        return view('Account.CashIn.view', compact('cashIn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Employee::all();
        return view('Account.CashIn.add', compact('employee'));
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
            'cash_from' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'mode' => 'required',
            'received_by' => 'required',
            'description' => 'required',
        ]);
        $data = $request->all();
        $cashIn = CashIn::create($data);
        return redirect()->route('cashIn.index')->with('success', 'CashIn added sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cashIn = CashIn::findOrFail($id);
        return view('Account.CashIn.details', compact('cashIn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cashIn = CashIn::findOrFail($id);
        $employee = Employee::all();
        return view('Account.CashIn.edit', compact('employee', 'cashIn'));
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
        $cashIn = CashIn::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'cash_from' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'mode' => 'required',
            'received_by' => 'required',
            'description' => 'required',
        ]);
        $cashIn->title = $request->title;
        $cashIn->cash_from = $request->cash_from;
        $cashIn->amount = $request->amount;
        $cashIn->date = $request->date;
        $cashIn->mode = $request->mode;
        $cashIn->received_by = $request->received_by;
        $cashIn->description = $request->description;
        $cashIn->remarks = $request->remarks;
        $cashIn->entry_by = $request->entry_by;
        $update = $cashIn->save();
        // dd($update);
        if ($update) {
            return redirect()->route('cashIn.index')->with('success', 'CashIn  Updated sucessfully');
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
        $cashIn = CashIn::find($id);
        $cashIn->delete();
        return redirect()->route('cashIn.index')->with('success', 'Deleted Successfully');
    }
}
