@extends('Admin.Layout.master')
@section('title', 'Edit CashOut')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('cashOut.index')}}">CashOut</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Edit CashOut</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <form class="user" method="post" action="{{route('cashOut.update',$cashOut->id)}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-6">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-4">Particular
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="title" required placeholder="Enter Title/Particular"
                                id="exampleInputEmail" class="form-control  @error('title') is-invalid @enderror"
                                value="{{old('title',$cashOut->title)}}" />
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Description
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <textarea name="description" required placeholder="Enter Description" id="exampleInputEmail"
                                class="form-control  @error('description') is-invalid @enderror">{{old('description',$cashOut->description)}}</textarea>
                            @error('description')
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
                                value="{{old('amount',$cashOut->amount)}}" />
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
                                value="{{old('date',$cashOut->date)}}" />
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
                        <label class="control-label col-md-4">Paid To
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="cash_to" required placeholder="Enter Payor Name"
                                id="exampleInputEmail" class="form-control   @error('cash_to') is-invalid @enderror"
                                value="{{old('cash_to',$cashOut->cash_to)}}" />
                            @error('cash_to')
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
                                <option value="Cash" @if($cashOut->mode=='Cash') selected @endif>Cash</option>
                                <option value="Cheque" @if($cashOut->mode=='Cheque') selected @endif>Cheque</option>
                                <option value="Bank Transfer" @if($cashOut->mode=='Bank Transfer') selected @endif>Bank
                                    Transfer
                                </option>
                                <option value="QR Pay" @if($cashOut->mode=='QR Pay"') selected @endif>QR Pay</option>
                                <option value="Wallet Transfer" @if($cashOut->mode=='Wallet Transfer') selected
                                    @endif>Wallet
                                    Transfer</option>
                                <option value="Others" @if($cashOut->mode=='Others') selected @endif>Others</option>
                            </select>
                            @error('mode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-4">Paid By
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <select class="form-control  @error('cashout_by') is-invalid @enderror" name="cashout_by">
                                <option value="{{$cashOut->cashout_by}}" selected>{{$cashOut->cashout_by}}</option>
                                <option value="" disabled>-----Select Payee-----</option>
                                @foreach($employee as $staff)
                                <option value="{{$staff->firstname}} {{$staff->lastname}}">{{$staff->firstname}}
                                    {{$staff->lastname}}</option>
                                @endforeach
                            </select>
                            @error('cashout_by')
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
                            <textarea name="remarks" required placeholder="Enter CashOut Remarks" id="exampleInputEmail"
                                class="form-control  @error('remarks') is-invalid @enderror">{{old('remarks',$cashOut->remarks)}}</textarea>
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
                    <a class="btn btn-secondary" href="{{route('cashOut.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>


@endsection
