@extends('Admin.Layout.master')
@section('title', 'CashIn Details')
@section('content')
<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('cashIn.index')}}">CashIn</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">CashIn Details</li>
    </ol>
</div>
<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 row">
            <div class="col-md-6">
                <h6 class="font-weight-bold text-primary">All Details</h6>
            </div>

        </div>
        <div class="card-body text-white text-center" style="background: rgba(136, 134, 134, 0.603)">
            <div class="form-group row">
                <label class="control-label col-md-2">Paid By :
                </label>
                <div class="col-md-6">
                    {{$cashIn->cash_from}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Particulars :
                </label>
                <div class="col-md-6">
                    {{$cashIn->title}}
                </div>
            </div>
            <hr>

            <div class="form-group row">
                <label class="control-label col-md-2">Paid Date :
                </label>
                <div class="col-md-6">
                    {{$cashIn->date}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Payment Mode :
                </label>
                <div class="col-md-6">
                    {{$cashIn->mode}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Amount :
                </label>
                <div class="col-md-6">
                    {{$cashIn->amount}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Description :
                </label>
                <div class="col-md-6">
                    {{$cashIn->description}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Received By :
                </label>
                <div class="col-md-6">
                    {{$cashIn->received_by}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Entry By :
                </label>
                <div class="col-md-6 text-primaryxr">
                    @if($cashIn->entry_by == Auth::user()->id)
                    {{Auth::user()->username}}
                    @else
                    User ID --> {{$cashIn->entry_by}}
                    @endif
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Remarks :
                </label>
                <div class="col-md-6">
                    {{$cashIn->remarks}}
                </div>
            </div>
            <hr>
        </div>
    </div>

</div>

@endsection
