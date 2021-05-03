@extends('Admin.Layout.master')
@section('title', 'Enquiry Response')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('enquiry.index')}}">Enquiry</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Enquiry Response</li>
    </ol>
</div>
<div class="card-body p-0 border-0 shadow-lg">

    <form action="{{route('enquiryresponse.update',$response->id)}}" class="user" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <div class="p-4"> 
                <div class="form-group row">
                            <label class="control-label col-md-3">Responded Through:<span class="required text-danger">
                                    *
                                </span>
                            </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control form-control-solid @error('responded_through') is-invalid @enderror"
                                    placeholder="Enter Enquiry Response Medium" name="responded_through" value="{{old('responded_through')}}" />
                                @error('responded_through')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   
                        <div class="form-group row">
                        <label class="control-label col-md-3">Responded On: 
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8" data-datetime-format="yyyy-mm-ddThh:mm">
                            <input type="datetime-local" datetime-format="yyyy-mm-ddThh:mm:ss" name="responded_on" required placeholder="Enter Responded Date"
                                id="exampleInputEmail" class="form-control @error('responded_on') is-invalid @enderror"
                                value="{{old('responded_on','')}}" />
                            @error('responded_on')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Message: <span class="required text-danger">
                                    *
                                </span>
                            </label>
                            <div class="col-md-8">
                                <textarea class="form-control form-control-solid @error('message') is-invalid @enderror" name="message" cols="30"
                                    rows="10">{{old('message')}}</textarea>
                                    @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                                        
                    
                   
                    <div class="form-group row">
                        <label class="control-label col-md-3">Remarks:
                        </label>
                        <div class="col-md-8">
                            <textarea class="form-control form-control-solid @error('remarks') is-invalid @enderror" name="remarks" cols="30"
                                rows="10">{{old('remarks')}}</textarea>
                                @error('remarks')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
                 <!-- User Id -->

        <input type="hidden" class="form-control" value="{{Auth::user()->username}}" required readonly name="responded_by"/>
    
        <!-- Enquired by-->
      
            <input type="hidden" class="form-control" value="{{$enquiry->id}}" required readonly name="enquiry_id" />
       

            </div>
        </div>
        <div class="form-actions p-3">
            <div class="row">
                <div class="offset-md-3 col-md-9">
                    <button type="submit" class="btn btn-success m-r-20">Update</button>
                    <a class="btn btn-secondary" href="{{route('enquiry.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>
   
</div>

@endsection
