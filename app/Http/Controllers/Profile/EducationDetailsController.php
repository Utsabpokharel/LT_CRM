<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Profile\EducationDetail;
use Illuminate\Http\Request;

class EducationDetailsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'degree' => 'required',
            'board' => 'required',
            'division' => 'required',
            'passed_year' => 'required',
            'institute_name' => 'required',
            'institute_address' => 'required',
            'faculty' => 'required'
        ]);
        $educ = new EducationDetail([
            'user_id' => $request->user_id,
            'degree' => $request->degree,
            'board' => $request->board,
            'faculty' => $request->faculty,
            'passed_year' => $request->passed_year,
            'division' => $request->division,
            'institute_name' => $request->institute_name,
            'institute_address' => $request->institute_address,
        ]);
        $data = $educ->save();
        //    dd($data);

        if ($data) {
            return redirect()->back()->with('success', 'Education Details added successfully !!!');
        } else {
            return redirect()->back()->with('error', 'There occurred some problem , please try again after a while.');
        }
    }
    public function edit($id)
    {
        $educ = EducationDetail::findOrFail($id);
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $educ = EducationDetail::find($id);
        $request->validate([
            'degree' => 'required',
            'board' => 'required',
            'division' => 'required',
            'passed_year' => 'required',
            'institute_name' => 'required',
            'institute_address' => 'required',
            'faculty' => 'required'
        ]);
        $educ->user_id = $request->user_id;
        $educ->institute_name = $request->institute_name;
        $educ->institute_address = $request->institute_address;
        $educ->degree = $request->degree;
        $educ->board = $request->board;
        $educ->faculty = $request->faculty;
        $educ->division = $request->division;
        $educ->passed_year = $request->passed_year;
        $update = $educ->save();
        if ($update) {
            return redirect()->back()->with('success', 'Education details updated successfully');
        } else {
            return redirect()->back()->with('error', 'Errors Occurred !!!');
        }
    }
}
