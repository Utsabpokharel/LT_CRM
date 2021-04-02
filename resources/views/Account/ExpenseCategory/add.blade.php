@extends('Admin.Layout.master')
@section('title', 'Add Expense Category')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('expensecategory.index')}}">Expense Category</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li class="active">Add Expense Category</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <form class="user" method="post" action="{{route('expensecategory.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Category Name
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="categoryname" required placeholder="Enter Expense Category Name"
                                id="exampleInputUser" class="form-control   @error('categoryname') is-invalid @enderror"
                                value="{{old('categoryname','')}}" />
                            @error('categoryname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Category Code
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="category_id" required placeholder="Enter Expense Category Code"
                                id="exampleInputUser" class="form-control   @error('category_id') is-invalid @enderror"
                                value="{{old('category_id','')}}" />
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Description
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <textarea type="password" name="description" required
                                placeholder="Enter Expense Category Description" id="exampleInputText"
                                class="form-control  @error('description') is-invalid @enderror">{{old('description','')}}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions p-3">
            <div class="row">
                <div class="offset-md-3 col-md-9">
                    <button type="submit" class="btn btn-success m-r-20">Submit</button>
                    <a class="btn btn-secondary" href="{{route('expensecategory.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection
