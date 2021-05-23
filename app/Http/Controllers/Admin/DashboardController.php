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
        $leaves = Leave::paginate(5);
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
            'received'
        ));
    }
}
