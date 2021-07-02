@extends('Admin.Layout.master')
@section('title', 'All Customer')
@section('content')
<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('customer.index')}}">Customers</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li class="active">All Customer</li>
    </ol>
</div>
<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 row">
            <div class="col-md-6">
                <h6 class="font-weight-bold text-primary">All Customers</h6>
            </div>
            <div class="col-md-6">
                <a class="btn btn-success float-right" href="{{route('customer.create')}}">Add +</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Customer Name</th>
                            <th>Image</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Customer Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Customer Name</th>
                            <th>Image</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Customer Type</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    @foreach($customer as $customers)
                    <tbody class="text-center">
                        <tr>
                            <th>{{$loop->index+1}}</th>
                            <td><a href="{{ route('customer.show',$customers->id) }}">{{$customers->firstname}}
                                    {{$customers->lastname}}</a></td>
                            @if($customers->photo !=null)
                            <td><img height="auto" width="200px"
                                    src="{{asset('Uploads/Customer/Image/'.$customers->photo)}}"></td>
                            @else
                            <td><i>Image Not-Uploaded</i></td>
                            @endif
                            <td>{{$customers->email}}</td>
                            <td>{{$customers->contact_number}}</td>
                            <td>{{$customers->customer_type}}</td>
                            <td>
                                <form action="{{route('customer.edit',$customers->id)}}" method="GET"
                                    style="display: inline-block">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <button class="btn btn-primary btn-sm" type="submit"><span
                                            class="fa fa-edit"></span></button>
                                </form>
                                <form action="{{ route('customer.destroy', $customers->id)}}" method="post"
                                    style="display: inline-block">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger btn-sm" type="submit"><span
                                            class="fa fa-trash"></span></button>
                                </form>
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
