@extends('Admin.Layout.master')
@section('title', 'Income Details')
@section('content')
<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('income.index')}}">Income</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Income Details</li>
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
                    {{$income->paid_by}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Particulars :
                </label>
                <div class="col-md-6">
                    {{$income->particular}}
                </div>
            </div>
            <hr>

            <div class="form-group row">
                <label class="control-label col-md-2">Paid Date :
                </label>
                <div class="col-md-6">
                    {{$income->date}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Payment Mode :
                </label>
                <div class="col-md-6">
                    {{$income->mode}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Amount :
                </label>
                <div class="col-md-6">
                    {{$income->amount}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Income Category :
                </label>
                <div class="col-md-6">
                    {{$income->category->categoryname}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Received By :
                </label>
                <div class="col-md-6">
                    {{$income->received_by}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Entry By :
                </label>
                <div class="col-md-6 text-primaryxr">
                    @if($income->entry_by == Auth::user()->id)
                    {{Auth::user()->username}}
                    @else
                    User ID --> {{$income->entry_by}}
                    @endif
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Remarks :
                </label>
                <div class="col-md-6">
                    {{$income->remarks}}
                </div>
            </div>
            <hr>
        </div>
    </div>

</div>

@endsection
