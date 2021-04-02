@extends('Admin.Layout.master')
@section('title', 'Pending Tasks')
@section('content')
<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('todo.index')}}">Tasks</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Pending Tasks</li>
    </ol>
</div>
<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 row">
            <div class="col-md-6">
                <h6 class="font-weight-bold text-success">Pending Tasks</h6>
            </div>
            <div class="col-md-6">
                <a class="btn btn-success float-right" href="{{route('todo.create')}}">Add +</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Task Title</th>
                            <th>Deadline</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Task Title</th>
                            <th>Deadline</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    @foreach($todo as $task)
                    <tbody class="text-center">
                        <tr>
                            <th>{{$loop->index+1}}</th>
                            <td>{{$task->title}}</td>
                            <td>{{$task->deadline}}</td>
                            <td>{{$task->task_priority}}</td>
                            <td>
                                <div class="btn-group">
                                    @if($task->status==1)
                                    Completed
                                    @else
                                    <button class="btn btn-warning btn-xs dropdown-toggle no-margin" type="button"
                                        data-toggle="dropdown" aria-expanded="false">
                                        @if($task->status==0)
                                        Pending
                                        @endif
                                        <!-- <i class="fa fa-angle-down"></i> -->
                                    </button>
                                    <ul class="dropdown-menu pull-left" role="menu">
                                        <li>
                                            <a href="javascript:;">
                                                <form action="{{route('pending',$task->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <button class="btn btn-secondary" type="submit"><span
                                                            class=""></span>
                                                        Pending
                                                    </button>
                                                </form>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <form action="{{route('complete',$task->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <button class="btn  btn-success" type="submit">
                                                        <span class=""></span> Completed
                                                    </button>
                                                </form>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="javascript:;">
                                                <form action="#" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <button class="btn btn-info" type="submit">
                                                        <span class=""></span> Re-assign
                                                    </button>
                                                </form>
                                            </a>
                                        </li>
                                        @endif

                                    </ul>
                                </div>
                            </td>
                            <td>
                                @if($task->status==1)

                                <a href="#" class="btn-success btn-sm" type="submit"><span class="fa fa-eye"></span></a>

                                @else
                                <form action="{{route('todo.edit',$task->id)}}" method="GET"
                                    style="display: inline-block">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <button class="btn btn-primary btn-sm" type="submit"><span
                                            class="fa fa-edit"></span></button>
                                </form>
                                <form action="{{ route('todo.destroy', $task->id)}}" method="post"
                                    style="display: inline-block">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger btn-sm" type="submit"><span
                                            class="fa fa-trash"></span></button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>


@endsection
