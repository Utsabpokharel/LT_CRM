@extends('Admin.Layout.master')
@section('title', 'Tasks Details')
@section('content')
<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('todo.index')}}">Tasks</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Tasks Details</li>
    </ol>
</div>
<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 row">
            <div class="col-md-6">
                <h6 class="font-weight-bold text-primary">All Details</h6>
            </div>

        </div>
        <div class="card-body text-white text-center" style="background: rgba(136, 134, 134, 0.603)">
            <div class="form-group row">
                <label class="control-label col-md-2">Title :
                </label>
                <div class="col-md-6">
                    {{$todo->title}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Task Description :
                </label>
                <div class="col-md-6">
                    {!! $todo->description !!}
                </div>
            </div>
            <hr>
            @if ($todo->ReUser_id)
            <div class="form-group row">
                <label class="control-label col-md-2">Re-Assigned By :
                </label>
                <div class="col-md-6">
                    {{$todo->ReAssignedBy}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Re-Assigned To :
                </label>
                <div class="col-md-6">
                    @foreach ($todo->employee as $user)
                    <td> {{$loop->index+1}}) {{ $user->firstname }} {{ $user->lastname }}</td> <br>
                    @endforeach
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Re-Assign Reason :
                </label>
                <div class="col-md-6">
                    {!! $todo->reason !!}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Re-Assigned on :
                </label>
                <div class="col-md-6">
                    {{$todo->reAssignedDate}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Re-Assigned Deadline :
                </label>
                <div class="col-md-6">
                    {{$todo->reDeadline}}
                </div>
            </div>
            <hr>
            @else
            <div class="form-group row">
                <label class="control-label col-md-2">Assigned Date :
                </label>
                <div class="col-md-6">
                    {{$todo->assignedDate}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Assigned To :
                </label>
                <div class="col-md-6">
                    {{-- {{$todo->employee['firstname']}} --}}
                    {{-- {{$todo->pivot}} --}}
                    @foreach ($todo->employee as $user)
                    <td> {{$loop->index+1}}) {{ $user->firstname }} {{ $user->lastname }}</td> <br>
                    @endforeach

                    {{-- {{$todo}} --}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Assigned By :
                </label>
                <div class="col-md-6">
                    {{$todo->superadmin->firstname}} {{$todo->superadmin->lastname}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Deadline :
                </label>
                <div class="col-md-6">
                    {{$todo->deadline}}
                </div>
            </div>
            <hr>
            @endif
            <div class="form-group row">
                <label class="control-label col-md-2">Task Priority :
                </label>
                <div class="col-md-6">
                    {{$todo->task_priority}}
                </div>
            </div>
            <hr>
            @if ($todo->fileUpload != [])
            <div class="form-group row">
                <label class="control-label col-md-2">Attached File :
                </label>
                <div class="col-md-6">
                    <a href="{{asset('Uploads/ToDOFiles/'.$todo->fileUpload)}}" download>{{$todo->fileUpload}}</a>
                </div>
            </div>
            <hr>
            @endif
            <div class="form-group row">
                <label class="control-label col-md-2">Todo Status :
                </label>
                <div class="col-md-6">
                    @if ($todo->status == '0')
                    Pending
                    @elseif ($todo->status == '1')
                    Completed
                    @else
                    Re-Assigned
                    @endif

                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Remarks :
                </label>
                <div class="col-md-6">
                    {!! $todo->remarks !!}
                </div>
            </div>
            <hr>
            @if ($todo->completedDate != [])
            <div class="form-group row">
                <label class="control-label col-md-2">Completed On :
                </label>
                <div class="col-md-6">
                    {{$todo->completedDate}}
                </div>
            </div>
            <hr>
            @endif

        </div>
    </div>

</div>

@endsection
