@extends('Admin.Layout.master')
@section('title', 'All User')
@section('content')
<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('user.index')}}">Users</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">All User</li>
    </ol>
</div>
<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 row">
            <div class="col-md-6">
                <h6 class="font-weight-bold text-primary">All Users</h6>
            </div>
            <div class="col-md-6">
                <a class="btn btn-success float-right" href="{{route('user.create')}}">Add +</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    @foreach($user as $users)
                    <tbody class="text-center">
                        <tr>
                            <th>{{$loop->index+1}}</th>
                            <td>{{$users->email}}</td>
                            <td><a href="{{route('user.show',$users->id) }}">{{$users->username}}</a></td>
                            <td>{{$users->roles['name']}}</td>
                            @if($users->status==1)
                            <td>
                                <span class="btn btn-success">Active</span>
                            </td>
                            @else
                            <td>
                                <span class="btn btn-danger">Inactive</span>
                            </td>
                            @endif

                            <td>
                                @if($users->email == 'super@admin.com')
                                <button class="btn btn-success btn-sm" type="submit"><span
                                        class="fa fa-eye"></span></button>
                                @else
                                <form action="{{route('user.edit',$users->id)}}" method="GET"
                                    style="display: inline-block">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <button class="btn btn-primary btn-sm" type="submit"><span
                                            class="fa fa-edit"></span></button>
                                </form>
                                <form action="{{ route('user.destroy', $users->id)}}" method="post"
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
