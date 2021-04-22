<?php

namespace App\Http\Controllers\Enquiry;

use App\Http\Controllers\Controller;
use App\Models\Enquiry\EnquirySource;
use Illuminate\Http\Request;

class EnquirySourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $source = EnquirySource::orderBy('id','desc')->get();
        //  dd($source);
        return view('Enquiry.EnquirySource.view',compact('source'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Enquiry.EnquirySource.add');
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
            'source'=>'required',            
        ]);
        $data = $request->all();
        $source = EnquirySource::create($data);
        return redirect()->route('enquirysource.index')->with('success', 'New Source added sucessfully');
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
        $source = EnquirySource::findOrFail($id);
        return view('Enquiry.EnquirySource.edit', compact('source'));
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
        $source = EnquirySource::findOrFail($id);
        $request->validate([
            'source'=>'required',
            'description'=>'',
        ]);
        $source->source = $request->source;
        $source->description = $request->description;
        $update = $source->save();
        // dd($update);
        if ($update) {
            return redirect()->route('enquirysource.index')->with('success', 'Enquiry source Details updated successfully');
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
        $source = EnquirySource::find($id);
        $source->delete();
        return redirect()->route('enquirysource.index')->with('success', 'Source Deleted Successfully');
    }
}