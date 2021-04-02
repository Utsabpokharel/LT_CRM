@extends('Admin.Layout.master')
@section('title', 'Add Task')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('todo.index')}}">Tasks</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Add Task</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <form class="user" method="post" action="{{route('todo.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-4">Title
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="title" required placeholder="Enter Task Title"
                                id="exampleInputEmail" class="form-control  @error('title') is-invalid @enderror"
                                value="{{old('title','')}}" />
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Deadline
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8" data-date-format="yyyy-mm-dd">
                            <input type="date" name="deadline" required placeholder="Enter Deadline"
                                id="exampleInputEmail" class="form-control @error('deadline') is-invalid @enderror"
                                value="{{old('deadline','')}}" />
                            @error('deadline')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Description
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <textarea name="description" required placeholder="Enter Task Details" id="exampleInputText"
                                class="form-control   @error('description') is-invalid @enderror"
                                value="{{old('description','')}}"> </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">File (if any)
                            <span class="required text-danger"> </span>
                        </label>
                        <div class="col-md-8">
                            <input type="file" name="fileUpload" id="exampleInputEmail"
                                class="form-control  @error('fileUpload') is-invalid @enderror"
                                value="{{old('fileUpload','')}}" />
                            @error('fileUpload')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-4">Assign To
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <select class="form-control  @error('assignedTo') is-invalid @enderror" name="assignedTo">
                                <option value="" disabled selected>-----Select User-----</option>
                                @foreach($employee as $staff)
                                <option value="{{$staff->id}}">{{$staff->firstname}} {{$staff->lastname}}</option>
                                @endforeach
                            </select>
                            @error('assignedTo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Task Priority
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <select class="form-control  @error('task_priority') is-invalid @enderror"
                                name="task_priority">
                                <option value="" disabled selected>-----Select Task Priority-----</option>
                                <option value="High" {{old('task_priority')=='High'?'selected':''}}>High</option>
                                <option value="Low" {{old('task_priority')=='Low'?'selected':''}}>Low</option>
                                <option value="Medium" {{old('task_priority')=='Medium'?'selected':''}}>Medium</option>
                                <option value="Urgent" {{old('task_priority')=='Urgent'?'selected':''}}>Urgent</option>
                            </select>
                            @error('task_priority')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Remarks
                            <span class="required text-danger"> </span>
                        </label>
                        <div class="col-md-8">
                            <textarea name="remarks" required placeholder="Enter Task Details" id="exampleInputText"
                                class="form-control   @error('remarks') is-invalid @enderror"
                                value="{{old('remarks','')}}"> </textarea>
                            @error('remarks')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- User Id -->

        <input type="hidden" class="form-control" value="001" required readonly name="user_id" />

        <!-- Completed Date-->
        <input size="60" type="hidden" readonly name="completedDate">

        <!-- Assigned date-->
        <input type="hidden" class="form-control" value="{{$d}}" required readonly name="assignedDate" />

        <!-- Assigned by-->

        <input type="hidden" class="form-control" value="0000" required readonly name="assignedBy" />
        <!-- Status-->

        <input type="hidden" class="form-control" value="0" required readonly name="status" />
        <div class="form-actions p-3">
            <div class="row">
                <div class="offset-md-3 col-md-9">
                    <button type="submit" class="btn btn-success m-r-20">Submit</button>
                    <a class="btn btn-secondary" href="{{route('todo.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection
