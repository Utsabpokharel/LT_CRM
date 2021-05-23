<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Role;
use App\Models\Admin\Employee;
use App\Models\Admin\Customer;
use App\Models\Profile\EducationDetail;
use App\Models\Profile\WorkDetail;
use App\Models\Profile\PersonalDetail;
use App\Models\Profile\BankAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $role = Role::all();
        // $employee = Employee::where('email', Auth::user()->email)->find(1);
        $employee = DB::table('employees')->where('email', Auth::user()->email)->first();
        // $customer = Customer::where('email', Auth::user()->email)->find(1);
        $customer = DB::table('customers')->where('email', Auth::user()->email)->first();
        // $bank = BankAccount::where('user_id', Auth::user()->email)->first();
        $bank = DB::table('bank_accounts')->where('user_id', Auth::user()->email)->first();
        $educ =  EducationDetail::where('user_id', '=', Auth::user()->id)->first();
        $wrk =  WorkDetail::where('user_id', '=', Auth::user()->id)->first();
        $prsnl =  PersonalDetail::where('user_id', '=', Auth::user()->id)->first();
        // $bank = BankAccount::where('user_id', Auth::user()->email)->find(1);
        // dd($employee->email);
        // dd($bank);
        return view('Profile.Profile.overview', compact('educ', 'wrk', 'prsnl', 'role', 'employee', 'customer', 'bank'));
    }
    public function update()
    {

        $educ =  EducationDetail::where('user_id', '=', Auth::user()->id)->first();
        $wrk =  WorkDetail::where('user_id', '=', Auth::user()->id)->first();
        $prsnl =  PersonalDetail::where('user_id', '=', Auth::user()->id)->first();
        return view('Profile.Profile.update', compact('educ', 'wrk', 'prsnl'));
    }
}
