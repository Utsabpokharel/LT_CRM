@extends('Admin.Layout.master')
@section('title', 'Pending Leaves')
@section('content')
<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('leave.index')}}">Leaves</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Pending Leaves</li>
    </ol>
</div>
<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 row">
            <div class="col-md-6">
                <h6 class="font-weight-bold text-primary">Pending Leaves</h6>
            </div>
            <div class="col-md-6">
                <a class="btn btn-success float-right" href="{{route('leave.create')}}">Add +</a>
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Leave Reason</th>
                            <th>Applied By</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    @foreach($leave as $leaves)
                    <tbody class="text-center">
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{!!$leaves->leave_reason!!}</td>
                            <td>{{$leaves->applied_by}}</td>
                            <td class="valigntop">
                                <div class="btn-group">
                                    @if($leaves->status=='1')
                                    <i class="btn btn-success"> Approved</i>
                                    @elseif($leaves->status=='0')
                                    <i class="btn btn-danger">Not-Approved</i>
                                    @else
                                    <i class="btn btn-warning">Pending</i>
                                    @endif
                                </div>
                            </td>
                            <td class="text-center">
                                @if ($leaves->from <= $d || $leaves->status=='1' || $leaves->status == '0')
                                    <a href="">
                                        <button class="btn btn-success btn-sm" type="submit"><span
                                                class="fa fa-eye"></span></button></a>
                                    @else
                                    <form action="{{ route('leave.edit', $leaves->id)}}" method="GET"
                                        style="display: inline-block">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <button class="btn btn-primary btn-sm" type="submit"><span
                                                class="fa fa-edit   "></span></button>
                                    </form>
                                    <form action="{{route('leave.destroy',$leaves->id)}}" method="post"
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
