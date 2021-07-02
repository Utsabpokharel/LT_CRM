@extends('Admin.Layout.master')
@section('title', 'Enquiry Details')
@section('content')
<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('enquiry.index')}}">Enquiry</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Enquiry Details</li>
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
                <label class="control-label col-md-2">Is Customer:
                </label>
                <div class="col-md-6">
                    {{$enquiry->is_customer}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Enquired By :
                </label>
                <div class="col-md-6">
                    @if($enquiry->is_customer=='Yes')
                    {{$enquiry->customer->firstname}}
                    {{$enquiry->customer->lastname}}
                    @else
                    {{$enquiry->name}}
                    @endif
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Email :
                </label>
                <div class="col-md-6">
                    @if($enquiry->is_customer=='Yes')
                    {{$enquiry->customer->email}}
                    @else
                    {{$enquiry->email}}
                    @endif
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Contact Number:
                </label>
                <div class="col-md-6">
                    @if($enquiry->is_customer=='Yes')
                    {{$enquiry->customer->contact_number}}
                    @else
                    {{$enquiry->phone}}
                    @endif
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Enquiry Category :
                </label>
                <div class="col-md-6">
                    {{$enquiry->category->categoryname}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Enquiry Source :
                </label>
                <div class="col-md-6">
                    {{$enquiry->source->source}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Enquiry Date :
                </label>
                <div class="col-md-6">
                    {{$enquiry->date}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Enquiry Time :
                </label>
                <div class="col-md-6">
                    {{$enquiry->time}}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="control-label col-md-2">Remarks :
                </label>
                <div class="col-md-6">
                    {{$enquiry->remarks}}
                </div>
            </div>
            <hr>
        </div>
    </div>

</div>

@endsection
