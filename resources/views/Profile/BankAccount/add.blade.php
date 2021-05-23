@extends('Admin.Layout.master')
@section('title', 'Add Bank Account')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('bankaccount.index')}}">Bank Accounts</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li class="active">Add Bank Account</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <form class="user" method="post" action="{{route('bankaccount.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-2">User Email
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <select class="form-control  @error('user_id') is-invalid @enderror" name="user_id"
                                value="{{old('user_id','')}}">
                                <option class="{{old('user_id','')}}" disabled selected>-----Select User Email-----
                                </option>
                                @foreach($employee as $employees)
                                <option value="{{$employees->email}}">
                                    {{$employees->email}}</option>
                                @endforeach
                                @foreach($customer as $customers)
                                <option value="{{$customers->email}}">{{$customers->email}}
                                </option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Account Number
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="account_number" required placeholder="Enter Bank Account Number"
                                id="exampleInputEmail"
                                class="form-control   @error('account_number') is-invalid @enderror"
                                value="{{old('account_number','')}}" />
                            @error('account_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Account Holder
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="account_holder" required placeholder="Enter Account Holder Name"
                                id="exampleInputEmail"
                                class="form-control  @error('account_holder') is-invalid @enderror"
                                value="{{old('account_holder','')}}" />
                            @error('account_holder')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Bank Name
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="bank_name" required placeholder="Enter Bank Name"
                                id="exampleInputEmail" class="form-control  @error('bank_name') is-invalid @enderror"
                                value="{{old('bank_name','')}}" />
                            @error('bank_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Bank Branch
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="branch" required placeholder="Enter Bank Branch"
                                id="exampleInputEmail" class="form-control  @error('branch') is-invalid @enderror"
                                value="{{old('branch','')}}" />
                            @error('branch')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Remarks
                            <span class="required text-danger"> </span>
                        </label>
                        <div class="col-md-6">
                            <textarea name="remarks" required placeholder="Enter Bank Remarks" id="exampleInputEmail"
                                class="form-control  @error('remarks') is-invalid @enderror">{{old('remarks','')}}</textarea>
                            @error('remarks')
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
                    <a class="btn btn-secondary" href="{{route('bankaccount.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection
