@extends('Admin.Layout.master')
@section('content')
            <div class="page-title-breadcrumb pull-left">                
                <ol class="breadcrumb page-breadcrumb ">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('role.index')}}">Roles</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">All Roles</li>
                </ol>                
            </div>     
        <div class="card-body p-0 border-0 shadow-lg">
            <!-- Nested Row within Card Body -->
             
             <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 row">
                            <div class="col-md-6">
                                <h6 class="font-weight-bold text-primary">All Roles</h6>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-success float-right" href="{{route('role.create')}}">Add +</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Id</th>
                                            <th>Role Name</th>
                                            <th>Description</th>                                            
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                        <tr>
                                           <th>Id</th>
                                            <th>Role Name</th>
                                            <th>Description</th>                                            
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    @foreach($roles as $role)
                                    <tbody class="text-center">
                                        <tr>
                                            <th>{{$loop->index+1}}</th>
                                            <td>{{$role->name}}</td>
                                            <td>{{$role->description}}</td>                                            
                                            <td>
                                            @if($role->name == 'SuperAdmin')
                                                    <button class="btn btn-success btn-sm" type="submit"><span
                                                            class="fa fa-eye"></span></button>                                                 
                                                @else  
                                                <form action="{{route('role.edit',$role->id)}}" method="GET" style="display: inline-block">
                                                    {{csrf_field()}}
                                                    {{method_field('PUT')}}
                                                    <button class="btn btn-primary btn-sm" type="submit"><span
                                                            class="fa fa-edit"></span></button>
                                                </form>                                      
                                                <form action="{{route('role.destroy',$role->id)}}" method="post" style="display: inline-block">
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
