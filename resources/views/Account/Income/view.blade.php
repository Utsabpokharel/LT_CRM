@extends('Admin.Layout.master')
@section('title', 'All Income')
@section('content')
<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('income.index')}}">Income</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">All Income</li>
    </ol>
</div>
<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 row">
            <div class="col-md-6">
                <h6 class="font-weight-bold text-primary">All Income</h6>
            </div>
            <div class="col-md-6">
                <a class="btn btn-success float-right" href="{{route('income.create')}}">Add +</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Income Category</th>
                            <th>Date</th>
                            <th>Particular</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Income Category</th>
                            <th>Date</th>
                            <th>Particular</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    @foreach($income as $incomes)
                    <tbody class="text-center">
                        <tr>
                            <th>{{$loop->index+1}}</th>
                            <td>{{$incomes->category->categoryname}}</td>
                            <td>{{$incomes->date}}</td>
                            <td><a href="{{ route('income.show',$incomes->id) }}">{{$incomes->particular}}</a></td>
                            <td>{{$incomes->amount}}</td>
                            <td>
                                <form action="{{route('income.edit',$incomes->id)}}" method="GET"
                                    style="display: inline-block">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <button class="btn btn-primary btn-sm" type="submit"><span
                                            class="fa fa-edit"></span></button>
                                </form>
                                <form action="{{route('income.destroy', $incomes->id)}}" method="post"
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
