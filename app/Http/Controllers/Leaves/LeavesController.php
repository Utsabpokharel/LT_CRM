<?php

namespace App\Http\Controllers\Leaves;

use App\Http\Controllers\Controller;
use App\Mail\LeaveApplyMail;
use App\Mail\LeaveApproved;
use App\Mail\LeaveRejected;
use App\Models\Admin\AllUser;
use App\Models\Admin\Employee;
use App\Models\Leaves\Leave;
use App\Models\Leaves\LeaveType;
use App\Notifications\LeaveApply;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave = Leave::orderBy('id', 'desc')->get();
        $d = Carbon::today()->toDateString();

        return view('Leave.Leaves.view', compact('leave', 'd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leavetype = LeaveType::all();
        $emp_id = Employee::where('email', Auth::user()->email)->value('staff_id');
        // dd($emp_id);
        $d = Carbon::now();
        return view('Leave.Leaves.add', compact('leavetype', 'd', 'emp_id'));
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
            'leave_type' => 'required',
            'from' => 'required',
            'to' => 'required',
            'leave_reason' => 'required | min:10',
        ]);
        $create = $request->all();
        $leave = Leave::create($create);
        //mail
        $email = DB::table('all_users')->where('role', '1')->select('email')->get();
        Mail::to($email)->send(new LeaveApplyMail());
        //notifications
        // $employee = Employee::where('employee_id', $leave->employee_id)->first();
        // $appliedto = AllUser::where('role', '1')->get();
        // $thread = $employee->firstname . $employee->lastname;
        // dd($thread);
        // foreach ($appliedto as $user) {
        //     $user->notify(new LeaveApply($thread));
        // }
        if ($leave) {
            return redirect()->route('myLeaves')->with('success', 'Leave has been applied Successfully');
        } else {
            return redirect()->back()->with('error', 'Oops!!! some error occurred');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leave = Leave::findOrFail($id);
        $type = LeaveType::all();
        $employee = Employee::where('staff_id', $leave->employee_id)->first();
        return view('Leave.Leaves.details', compact('leave', 'employee', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leave = Leave::findOrFail($id);
        $leavetype = LeaveType::all();
        $d = Carbon::now();
        return view('Leave.Leaves.edit', compact('leave', 'leavetype', 'd'));
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
        $leave = Leave::find($id);
        $request->validate([
            'leave_type' => 'required',
            'from' => 'required',
            'to' => 'required',
            'leave_reason' => 'required | min:10',
        ]);
        $leave->leave_type = $request->leave_type;
        $leave->from = $request->from;
        $leave->to = $request->to;
        $leave->leave_reason = $request->leave_reason;

        $update = $leave->save();

        if (!$update) {
            return redirect()->back()->with('error', 'Sorry the changes couldn\'t be made');
        } else {
            return redirect()->route('myLeaves')->with('success', 'Leave Details Updated Successfully !!!');
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
        $leave = Leave::findOrFail($id);
        $leave->delete();

        return redirect()->route('myLeaves')->with('success', 'Selected Leave  has been deleted');
    }
    public function approve(Request $request, $id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status = '1';
        $leave->checked_by = Auth::user()->id;
        // $leave->checked_by = Auth::user()->id;
        $leave->checked_on = Carbon::now();
        $update = $leave->update();
        if ($update) {
            $applied_usr = $leave->applied_by;
            $assig_user = AllUser::find($applied_usr);

            Mail::to($assig_user->email)->send(new LeaveApproved());
            return redirect()->route('leave.index')->with('success', 'Leave Approved Successfully !!!');
        } else {
            return redirect()->back()->with('error', 'sorry there was an error Re_Assigning Task');
        }
    }
    public function reject(Request $request, $id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status = '0';
        $leave->checked_by = Auth::user()->id;
        // $leave->checked_by = Auth::user()->id;
        $leave->checked_on = Carbon::now();
        $update = $leave->update();
        if ($update) {
            $applied_usr = $leave->applied_by;
            $assig_user = allUser::find($applied_usr);

            Mail::to($assig_user->email)->send(new LeaveRejected());
            return redirect()->route('leave.index')->with('success', 'Leave Rejected Successfully !!!');
        } else {
            return redirect()->back()->with('error', 'sorry there was an error Re_Assigning Task');
        }
    }
    public function employeeLeave()
    {
        // $leave = Leave::where('applied_by', Auth::user()->id)->get();
        $leave = Leave::where('applied_by', Auth::user()->id)->get();
        $d = Carbon::today()->toDateString();
        return view('Leave.Leaves.myleaves', compact('leave', 'd'));
    }
    public function pending()
    {
        $leave = Leave::where('status', 'Pending')->get();
        $d = Carbon::today()->toDateString();

        return view('Leave.Leaves.pendingleaves', compact('leave', 'd'));
    }
    public function leaveApproved()
    {
        $leave = Leave::where('status', '1')->get();
        $d = Carbon::today()->toDateString();

        return view('Leave.Leaves.approvedleaves', compact('leave', 'd'));
    }
    public function leaveRejected()
    {
        $leave = Leave::where('status', '0')->get();
        $d = Carbon::today()->toDateString();
        return view('Leave.Leaves.rejectedleaves', compact('leave', 'd'));
    }
}
