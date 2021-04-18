@extends('Admin.Layout.master')
@section('title', 'Edit Bank Account')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('bankaccount.index')}}">Bank Accounts</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li class="active">Edit Bank Account</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <form class="user" method="post" action="{{route('bankaccount.update',$banks->id)}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-12">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-2">user_id
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <select class="form-control  @error('user_id') is-invalid @enderror" name="user_id"
                                value="{{old('user_id','')}}">
                                <option value="{{old('user_id',$banks->user_id)}}" selected>{{$banks->user_id}}
                                </option>
                                <option class="bg-info" disabled>-----Select a Person-----
                                </option>
                                @foreach($employee as $employees)
                                <option value="{{$employees->id}}">
                                    {{$employees->firstname}} {{$employees->lastname}}</option>
                                @endforeach
                                @foreach($customer as $customers)
                                <option value="{{$customers->id}}">{{$customers->firstname}}
                                    {{$customers->lastname}}
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
                                value="{{old('account_number',$banks->account_number)}}" />
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
                                value="{{old('account_holder',$banks->account_holder)}}" />
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
                                value="{{old('bank_name',$banks->bank_name)}}" />
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
                                value="{{old('branch',$banks->branch)}}" />
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
                                class="form-control  @error('remarks') is-invalid @enderror">{{old('remarks',$banks->remarks)}}</textarea>
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
                    <button type="submit" class="btn btn-success m-r-20">Update</button>
                    <a class="btn btn-secondary" href="{{route('bankaccount.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection
