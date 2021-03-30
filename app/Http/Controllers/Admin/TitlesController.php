<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Title;

class TitlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = Title::all();
        return view('Admin.Title.view',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Title.add');
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
            'titlename'=>'required|unique:titles',                      
            'description'=>'required',            
        ]);

        $data = $request->all();            
        $title = Title::create($data);        
        return redirect()->route('title.index')->with('success', 'Title added sucessfully');
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
        $title = Title::findorfail($id);
        return view('Admin.Title.edit', compact('title'));
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
        $title = Title::findorfail($id);
        $request->validate([          
            'titlename'=>'required',                        
            'description'=>'required',            
        ]);       
        $title->titlename = $request->titlename;
        $title->description = $request->description;
        $update = $title->save();
        // dd($update);
        if ($update) {
            return redirect()->route('title.index')->with('success', 'Title updated successfully');
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
        $title = Title::find($id);
        $title->delete();
        return redirect()->route('title.index')->with('success', 'Deleted Successfully');
    }
}
