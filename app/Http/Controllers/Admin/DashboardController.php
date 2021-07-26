<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AllUser;
use App\Models\Admin\Customer;
use App\Models\Admin\Department;
use App\Models\Admin\Employee;
use App\Models\Enquiry\Enquiry;
use App\Models\Leaves\Leave;
use App\Models\Task\ToDo;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $usr = AllUser::count();
        $employee = Employee::count();
        $customer = Customer::count();
        $task = ToDo::orderBy('id', 'desc')->get();
        $todo = ToDo::count();
        $assigned = ToDo::orderBy('id', 'desc')->where('assignedBy', Auth::user()->id)
            ->orWhere('ReAssignedBy', Auth::user()->id)->count();
        $received = ToDo::orderBy('id', 'desc')->Where('assignedTo', Auth::user()->id)
            ->orWhere('reAssignedTo', Auth::user()->id)->count();
        $department = Department::count();
        $enquiry = Enquiry::count();
        $pending_tasks = ToDo::where('status', '0')->get()->count();
        $leave = Leave::orderBy('id', 'desc')->get();
        // dd($leave->employee_id);
        $leaves = Leave::paginate(5);
        // $emp = Employee::where('staff_id', $leave->employee_id);
        $emply = Leave::orderBy('id', 'desc')->first();
        $emp = Employee::where('staff_id', $emply->employee_id)->first();
        // dd($emp);

        $pending_leaves = Leave::where([
            ['applied_by', Auth::user()->id],
            ['status', 'Pending'],
        ])->count();
        return view('index', compact(
            'usr',
            'employee',
            'todo',
            'customer',
            'department',
            'leaves',
            'enquiry',
            'pending_tasks',
            'leave',
            'task',
            'pending_leaves',
            'assigned',
            'received',
            'emp'
        ));
    }
    public function notifications()
    {
        $notify = DB::table('notifications')->get();
        return view('Admin.Layout.master', compact('notify'));
    }
}
