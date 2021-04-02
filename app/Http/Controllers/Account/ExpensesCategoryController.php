<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\ExpenseCategory;
use Illuminate\Http\Request;

class ExpensesCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $exp_category = ExpenseCategory::all();
        return view('Account.ExpenseCategory.view',compact('exp_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Account.ExpenseCategory.add');
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
            'category_id' =>'required',
            'categoryname'=>'required',
            'description'=>'required',
        ]);
        $data = $request->all();
        $exp_category= ExpenseCategory::create($data);
        return redirect()->route('expensecategory.index')->with('success', 'Expense Category added sucessfully');
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
        $exp_category = ExpenseCategory::findorfail($id);
        return view('Account.ExpenseCategory.edit', compact('exp_category'));
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
        $exp_category = ExpenseCategory::findorfail($id);
        $request->validate([
            'category_id' =>'required',
            'categoryname'=>'required',
            'description'=>'required',
        ]);
        $exp_category->category_id = $request->category_id;
        $exp_category->categoryname = $request->categoryname;
        $exp_category->description = $request->description;
        $update = $exp_category->save();
        // dd($update);
        if ($update) {
            return redirect()->route('expensecategory.index')->with('success', 'Expense Category Updated sucessfully');
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
        $exp_category = ExpenseCategory::find($id);
        $exp_category->delete();
        return redirect()->route('expensecategory.index')->with('success', 'Deleted Successfully');
    }
}