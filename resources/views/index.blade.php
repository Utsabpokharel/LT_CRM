@extends('Admin.Layout.master')
@section('content')
@section('title', 'Dashboard')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Total Users Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$usr}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Employee Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Employee </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$employee}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Customers Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Customers
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$customer}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Leaves Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Pending Leaves</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pending_leaves}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <!-- Pending Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Pending Tasks</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pending_tasks}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Tasks</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$todo}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Departments Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Departments
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$department}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Enquiries Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Enquiries</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$enquiry}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-walking fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <!-- Assigned Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Assigned Tasks</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">---
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Received Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Received Tasks</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">---</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Customers Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                My Pending Tasks</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">---</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- My Pending Leaves Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                My Pending Leaves</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">---</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <!-- Content Row -->

    <div class="card-body p-0 border-0 shadow-lg">
        <!-- Nested Row within Card Body -->

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 row">
                <div class="col-md-6">
                    <h4 class="font-weight-bold text-success">Tasks Status</h4>
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
                            </tr>
                        </thead>
                        <tfoot class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Task Title</th>
                                <th>Deadline</th>
                                <th>Priority</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        @foreach($task as $task)
                        <tbody class="text-center">
                            <tr>
                                <th>{{$loop->index+1}}</th>
                                <td>{{$task->title}}</td>
                                <td>{{$task->deadline}}</td>
                                <td>{{$task->task_priority}}</td>
                                <td>
                                    <div class="btn-group">
                                        @if($task->status==1)
                                        <button class="btn btn-success btn-xs  no-margin" type="button"
                                            aria-expanded="false">
                                            Completed
                                        </button>
                                        @else
                                        <button class="btn btn-warning btn-xs  no-margin" type="button"
                                            aria-expanded="false">
                                            @if($task->status==0)
                                            Pending
                                            @endif
                                            <!-- <i class="fa fa-angle-down"></i> -->
                                        </button>
                                        @endif
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="card-body p-0 border-0 shadow-lg">
        <!-- Nested Row within Card Body -->

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 row">
                <div class="col-md-6">
                    <h4 class="font-weight-bold text-primary">Leave Status</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Leave Reason</th>
                                <th>Applied By</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Leave Reason</th>
                                <th>Applied By</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        @foreach($leave as $leave)
                        <tbody class="text-center">
                            <tr>
                                <th>{{$loop->index+1}}</th>
                                <td>{{$leave->leave_reason}}</td>
                                <td>{{$leave->applied_by}}</td>
                                <td>
                                    <div class="btn-group">
                                        @if($leave->status=='1')
                                        <i class="btn btn-success"> Approved</i>
                                        @elseif($leave->status=='0')
                                        <i class="btn btn-danger">Not-Approved</i>
                                        @else
                                        <button class="btn btn-warning btn-xs  no-margin" type="button"
                                            aria-expanded="false">
                                            @if($leave->status=='Pending')
                                            Pending
                                            @endif
                                            <!-- <i class="fa fa-angle-down"></i> -->
                                        </button>
                                        @endif
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    {{ $leaves->links() }}
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->
@endsection
