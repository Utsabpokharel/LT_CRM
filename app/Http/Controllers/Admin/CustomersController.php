<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Customer;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::orderBy('id', 'desc')->get();
        // dd($customer);
        return view('Admin.Customer.view',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Admin.Customer.add');
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
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|unique:customers',
            'gender'=>'required',
            'photo'=>'image',
            'customer_type'=>'required',
            'contact_number'=>'required'
        ]);
         if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = "Customer-" . time() . '.' . $image->getClientOriginalExtension();
            $image->move('Uploads/Customer/Image/', $name);  
            $customer->photo = $name;          
        }   
        $customer = new Customer([            
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,            
            'gender' => $request->gender,
            'customer_type' => $request->customer_type,            
            'contact_number' => $request->contact_number,            
        ]);           
        $data = $customer->save();   
        if ($data) {
           return redirect()->route('customer.index')->with('success', 'Customer added sucessfully');
        } else {
            return redirect()->back()->with('error', 'Oops!!! some error occurred');        }     
       
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
        $customer = Customer::findorfail($id);
        return view('Admin.Customer.edit', compact('customer'));
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
         $customer = Customer::find($id);
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'gender'=>'required',            
            'customer_type'=>'required',
            'contact_number'=>'required'
        ]);    
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;       
        $customer->email = $request->email;
        $customer->gender = $request->gender;
        $customer->customer_type = $request->customer_type;
        $customer->contact_number = $request->contact_number;
        $update = $customer->save();
        // dd($update);
        if ($update) {
            return redirect()->route('customer.index')->with('success', 'Customers details updated successfully');
        } else {
            return redirect()->back()->with('error', 'Some error occured while updating Admin');
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
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customer.index')->with('warning', 'Deleted Successfully');
    }
}
