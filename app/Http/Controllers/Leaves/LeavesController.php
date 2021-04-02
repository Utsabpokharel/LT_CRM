<?php

namespace App\Http\Controllers\Leaves;

use App\Http\Controllers\Controller;
use App\Models\Admin\AllUser;
use App\Models\Leaves\Leave;
use App\Models\Leaves\LeaveType;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        $d = Carbon::now();
        return view('Leave.Leaves.add', compact('leavetype', 'd'));
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
        // $email = DB::table('all_users')->where('role_id', '1')->select('email')->get();
        // Mail::to($email)->send(new LeaveApplyMail());
        if ($leave) {
            // if (Auth::user()->role_id == 1) {
            //     return redirect()->route('leave.index')->with('success', 'Leave has been applied Successfully');
            // } else {
                return redirect()->route('myLeaves')->with('success', 'Leave has been applied Successfully');
            // }
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
        // $leave = leave::findOrFail($id);
        // return view('Admin.Leaves.details', compact('leave'));
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
        $leave->checked_by = '22';
        // $leave->checked_by = Auth::user()->id;
        $leave->checked_on = Carbon::now();
        $update = $leave->update();
        if ($update) {
            // $applied_usr = $leave->applied_by;
            // $assig_user = AllUser::find($applied_usr);

            // Mail::to($assig_user->email)->send(new LeaveApproveMail());
            return redirect()->route('leave.index')->with('success', 'Leave Approved Successfully !!!');
        } else {
            return redirect()->back()->with('error', 'sorry there was an error Re_Assigning Task');
        }
    }
    public function reject(Request $request, $id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status = '0';
        $leave->checked_by = '44';
        // $leave->checked_by = Auth::user()->id;
        $leave->checked_on = Carbon::now();
        $update = $leave->update();
        if ($update) {
            // $applied_usr = $leave->applied_by;
            // $assig_user = allUser::find($applied_usr);

            // Mail::to($assig_user->email)->send(new LeaveRejectMail());
            return redirect()->route('leave.index')->with('success', 'Leave Rejected Successfully !!!');
        } else {
            return redirect()->back()->with('error', 'sorry there was an error Re_Assigning Task');
        }
    }
    public function employeeLeave()
    {
        // $leave = Leave::where('applied_by', Auth::user()->id)->get();
        $leave = Leave::where('applied_by', '0')->get();
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