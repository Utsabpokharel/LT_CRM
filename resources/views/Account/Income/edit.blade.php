@extends('Admin.Layout.master')
@section('title', 'Edit Income')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('income.index')}}">Incomes</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Edit Income</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <form class="user" method="post" action="{{route('income.update',$income->id)}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-6">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-4">Income Category
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <select class="form-control  @error('incomecategory') is-invalid @enderror"
                                name="incomecategory">
                                <option value="{{$income->incomecategory}}" selected>{{$income->category->categoryname}}
                                </option>
                                <option class="bg-info" disabled>-----Select Income Category-----</option>
                                @foreach($incomecategory as $category)
                                <option value="{{$category->id }}">{{$category->categoryname}}</option>
                                @endforeach
                            </select>
                            @error('incomecategory')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Income Particulars
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="particular" required placeholder="Enter Income Pariculars"
                                id="exampleInputEmail" class="form-control  @error('particular') is-invalid @enderror"
                                value="{{old('particular',$income->particular)}}" />
                            @error('particular')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Amount
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="number" name="amount" required placeholder="Enter Amount"
                                pattern="[0-9]+([\.,][0-9]+)?" step="0.0001" id="exampleInputEmail"
                                class="form-control  @error('amount') is-invalid @enderror"
                                value="{{old('amount',$income->amount)}}" />
                            @error('amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Date
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="date" name="date" required placeholder="Enter date" id="exampleInputEmail"
                                class="form-control   @error('date') is-invalid @enderror"
                                value="{{old('date',$income->date)}}" />
                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-4">Paid By
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="paid_by" required placeholder="Enter Payor Name"
                                id="exampleInputEmail" class="form-control   @error('paid_by') is-invalid @enderror"
                                value="{{old('paid_by',$income->paid_by)}}" />
                            @error('paid_by')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Payment Mode
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <select class="form-control  @error('mode') is-invalid @enderror" name="mode">
                                <option value="" disabled>-----Select Payment Mode-----</option>
                                <option value="Cash" @if($income->mode=='Cash') selected @endif>Cash</option>
                                <option value="Cheque" @if($income->mode=='Cheque') selected @endif>Cheque</option>
                                <option value="Bank Transfer" @if($income->mode=='Bank Transfer') selected @endif>Bank
                                    Transfer
                                </option>
                                <option value="QR Pay" @if($income->mode=='QR Pay"') selected @endif>QR Pay</option>
                                <option value="Wallet Transfer" @if($income->mode=='Wallet Transfer') selected
                                    @endif>Wallet
                                    Transfer</option>
                                <option value="Others" @if($income->mode=='Others') selected @endif>Others</option>
                            </select>
                            @error('mode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-4">Received By
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <select class="form-control  @error('received_by') is-invalid @enderror" name="received_by">
                                <option value="{{$income->received_by}}" selected>{{$income->received_by}}</option>
                                <option class="bg-info" disabled>-----Select Payee-----</option>
                                @foreach($employee as $staff)
                                <option value="{{$staff->id }}">{{$staff->firstname}} {{$staff->firstname}}</option>
                                @endforeach
                            </select>
                            @error('received_by')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Remarks
                            <span class="required text-danger"> </span>
                        </label>
                        <div class="col-md-8">
                            <textarea name="remarks" required placeholder="Enter Income Remarks" id="exampleInputEmail"
                                class="form-control @error('remarks') is-invalid @enderror">{{old('remarks',$income->remarks)}}</textarea>
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
        <input type="hidden" class="form-control" value="{{Auth::user()->id}}" required readonly name="entry_by" />
        <div class="form-actions p-3">
            <div class="row">
                <div class="offset-md-3 col-md-9">
                    <button type="submit" class="btn btn-success m-r-20">Update</button>
                    <a class="btn btn-secondary" href="{{route('income.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>



@endsection
