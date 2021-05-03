<?php

namespace App\Http\Controllers\Enquiry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Customer;
use App\Models\Enquiry\EnquiryResponse;
use App\Models\Enquiry\Enquiry;
use Illuminate\Support\Carbon;
use DB;

class EnquiryResponsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = EnquiryResponse::orderBy('id','desc')->get();
        return view('Enquiry.EnquiryResponse.view',compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        $enquiry = Enquiry::all();
        $d = Carbon::now();
        // $enquiry = DB::table('enquiries')->find($enq);
        // dd($enquiry);       
        return view('Enquiry.EnquiryResponse.add',compact('customer','d','enquiry'));
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
            'message'=>'required',
            'responded_through' => 'required'            
        ]);
        $response = new EnquiryResponse([
            'enquiry_id' => $request->enquiry_id,
            'responded_by' => $request->responded_by,
            'responded_through' => $request->responded_through,
            'message' => $request->message,
            'responded_on' => $request->responded_on,            
            'remarks' => $request->remarks,            
        ]);
        $data = $response->save();
        // dd($response);
        if ($data) {
            return redirect()->route('enquiryresponse.index')->with('success', 'New Response added sucessfully');
        } else {
            return redirect()->back()->with('error', 'Oops!!! some error occurred');
        }       
       
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
        $response = EnquiryResponse::findOrFail($id);
        $customer = Customer::all();
        $enquiry = Enquiry::find($id);
        $d = Carbon::now();
        // dd($response);
        return view('Enquiry.EnquiryResponse.edit',compact('customer','d','response','enquiry'));
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
        $response = EnquiryResponse::findOrFail($id);
        $request->validate([
            'message'=>'required',
            'responded_through' => 'required'            
        ]);
        $response->enquiry_id = $request->enquiry_id;
        $response->responded_by = $request->responded_by;
        $response->responded_through = $request->responded_through;
        $response->responded_on = $request->responded_on;
        $response->message = $request->message;
        $response->remarks = $request->remarks;
        $update = $response->save();
        // dd($update);
        if ($update) {
            return redirect()->route('enquiryresponse.index')->with('success', 'Enquiry Response Details updated successfully');
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
        //
    }
}
