<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile\WorkDetail;

class WorkDetailsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'experiences' =>'required',
            'skills' => 'required',
            'projects' => 'required',
        ]);
        $wrk = new WorkDetail([            
            'user_id' => $request->user_id,
            'experiences' => $request->experiences,
            'skills' => $request->skills,
            'projects' => $request->projects,              
       ]);
   $data = $wrk->save();
//    dd($data);
    
    if($data){
        return redirect()->back()->with('success','Work Details added successfully !!!');
    }else {
        return redirect()->back()->with('error', 'There occurred some problem , please try again after a while.');
    }
}
public function edit($id)
{
    $wrk = WorkDetail::findOrFail($id);
    return redirect()->back();
}
public function update(Request $request, $id)
{
    $wrk = WorkDetail::find($id);
    $request->validate([
        'experiences' =>'required',
        'skills' => 'required',
        'projects' => 'required',
    ]);
    $wrk->user_id = $request->user_id;
    $wrk->experiences = $request->experiences;
    $wrk->skills = $request->skills;
    $wrk->projects = $request->projects;
    $update = $wrk->save();
    if($update){
        return redirect()->back()->with('success','Work details updated successfully');
    }else{
       return redirect()->back()->with('error','Errors Occurred !!!');
   }
}
}
