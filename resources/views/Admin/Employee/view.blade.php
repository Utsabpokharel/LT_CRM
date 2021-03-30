@extends('Admin.Layout.master')
@section('content')
            <div class="page-title-breadcrumb pull-left">                
                <ol class="breadcrumb page-breadcrumb ">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('employee.index')}}">Employee</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">All Employee</li>
                </ol>                
            </div>     
        <div class="card-body p-0 border-0 shadow-lg">
            <!-- Nested Row within Card Body -->
             
             <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 row">
                            <div class="col-md-6">
                                <h6 class="font-weight-bold text-primary">All Employee</h6>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-success float-right" href="{{route('employee.create')}}">Add +</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Id</th>
                                            <th>Employee Name</th>
                                            <th>Image</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>Contact Number</th>                
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                        <tr>
                                           <th>Id</th>
                                            <th>Employee Name</th>
                                            <th>Image</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>Contact Number</th>                
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    @foreach($employee as $employees)
                                    <tbody class="text-center">
                                        <tr>
                                            <th>{{$loop->index+1}}</th>
                                            <td>{{$employees->firstname}} {{$employees->lastname}}</td>
                                            @if($employees->photo !=null)
                                               <td><img height="auto" width="200px" src="{{asset('Uploads/Employee/Image/'.$employees->photo)}}"></td>
                                            @else
                                            <td><i>Image Not-Uploaded</i></td>
                                            @endif
                                            <td>{{$employees->email}}</td>
                                            <td>{{$employees->department}}</td>  
                                            <td>{{$employees->contact_number}}</td>                                                                                      
                                            <td>
                                            @if($employees->email == 'super@admin.com')
                                               <button class="btn btn-success btn-sm" type="submit"><span
                                                            class="fa fa-eye"></span></button>     
                                            @else
                                        <form action="{{route('employee.edit',$employees->id)}}" method="GET" style="display: inline-block">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                            <button class="btn btn-primary btn-sm" type="submit"><span
                                                    class="fa fa-edit"></span></button>
                                        </form>                                        
                                        <form action="{{ route('employee.destroy', $employees->id)}}" method="post" style="display: inline-block">
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
