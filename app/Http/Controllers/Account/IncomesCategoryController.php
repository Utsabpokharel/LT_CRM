<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\IncomeCategory;
use Illuminate\Http\Request;

class IncomesCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inc_category = IncomeCategory::all();
        return view('Account.IncomeCategory.view',compact('inc_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Account.IncomeCategory.add');
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
        $inc_category= IncomeCategory::create($data);
        return redirect()->route('incomecategory.index')->with('success', 'Income Category added sucessfully');
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
        $inc_category = IncomeCategory::findorfail($id);
        return view('Account.IncomeCategory.edit', compact('inc_category'));
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
        $inc_category = IncomeCategory::findorfail($id);
        $request->validate([
            'category_id' =>'required',
            'categoryname'=>'required',
            'description'=>'required',
        ]);
        $inc_category->category_id = $request->category_id;
        $inc_category->categoryname = $request->categoryname;
        $inc_category->description = $request->description;
        $update = $inc_category->save();
        // dd($update);
        if ($update) {
            return redirect()->route('incomecategory.index')->with('success', 'Income Category Updated sucessfully');
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
        $inc_category = IncomeCategory::find($id);
        $inc_category->delete();
        return redirect()->route('incomecategory.index')->with('success', 'Deleted Successfully');
    }
}