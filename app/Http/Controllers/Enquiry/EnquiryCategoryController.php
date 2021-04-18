<?php

namespace App\Http\Controllers\Enquiry;

use App\Http\Controllers\Controller;
use App\Models\Enquiry\EnquiryCategory;
use Illuminate\Http\Request;

class EnquiryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = EnquiryCategory::orderBy('id', 'desc')->get();
        return view('Enquiry.EnquiryCategory.view',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Enquiry.EnquiryCategory.add');
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
            'categoryname'=>'required',
            'description'=>'',
        ]);
        $data = $request->all();
        $category = EnquiryCategory::create($data);
        return redirect()->route('enquirycategory.index')->with('success', 'New Category added sucessfully');
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
        $category = EnquiryCategory::findOrFail($id);
        return view('Enquiry.EnquiryCategory.edit', compact('category'));
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
        $category = EnquiryCategory::findOrFail($id);
        $request->validate([
            'categoryname'=>'required',
            'description'=>'',
        ]);
        $category->categoryname = $request->categoryname;
        $category->description = $request->description;
        $update = $category->save();
        // dd($update);
        if ($update) {
            return redirect()->route('enquirycategory.index')->with('success', 'Enquiry Category Details updated successfully');
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
        $category = EnquiryCategory::find($id);
        $category->delete();
        return redirect()->route('enquirycategory.index')->with('success', 'Deleted Successfully');
    }
}
