@extends('Admin.Layout.master')
@section('title', 'Add Enquiry')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('enquiry.index')}}">Enquiry</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Add New Enquiry</li>
    </ol>
</div>
<div class="card-body p-0 border-0 shadow-lg">
    <form action="{{route('enquiry.store')}}" class="user" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Is Enquiry By Customer ?
                        </label>
                        <div class="col-md-8">
                            <input type="checkbox" name="is_customer" id="is_customer" value="yes" />
                        </div>
                    </div>
                    <div class="form-group row d-none" id="customer">
                        <label class="control-label col-md-3">Enquired By :<span class="required text-danger"> *
                            </span>
                        </label>
                        <div class="col-md-8">
                            <select name="customer_id" class="form-control form-control-solid customer">
                                <option disabled selected>--Select any one--</option>
                                @foreach($customer as $customer)
                                <option value="{{$customer->id}}">{{$customer->firstname}} {{$customer->lastname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="notcustomer">
                        <div class="form-group row">
                            <label class="control-label col-md-3">Enquired By:<span class="required text-danger"> *
                                </span>
                            </label>
                            <div class="col-md-8">
                                <input type="name" class="form-control form-control-solid notcustomer"
                                    placeholder="Enter full name" name="name" value="{{old('name')}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Email:<span class="required text-danger">
                                    * </span>
                            </label>
                            <div class="col-md-8">
                                <input type="email" class="form-control form-control-solid notcustomer"
                                    placeholder="Enter email" name="email" value="{{old('email')}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Contact Number:<span class="required text-danger">
                                    *
                                </span>
                            </label>
                            <div class="col-md-8">
                                <input type="number" class="form-control form-control-solid notcustomer"
                                    placeholder="Enter contact number" name="phone" value="{{old('phone')}}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Enquiry Category:<span class="required text-danger"> *
                            </span>
                        </label>
                        <div class="col-md-8">
                            <select name="category_id" id="" class="form-control form-control-solid" required>
                                <option selected disabled>--Select any one--</option>
                                @foreach($category as $category)
                                <option @if(old('category_id')==$category->id) selected @endif
                                    value="{{$category->id}}">{{$category->categoryname}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger">The enquiry category field is required</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Enquiry Source:<span class="required text-danger">
                                *
                            </span>
                        </label>
                        <div class="col-md-8">
                            <select name="source_id" id="" class="form-control form-control-solid" required>
                                <option selected disabled>--Select any one--</option>
                                @foreach($source as $source)
                                <option @if(old('source_id')==$source->id) selected @endif
                                    value="{{$source->id}}">{{$source->source}}
                                </option>
                                @endforeach
                            </select>
                            @error('source_id')
                            <div class="text-danger">The enquiry source field is required</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Date:<span class="required text-danger"> *
                            </span>
                        </label>
                        <div class="col-md-8">
                            <input type="date" class="form-control form-control-solid" placeholder="Enter date"
                                name="date" value="{{old('date')}}" />
                            @error('date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Time:<span class="required text-danger"> *
                            </span>
                        </label>
                        <div class="col-md-8">
                            <input type="time" class="form-control form-control-solid" placeholder="Enter time"
                                name="time" value="{{old('time')}}" />
                            @error('time')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Remarks:
                        </label>
                        <div class="col-md-8">
                            <textarea class="form-control form-control-solid" name="remarks" cols="30"
                                rows="10">{{old('remarks')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions p-3">
            <div class="row">
                <div class="offset-md-3 col-md-9">
                    <button type="submit" class="btn btn-success m-r-20">Submit</button>
                    <a class="btn btn-secondary" href="{{route('enquiry.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
