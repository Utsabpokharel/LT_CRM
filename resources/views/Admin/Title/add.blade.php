@extends('Admin.Layout.master')
@section('content')

            <div class="page-title-breadcrumb pull-left">                
                <ol class="breadcrumb page-breadcrumb ">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('title.index')}}">Titles</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Add Title</li>
                </ol>                               
            </div>   
             
        <div class="card-body p-0 border-0 shadow-lg">
            <!-- Nested Row within Card Body -->
             
            <form class="user" method="post" action="{{route('title.store')}}" enctype="multipart/form-data"> 
             @csrf
            <div class="row">              
                <div class="col-md-12">
                    <div class="p-4">                  
                            <div class="form-group row">
                                    <label class="control-label col-md-2">Title Name
                                        <span class="required text-danger"> * </span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="titlename" required placeholder="Enter Title Name" id="exampleInputUser"
                                            class="form-control   @error('titlename') is-invalid @enderror"
                                            value="{{old('titlename','')}}" />
                                        @error('titlename')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label class="control-label col-md-2">Description
                                        <span class="required text-danger"> * </span>
                                    </label>
                                    <div class="col-md-6">
                                        <textarea type="password" name="description" required placeholder="Enter Title Description" id="exampleInputText"
                                            class="form-control  @error('description') is-invalid @enderror"
                                            >{{old('description','')}}</textarea>
                                        @error('description')
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
                                            <a class="btn btn-secondary" href="{{route('title.index')}}">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                </form>
            
        </div>
    
@endsection
