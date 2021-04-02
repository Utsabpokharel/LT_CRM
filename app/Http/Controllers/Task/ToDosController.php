<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Admin\AllUser;
use Illuminate\Http\Request;
use App\Models\Admin\Employee;
use App\Models\Task\ToDo;
use Illuminate\Support\Carbon;

class ToDosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $this->toDo = $this->toDo->get();
        $todo = ToDo::orderBy('id', 'desc')->get();
        // $superAdmin = role::where('name', '=', 'super_admin')->first();
        // $employee = role::where('name', '=', 'employee')->first();

        // $superAdmin = allUser::where('role_id', '=', $superAdmin->id)->get();
        // $employee = allUser::where('role_id', '=', $employee->id)->get();

        return view('Task.view', compact('todo'));
        //  return view('Task.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $d = Carbon::now();
        $employee = Employee::all();
        return view('Task.add',compact(['d','employee']));
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
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'assignedDate' => 'required',
            'assignedTo' => 'required',
            'assignedBy' => 'required',
            'status' => 'required' ,
            'deadline' => 'required',
            'task_priority' => 'required',
        ]);
         $todo = new toDo([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'assignedDate' => $request->assignedDate,
            'completedDate' => $request->completedDate,
            'assignedTo' => $request->assignedTo,
            'assignedBy' => $request->assignedBy,
            'ReAssignedBy' => $request->ReAssignedBy,
            'reAssignedTo' => $request->reAssignedTo,
            'reAssignedDate' => $request->reAssignedDate,
            'reDeadline' => $request->reDeadline,
            'status' => $request->status,
            'remarks' => $request->remarks,
            'deadline' => $request->deadline,
            'task_priority' => $request->task_priority,
            'reason' => $request->reason,
        ]);
        if ($request->hasFile('fileUpload')) {
            $image = $request->file('fileUpload');
            $name = "ToDo-" . time() . '.' . $image->getClientOriginalExtension();
            $image->move('Uploads/ToDoFiles/', $name);
            $todo->fileUpload = $name;
        }
        $todos = $todo->save();
        if ($todos) {
                return redirect()->route('todo.index')->with('success', 'New Task Created Successfully');
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
        $d = Carbon::now();
        $employee = Employee::all();
        $todo = ToDo::findOrFail($id);
        return view('Task.Edit',compact('d','employee','todo'));
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
         $tasks = ToDo::findOrFail($id);
         $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'assignedDate' => 'required',
            'assignedTo' => 'required',
            'assignedBy' => 'required',
            'status' => 'required' ,
            'deadline' => 'required',
            'task_priority' => 'required',
        ]);
        $tasks->title = $request->title;
        $tasks->description = $request->description;
        $tasks->deadline = $request->deadline;
        $tasks->assignedTo = $request->assignedTo;
        $tasks->task_priority = $request->task_priority;
        $tasks->remarks = $request->remarks;
        if ($request->hasFile('fileUpload')) {
            if ($tasks->fileUpload != null) {
                unlink(public_path() . '/Uploads/ToDoFiles/' . $tasks->fileUpload);
            }
            $new_img = $request->file('fileUpload');
            $name = "ToDo-" . time() . '.' . $new_img->getClientOriginalExtension();
            $new_img->move('Uploads/ToDoFiles/', $name);
            $tasks->fileUpload = $name;
        } else {
            $tasks->fileUpload =  $tasks->fileUpload;
        }
        $update = $tasks->save();
        if ($update) {
            // if (Auth::user()->roles->name == 'admin') {
            //     return redirect()->route('assignTask')->with('success', 'Selected Task updated successfully');
            // } else {
                return redirect()->route('todo.index')->with('success', 'Selected Task updated successfully');
            // }
        } else {

            return redirect()->back()->with('error', 'Sorry the changes couldn\'t be made');
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
        $todo = ToDo::find($id);
        $todo->delete();
        return redirect()->route('todo.index')->with('success', 'Selected Task Deleted Successfully');
    }
    public function pending(Request $request, $id)
    {
        $todo = ToDo::findOrFail($id);
        $todo->status = 0;
        $todo->completedDate = null;
        $todo->update();
        return redirect()->back()->with('success', 'Task Status changed');
    }
    public function pendingTask(){
      $todo = ToDo::orderBy('id', 'desc')->where('status','=','0')->get();
    //   $pending = ToDo::where('status','=','0')->get()->count();
      return view('Task.pending',compact('todo'));
    }
    public function completeTask(){
      $todo = ToDo::orderBy('id', 'desc')->where('status','=','1')->get();
    //   $pending = ToDo::where('status','=','0')->get()->count();
      return view('Task.completed',compact('todo'));
    }
    public function complete(Request $request, $id)
    {
        //      dd($request->all());

        $todo = ToDo::findOrFail($id);
        $todo->status = 1;
        $todo->completedDate = date("Y-m-d H:i:s");
        $update = $todo->update();
        if ($update) {
            // if ($todo->ReUser_id) {
            //     $reAssigned_usr = $todo->ReUser_id;
            //     $assig_user = AllUser::find($reAssigned_usr);
            //     Mail::to($assig_user->email)->send(new TaskCompleteMail($todo->title));
            // } else {
            //     $assigned_usr = $todo->user_id;
            //     $assig_user = AllUser::find($assigned_usr);
            //     Mail::to($assig_user->email)->send(new TaskCompleteMail($todo->title));
            // }
            return redirect()->back()->with('success', 'Task Status changed to completed');
        } else {
            return redirect()->back()->with('error', 'sorry there was an error Re_Assigning Task');
        }
    }

    // public function reaassign($id)
    // {
    //     $d = Carbon::now();

    //     $todo = toDo::findOrFail($id);
    //     $superAdmin = role::where('name', '=', 'super_admin')->first();
    //     $employee = role::where('name', '=', 'employee')->first();

    //     $superAdmin = allUser::where('role_id', '=', $superAdmin->id)->get();
    //     $employee = allUser::where('role_id', '=', $employee->id)->get();

    //     return view('Admin.Task.reAssign', compact('d', 'superAdmin', 'employee', 'todo'));
    // }
    // public function editreaassign($id)
    // {
    //     $d = Carbon::now();
    //     // $this->toDo = $this->toDo->find($id);
    //     $todo = toDo::findOrFail($id);
    //     $superAdmin = role::where('name', '=', 'super_admin')->first();
    //     $employee = role::where('name', '=', 'employee')->first();

    //     $superAdmin = allUser::where('role_id', '=', $superAdmin->id)->get();
    //     $employee = allUser::where('role_id', '=', $employee->id)->get();

    //     return view('Admin.Task.edit-reAssign', compact('d', 'superAdmin', 'employee', 'todo'));
    // }
    // public function updateReassign(Request $request, $id)
    // {
    //     $user = @Auth::user();
    //     $d = Carbon::now();
    //     $todo = toDo::findOrFail($id);
    //     $todo->status = 0;
    //     $todo->reAssignedTo = $request->reAssignedTo;
    //     $todo->reAssignedDate = $request->reAssignedDate;
    //     $todo->reDeadline = $request->reDeadline;
    //     $todo->ReAssignedBy = $request->ReAssignedBy;
    //     $todo->reason = $request->reason;
    //     $update = $todo->update();
    //     if ($update) {
    //         $assigned_usr = $todo->reAssignedTo;
    //         $assig_user = allUser::find($assigned_usr);
    //         Mail::to($assig_user->email)->send(new TaskMail());
    //         return redirect()->route('assignTask', compact('d'))->with('success', 'Re-Assigned Task Updated Successfully !!!');
    //     } else {
    //         request()->redirect()->back()->with('error', 'sorry there was an error!!!');
    //     }
    // }
//     public function ReAssign(Request $request, $id, allUser $thread)
//     {

//         $user = @Auth::user();
//         $d = Carbon::now();
//         $todo = toDo::findOrFail($id);
//         $todo->status = 0;
//         $todo->reAssignedTo = $request->reAssignedTo;
//         $todo->reAssignedDate = $request->reAssignedDate;
//         $todo->reDeadline = $request->reDeadline;
//         $todo->ReAssignedBy = $request->ReAssignedBy;
//         $update = $todo->update();
//         if ($update) {
//             $assigned_usr = $todo->reAssignedTo;
//             $assig_user = allUser::find($assigned_usr);
//             Mail::to($assig_user->email)->send(new TaskMail());
//             return redirect()->route('task.index', compact('d'))->with('success', 'Task Re-Assigned Successfully !!!');
//         } else {
//             request()->session()->flash('error', 'sorry there was an error Re_Assigning Task');
//         }
//     }
 }