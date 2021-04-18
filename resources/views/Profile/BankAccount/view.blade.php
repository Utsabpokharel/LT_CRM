@extends('Admin.Layout.master')
@section('title', 'All Bank Account')
@section('content')
<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('bankaccount.index')}}"> Bank Accounts</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li class="active">All Bank Account</li>
    </ol>
</div>
<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 row">
            <div class="col-md-6">
                <h6 class="font-weight-bold text-primary">All Bank Account</h6>
            </div>
            <div class="col-md-6">
                <a class="btn btn-success float-right" href="{{route('bankaccount.create')}}">Add +</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Account Number</th>
                            <th>Bank Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Account Number</th>
                            <th>Bank Name</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    @foreach($banks as $bank)
                    <tbody class="text-center">
                        <tr>
                            <th>{{$loop->index+1}}</th>
                            <td>{{$bank->user_id}}</td>
                            <td>{{$bank->account_number}}</td>
                            <td>{{$bank->bank_name}}</td>
                            <td>
                                <form action="{{route('bankaccount.edit',$bank->id)}}" method="GET"
                                    style="display: inline-block">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <button class="btn btn-primary btn-sm" type="submit"><span
                                            class="fa fa-edit"></span></button>
                                </form>
                                <form action="{{ route('bankaccount.destroy', $bank->id)}}" method="post"
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