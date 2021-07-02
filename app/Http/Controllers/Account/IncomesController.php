<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\Income;
use App\Models\Account\IncomeCategory;
use App\Models\Admin\Employee;
use Illuminate\Http\Request;

class IncomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $income = Income::all();
        return view('Account.Income.view', compact('income'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $incomecategory = IncomeCategory::all();
        $employee = Employee::all();
        return view('Account.Income.add', compact('incomecategory', 'employee'));
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
            'incomecategory' => 'required',
            'particular' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'mode' => 'required',
            'paid_by' => 'required',
            'received_by' => 'required',
        ]);
        $data = $request->all();
        $income = Income::create($data);
        return redirect()->route('income.index')->with('success', 'Income  added sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $income = Income::findOrFail($id);
        return view('Account.Income.details', compact('income'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $income = Income::findOrFail($id);
        $incomecategory = IncomeCategory::all();
        $employee = Employee::all();
        return view('Account.Income.edit', compact('incomecategory', 'employee', 'income'));
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
        $income = Income::findOrFail($id);
        $request->validate([
            'incomecategory' => 'required',
            'particular' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'mode' => 'required',
            'paid_by' => 'required',
            'received_by' => 'required',
        ]);
        $income->incomecategory = $request->incomecategory;
        $income->particular = $request->particular;
        $income->amount = $request->amount;
        $income->date = $request->date;
        $income->mode = $request->mode;
        $income->paid_by = $request->paid_by;
        $income->received_by = $request->received_by;
        $income->remarks = $request->remarks;
        $income->entry_by = $request->entry_by;
        $update = $income->save();
        // dd($update);
        if ($update) {
            return redirect()->route('income.index')->with('success', 'Income  Updated sucessfully');
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
        $income = Income::find($id);
        $income->delete();
        return redirect()->route('income.index')->with('success', 'Deleted Successfully');
    }
}
