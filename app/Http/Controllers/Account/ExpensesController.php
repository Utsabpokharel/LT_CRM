<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\Expense;
use App\Models\Account\ExpenseCategory;
use App\Models\Admin\Employee;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense = Expense::all();
        return view('Account.Expense.view',compact('expense'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expensecategory=ExpenseCategory::all();
        $employee = Employee::all();
        return view('Account.Expense.add',compact('expensecategory','employee'));
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
            'expensecategory' =>'required',
            'particular'=>'required',
            'amount'=>'required',
            'date' =>'required',
            'mode'=>'required',
            'paid_by'=>'required',
            'paid_to'=>'required',
        ]);
        $data = $request->all();
        $expense= Expense::create($data);
        return redirect()->route('expense.index')->with('success', 'Expense added sucessfully');
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
        $expense = Expense::findOrFail($id);
        $expensecategory=ExpenseCategory::all();
        $employee = Employee::all();
        return view('Account.Expense.edit',compact('expensecategory','employee','expense'));
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
        $expense = Expense::findOrFail($id);
        $request->validate([
            'expensecategory' =>'required',
            'particular'=>'required',
            'amount'=>'required',
            'date' =>'required',
            'mode'=>'required',
            'paid_by'=>'required',
            'paid_to'=>'required',
        ]);
        $expense->expensecategory = $request->expensecategory;
        $expense->particular = $request->particular;
        $expense->amount = $request->amount;
        $expense->date = $request->date;
        $expense->mode = $request->mode;
        $expense->paid_by = $request->paid_by;
        $expense->paid_to = $request->paid_to;
        $expense->remarks = $request->remarks;
        $expense->entry_by = $request->entry_by;
        $update = $expense->save();
        // dd($update);
        if ($update) {
            return redirect()->route('expense.index')->with('success', 'Expense  Updated sucessfully');
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
        $expense = Expense::find($id);
        $expense->delete();
        return redirect()->route('expense.index')->with('success', 'Deleted Successfully');
    }
}
