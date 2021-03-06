@extends('Admin.Layout.master')
@section('title', 'Add Employee')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('employee.index')}}">Employees</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li class="active">Add Employee</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <form class="user" method="post" action="{{route('employee.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-4">Employee ID
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="staff_id" required placeholder="Enter Staff ID"
                                id="exampleInputEmail" class="form-control  @error('staff_id') is-invalid @enderror"
                                value="{{old('staff_id','')}}" />
                            @error('staff_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">First Name
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="firstname" required placeholder="Enter First Name"
                                id="exampleInputEmail" class="form-control  @error('firstname') is-invalid @enderror"
                                value="{{old('firstname','')}}" />
                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Last Name
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="lastname" required placeholder="Enter Last Name"
                                id="exampleInputEmail" class="form-control   @error('lastname') is-invalid @enderror"
                                value="{{old('lastname','')}}" />
                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Email
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="email" name="email" required placeholder="Enter Email Address"
                                id="exampleInputEmail" class="form-control   @error('email') is-invalid @enderror"
                                value="{{old('email','')}}" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Contact No.
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="contact_number" required placeholder="Enter Contact Number"
                                id="exampleInputEmail"
                                class="form-control   @error('contact_number') is-invalid @enderror"
                                value="{{old('contact_number','')}}" />
                            @error('contact_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Image
                            <span class="required text-danger"> </span>
                        </label>
                        <div class="col-md-8">
                            <input type="file" name="photo" placeholder="Enter photo" accept="image/*" id="image-file"
                                class="form-control   @error('photo') is-invalid @enderror" onclick="readURL(this);"
                                value="{{old('photo','')}}" />
                            <img src="{{asset('img/undraw_profile.svg')}}" alt="image" id="image-preview" width="150px">
                            @error('photo')
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
                        <label class="control-label col-md-4">Department
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <select class="form-control  @error('department') is-invalid @enderror" name="department">
                                <option value="" disabled selected>-----Select Department-----</option>
                                @foreach($department as $depart)
                                <option value="{{$depart->name }}">{{$depart->name}}</option>
                                @endforeach

                            </select>
                            @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Title
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <select name="title[]" class="form-control title_id @error('title') is-invalid @enderror"
                                data-validation="required" value="{{old('title','')}}">
                                <option selected>----------Select Title----------</option>
                                @foreach($title as $title)
                                <option value="{{$title->id}}" class="form-control">{{$title->titlename}}
                                </option>
                                @endforeach
                            </select>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">Level
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <select class="form-control  @error('level') is-invalid @enderror" name="level">
                                <option value="" disabled selected>-----Select Level-----</option>
                                @foreach($level as $level)
                                <option value="{{$level->levelname }}">{{$level->levelname}}</option>
                                @endforeach

                            </select>
                            @error('level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4">PAN No.
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="pan" required placeholder="Enter PAN Number" id="exampleInputEmail"
                                class="form-control   @error('pan') is-invalid @enderror" value="{{old('pan','')}}" />
                            @error('pan')
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
                    <a class="btn btn-secondary" href="{{route('employee.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection
@section('imageJS')
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image-file").change(function(){
        readURL(this);
    });
</script>
@endsection
