@extends('Admin.Layout.master')
@section('title', 'Add CashIn')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('cashIn.index')}}">CashIn</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Add CashIn</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <form class="user" method="post" action="{{route('cashIn.store')}}" enctype="multipart/form-data">
        @csrf
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
                                value="{{old('title','')}}" />
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
                                class="form-control  @error('description') is-invalid @enderror">{{old('description','')}}</textarea>
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
                                value="{{old('amount','')}}" />
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
                                class="form-control   @error('date') is-invalid @enderror" value="{{old('date','')}}" />
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
                            <input type="text" name="cash_from" required placeholder="Enter Payor Name"
                                id="exampleInputEmail" class="form-control   @error('cash_from') is-invalid @enderror"
                                value="{{old('cash_from','')}}" />
                            @error('cash_from')
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
                                <option value="" disabled selected>-----Select Payment Mode-----</option>
                                <option value="Cash">Cash</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="QR Pay">QR Pay</option>
                                <option value="Wallet Transfer">Wallet Transfer</option>
                                <option value="Others">Others</option>
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
                                <option value="" disabled selected>-----Select Payee-----</option>
                                @foreach($employee as $staff)
                                <option value="{{$staff->firstname}} {{$staff->lastname}}">{{$staff->firstname}}
                                    {{$staff->lastname}}</option>
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
                            <textarea name="remarks" required placeholder="Enter CashIn Remarks" id="exampleInputEmail"
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
        <input type="hidden" class="form-control" value="899" required readonly name="entry_by" />
        <div class="form-actions p-3">
            <div class="row">
                <div class="offset-md-3 col-md-9">
                    <button type="submit" class="btn btn-success m-r-20">Submit</button>
                    <a class="btn btn-secondary" href="{{route('cashIn.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection
