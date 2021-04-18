<?php

namespace App\Http\Controllers\Enquiry;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use App\Models\Enquiry\Enquiry;
use App\Models\Enquiry\EnquiryCategory;
use App\Models\Enquiry\EnquirySource;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquiry = Enquiry::orderBy('id', 'desc')->get();
        return view('Enquiry.Enquiries.view',compact('enquiry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $customer = Customer::all();
       $category = EnquiryCategory::all();
       $source = EnquirySource::all();
       return view('Enquiry.Enquiries.add',compact('customer','category','source'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'is_customer' => '',
                'customer_id' => '',
                'name' => '',
                'email' => '',
                'phone' => '',
                'date' => 'required|date',
                'time' => 'required',
                'category_id' => 'required',
                'source_id' => 'required',
                'remarks' => ''
            ]
        );
        $data = $request->all();
        $enquiry = Enquiry::create($data);
        return redirect()->route('enquiry.index')->with('success', 'New Enquiry added sucessfully');
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
        $category = EnquiryCategory::all();
        $source = EnquirySource::all();
        $customer = Customer::all();
        $enquiry = Enquiry::findorfail($id);
        return view('Enquiry.Enquiries.edit', compact('enquiry', 'source', 'category', 'customer'));
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
        $enquiry = Enquiry::findorfail($id);
        $request->validate(
            [
                'is_customer' => '',
                'customer_id' => '',
                'name' => '',
                'email' => '',
                'phone' => '',
                'date' => 'required|date',
                'time' => 'required',
                'category_id' => 'required',
                'source_id' => 'required',
                'remarks' => ''
            ]
        );
        $enquiry->is_customer = $request->is_customer;
        $enquiry->customer_id = $request->customer_id;
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->phone = $request->phone;
        $enquiry->date = $request->date;
        $enquiry->time = $request->time;
        $enquiry->category_id = $request->category_id;
        $enquiry->source_id = $request->source_id;
        $enquiry->remarks = $request->remarks;
        $update = $enquiry->save();
        // dd($update);
        if ($update) {
            return redirect()->route('enquiry.index')->with('success', 'Enquiry Details updated successfully');
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
        $enquiry = Enquiry::find($id);
        $enquiry->delete();
        return redirect()->route('enquiry.index')->with('success', 'Deleted Successfully');
    }
}