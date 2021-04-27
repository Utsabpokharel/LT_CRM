<?php

namespace App\Http\Controllers\Enquiry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Customer;
use App\Models\Enquiry\EnquiryResponse;
use App\Models\Enquiry\Enquiry;
use Illuminate\Support\Carbon;

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
        // dd($enquiry->id);
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
        $data = $request->all();
        $source = EnquiryResponse::create($data);
        return redirect()->route('enquiryresponse.index')->with('success', 'New Source added sucessfully');
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
        //
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
        //
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
