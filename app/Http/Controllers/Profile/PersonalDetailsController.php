<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile\PersonalDetail;

class PersonalDetailsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'about' =>'required|min:10 |max:100',
            'temporary_address' => 'required',
            'permanent_address' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'ctzn_front' => 'required',
            'ctzn_back' => 'required'
        ]);
        $prsnl = new PersonalDetail([            
            'user_id' => $request->user_id,
            'about' => $request->about,
            'permanent_address' => $request->permanent_address,
            'temporary_address' => $request->temporary_address,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,               
       ]);
    if ($request->hasFile('ctzn_front')) {
        $image = $request->file('ctzn_front');
        $name = "CTZN-".time().'.'. $image->getClientOriginalExtension();           
        $image->move('Uploads/Citizenship/',$name); 
        // $prsnl->ctzn_front = $name;          
    }
    // dd($name);
    if ($request->hasFile('ctzn_back')) {
        $image = $request->file('ctzn_back');
        $bck = "CTZN-".time() .'.'. $image->getClientOriginalExtension();           
        $image->move('Uploads/Citizenship/',$bck);            
    }
    
   $prsnl->ctzn_front = $name;
   $prsnl->ctzn_back =$bck; 
//    dd($prsnl);
   $data = $prsnl->save();
//    dd($data);
    
    if($data){
        return redirect()->back()->with('success','Personal Details added successfully !!!');
    }else {
        return redirect()->back()->with('error', 'There occurred some problem , please try again after a while.');
    }
}
public function edit($id)
{
    $prsnl = PersonalDetail::findOrFail($id);
    return redirect()->back();
}
public function update(Request $request, $id)
{
    $prsnl = PersonalDetail::find($id);
    $request->validate([
        'about' =>'required|min:10 |max:100',
        'temporary_address' => 'required',
        'permanent_address' => 'required',
        'gender' => 'required',
        'date_of_birth' => 'required'
    ]);
    $prsnl->user_id = $request->user_id;
    $prsnl->temporary_address = $request->temporary_address;
    $prsnl->permanent_address = $request->permanent_address;
    $prsnl->gender = $request->gender;
    $prsnl->date_of_birth = $request->date_of_birth;
    $update = $prsnl->save();
    if($update){
        return redirect()->back()->with('success','Personal details updated successfully');
    }else{
       return redirect()->back()->with('error','Errors Occurred !!!');
   }
}

}
