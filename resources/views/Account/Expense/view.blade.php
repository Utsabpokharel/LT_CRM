@extends('Admin.Layout.master')
@section('title', 'All Expense')
@section('content')
<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('expense.index')}}">Expense</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">All Expense</li>
    </ol>
</div>
<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 row">
            <div class="col-md-6">
                <h6 class="font-weight-bold text-primary">All Expense</h6>
            </div>
            <div class="col-md-6">
                <a class="btn btn-success float-right" href="{{route('expense.create')}}">Add +</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Expense Category</th>
                            <th>Date</th>
                            <th>Particular</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Expense Category</th>
                            <th>Date</th>
                            <th>Particular</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    @foreach($expense as $expenses)
                    <tbody class="text-center">
                        <tr>
                            <th>{{$loop->index+1}}</th>
                            <td>{{$expenses->category->categoryname}}</td>
                            <td>{{$expenses->date}}</td>
                            <td><a href="{{ route('expense.show',$expenses->id) }}">{{$expenses->particular}}</a></td>
                            <td>{{$expenses->amount}}</td>
                            <td>
                                <form action="{{route('expense.edit',$expenses->id)}}" method="GET"
                                    style="display: inline-block">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <button class="btn btn-primary btn-sm" type="submit"><span
                                            class="fa fa-edit"></span></button>
                                </form>
                                <form action="{{route('expense.destroy', $expenses->id)}}" method="post"
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
