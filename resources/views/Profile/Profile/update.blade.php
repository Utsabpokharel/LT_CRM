@extends('Admin.Layout.master')
@section('title', 'Update Profile')
@section('content')
<style>
    .leftTab {
        margin-top: 10px;
        border: solid 1px #000;
    }

    .mainBody {
        width: 90%;
        margin: auto;

    }

    .profileImg {
        /* margin-top: 25px; */
        width: 100px;
        margin: auto;
        margin-bottom: 20px;
    }

    .profileImg img {
        margin-top: 10px;
        height: 100px;
        width: 100px;
        border: solid 1px #000;
        border-radius: 50%;
    }

    .userName {
        width: 200px;
        margin: auto;
    }

    .userName h2,
    h3 {
        text-align: center;
    }

    .status {
        width: 60px;
        background: #00a504;
        color: white;
        text-align: center;
        margin: auto;
        border-radius: 20%;
    }

    .menu {
        margin-top: 20px;
    }

    .menuItems {
        text-align: center;
        font-size: 25px;
        width: 100%;
        margin-bottom: 10px;
    }

    .menuItems:hover {
        background: chartreuse;
    }

    .BDItems {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .nav-iitem a {
        text-align: center;
        color: #000;
        font-size: 25px;

    }

    .navbar-nav .nav-link {
        font-size: 16px;
    }

    .nav-iitem:hover {
        background: rgb(39, 165, 81);
    }

    .tab-content {
        margin-top: 10px;
        border: solid 1px #000;
    }

    .pItems {
        margin-bottom: 20px;
        font-size: 20px;
        margin-left: 20px;
    }

    .bankDetails h2 {
        font-weight: 600;
    }

    .heading1 {
        width: fit-content;
        text-align: center;
        margin-top: 10px;
        margin-bottom: 20px;
    }

    .heading1 h2 {
        margin-left: 10px;
        font-weight: 600;
    }

    .BDItems {
        font-size: 16px;
    }

    .pItems {
        font-size: 16px
    }
</style>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <h2 class="page-title text-center"> My Profile</h2>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('profile')}}">Profile</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Update Profile</li>
                </ol>
            </div>
        </div>
        <div class="card card-box">

            <div class="row mainBody">
                <div class="col-md-4 leftTab">
                    <div class="profileImg">
                        <img src="{{asset('img/undraw_profile.svg')}}" alt="" />
                    </div>
                    <div class="userName">
                        <h2>{{Auth::user()->username}}</h2>
                        <h6 class="mx-5">{{Auth::user()->roles->name}}</h6>
                    </div>
                    <div class="status my-3">Active</div>

                    <ul class="nav nav-tabs nav navbar-nav">
                        <li class="nav-iitem">
                            <a href="#personalInfo" class="nav-link active" role="tab" data-toggle="tab">Personal
                                Info</a>
                        </li>
                        <li class="nav-iitem">
                            <a href="#workInfo" class="nav-link" role="tab" data-toggle="tab">Work Info</a>
                        </li>
                        <li class="nav-iitem">
                            <a href="#educationInfo" class="nav-link" role="tab" data-toggle="tab">Education Info</a>
                        </li>
                    </ul>
                    <h2 class="text-center mt-4">
                        <a href="{{route('profile')}}" class="btn btn-info">View Profile</a>
                    </h2>
                </div>
                <div class="col-md-8 tab-content">
                    <!--Personal Detail-->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div role="tabpanel" class="tab-pane active" id="personalInfo">
                        <h1>Personal Information</h1>
                        @if( $prsnl == [])
                        <form action="{{route('personal.store')}}" id="form_sample_2" class="form-horizontal"
                            method="post" autocomplete="on" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <label for="about">About Me :</label>
                            <textarea name="about" required placeholder="Write Something about yourself"
                                class="form-control input-height @error('about') is-invalid @enderror">{{old('about','')}}</textarea>
                            @error('about')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="permanent_address">Permanent Address :</label>
                            <input type="text" name="permanent_address" required
                                placeholder="Enter Your Permanent Address"
                                class="form-control input-height @error('permanent_address') is-invalid @enderror"
                                value="{{old('permanent_address','')}}" />
                            @error('permanent_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="temporary_address">Temporary Address :</label>
                            <input type="text" name="temporary_address" required
                                placeholder="Enter Your Temporary Address"
                                class="form-control input-height @error('temporary_address') is-invalid @enderror"
                                value="{{old('temporary_address','')}}" />
                            @error('temporary_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="date_of_birth">Gender :</label>
                            <select class="form-control  @error('gender') is-invalid @enderror" name="gender">
                                <option value="" disabled selected>-----Select Gender-----</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="date_of_birth">Date of Birth :</label>
                            <input type="date" name="date_of_birth"
                                class="form-control input-height @error('gender') is-invalid @enderror"
                                value="{{old('date_of_birth','')}}" />
                            @error('date_of_birth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="ctzn_front">Citizenship Front :</label>
                            <input type="file" name="ctzn_front" required
                                class="form-control input-height @error('ctzn_front') is-invalid @enderror"
                                value="{{old('ctzn_front','')}}" />
                            @error('ctzn_front')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="ctzn_back">Citizenship Front :</label>
                            <input type="file" name="ctzn_back" required
                                class="form-control input-height @error('ctzn_back') is-invalid @enderror"
                                value="{{old('ctzn_back','')}}" />
                            @error('ctzn_back')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <input type="hidden" class="form-control" value="{{Auth::user()->id}}" required readonly
                                name="user_id" />
                            <div class="form-group">
                                <div class="offset-md-3 col-md-9">
                                    <button type="submit" class="btn btn-info m-r-20 my-3">Add</button>
                                    <a class="btn btn-secondary" href="{{route('profile')}}">Cancel</a>
                                </div>
                            </div>
                        </form>

                        @else
                        <form action="{{route('personal.update',$prsnl->id)}}" id="form_sample_2"
                            class="form-horizontal" method="post" autocomplete="on" enctype="multipart/form-data">
                            @method('PUT')
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <label for="about">About Me :</label>
                            <textarea name="about" required placeholder="Write Something about yourself"
                                class="form-control input-height @error('about') is-invalid @enderror">{{old('about',$prsnl->about)}}</textarea>
                            @error('about')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="permanent_address">Permanent Address :</label>
                            <input type="text" name="permanent_address" required
                                placeholder="Enter Your Permanent Address"
                                class="form-control input-height @error('permanent_address') is-invalid @enderror"
                                value="{{old('permanent_address',$prsnl->permanent_address)}}" />
                            @error('permanent_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="temporary_address">Temporary Address :</label>
                            <input type="text" name="temporary_address" required
                                placeholder="Enter Your Temporary Address"
                                class="form-control input-height @error('temporary_address') is-invalid @enderror"
                                value="{{old('temporary_address',$prsnl->temporary_address)}}" />
                            @error('temporary_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="date_of_birth">Gender :</label>
                            <select class="form-control  @error('gender') is-invalid @enderror" name="gender">
                                <option value="" disabled>-----Select Gender-----</option>
                                <option value="Male" @if($prsnl->gender=='Male')selected @endif>Male</option>
                                <option value="Female" @if($prsnl->gender=='Female')selected @endif>Female</option>
                                <option value="Others" @if($prsnl->gender=='Others')selected @endif>Others</option>
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="date_of_birth">Date of Birth :</label>
                            <input type="date" name="date_of_birth"
                                class="form-control input-height @error('gender') is-invalid @enderror"
                                value="{{old('date_of_birth',$prsnl->date_of_birth)}}" />
                            @error('date_of_birth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="ctzn_front">Citizenship Front :</label>
                            <input type="file" name="ctzn_front"
                                class="form-control input-height @error('ctzn_front') is-invalid @enderror"
                                value="{{old('ctzn_front','')}}" />
                            @error('ctzn_front')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="ctzn_back">Citizenship Front :</label>
                            <input type="file" name="ctzn_back"
                                class="form-control input-height @error('ctzn_back') is-invalid @enderror"
                                value="{{old('ctzn_back','')}}" />
                            @error('ctzn_back')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <input type="hidden" class="form-control" value="{{Auth::user()->id}}" required readonly
                                name="user_id" />
                            <div class="form-group">
                                <div class="offset-md-3 col-md-9">
                                    <button type="submit" class="btn btn-success m-r-20 my-3">Update</button>
                                    <a class="btn btn-secondary" href="{{route('profile')}}">Cancel</a>
                                </div>
                            </div>
                        </form>

                        @endif
                    </div>
                    <!-- work detail -->
                    <div role="tabpanel" class="tab-pane" id="workInfo">
                        <h1>Work Info </h1>
                        @if( $wrk == [])
                        <form action="{{route('work.store')}}" id="form_sample_2" class="form-horizontal" method="post"
                            autocomplete="on">
                            {{csrf_field()}}

                            <label for="experiences">Experiences :</label>
                            <textarea name="experiences" required placeholder="Write about your experiences"
                                class="form-control input-height @error('experiences') is-invalid @enderror">{{old('experiences','')}}</textarea>
                            @error('experiences')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="skills">Skills :</label>
                            <textarea name="skills" required placeholder="Write about skills you gained."
                                class="form-control input-height @error('skills') is-invalid @enderror">{{old('skills','')}}</textarea>
                            @error('skills')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="projects">Projects :</label>
                            <textarea name="projects" required placeholder="Write about your completed projects."
                                class="form-control input-height @error('projects') is-invalid @enderror">{{old('projects','')}}</textarea>
                            @error('projects')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <input type="hidden" class="form-control" value="{{Auth::user()->id}}" required readonly
                                name="user_id" />
                            <div class="form-group">
                                <div class="offset-md-3 col-md-9">
                                    <button type="submit" class="btn btn-success m-r-20 my-3">Add</button>
                                    <a class="btn btn-secondary" href="{{route('profile')}}">Cancel</a>
                                </div>
                            </div>
                        </form>
                        @else
                        <form action="{{route('work.update',$wrk->id)}}" id="form_sample_2" class="form-horizontal"
                            method="post" autocomplete="on">
                            {{csrf_field()}}
                            @method('PUT')
                            <input type="hidden" name="_method" value="PUT">
                            <label for="experience">Experiences :</label>
                            <textarea name="experience" required placeholder="Write about your experiences"
                                class="form-control input-height @error('experience') is-invalid @enderror">{{old('experiences',$wrk->experiences)}}</textarea>
                            @error('experience')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="skills">Skills :</label>
                            <textarea name="skills" required placeholder="Write about skills you gained."
                                class="form-control input-height @error('skills') is-invalid @enderror">{{old('skills',$wrk->skills)}}</textarea>
                            @error('skills')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="projects">Projects :</label>
                            <textarea name="projects" required placeholder="Write about your completed projects."
                                class="form-control input-height @error('projects') is-invalid @enderror">{{old('projects',$wrk->projects)}}</textarea>
                            @error('projects')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <input type="hidden" class="form-control" value="{{Auth::user()->id}}" required readonly
                                name="user_id" />
                            <div class="form-group">
                                <div class="offset-md-3 col-md-9">
                                    <button type="submit" class="btn btn-success m-r-20 my-3">Update</button>
                                    <a class="btn btn-secondary" href="{{route('profile')}}">Cancel</a>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>

                    <!---------Education Info ----->
                    <div role="tabpanel" class="tab-pane" id="educationInfo">
                        <h1>Education Info </h1>
                        @if( $educ == [])
                        <form action="{{route('education.store')}}" id="form_sample_2" class="form-horizontal"
                            method="post" autocomplete="on">
                            {{csrf_field()}}
                            <label for="degree">Degree</label>
                            <input type="text" name="degree" required placeholder="Enter Your Degree"
                                class="form-control input-height @error('degree') is-invalid @enderror"
                                value="{{old('degree','')}}" />
                            @error('degree')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="board">Board</label>
                            <input type="text" name="board" required placeholder="Enter Your Board"
                                class="form-control input-height @error('board') is-invalid @enderror"
                                value="{{old('board','')}}" />
                            @error('board')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="faculty">Faculty</label>
                            <input type="text" name="faculty" required placeholder="Enter Your Faculty"
                                class="form-control input-height @error('faculty') is-invalid @enderror"
                                value="{{old('faculty','')}}" />
                            @error('faculty')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="institute_name">Institute Name</label>
                            <input type="text" name="institute_name" required placeholder="Enter Your Institute Name"
                                class="form-control input-height @error('institute_name') is-invalid @enderror"
                                value="{{old('institute_name','')}}" />
                            @error('institute_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="institute_address">Institute Address</label>
                            <input type="text" name="institute_address" required
                                placeholder="Enter Your Institute Address"
                                class="form-control input-height @error('institute_address') is-invalid @enderror"
                                value="{{old('institute_address','')}}" />
                            @error('institute_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="passed_year">Passed Year</label>
                            <input type="date" name="passed_year" required placeholder="Enter Your Institute Address"
                                class="form-control input-height @error('passed_year') is-invalid @enderror"
                                value="{{old('passed_year','')}}" />
                            @error('passed_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="division">Division</label>
                            <input type="text" name="division" required placeholder="Enter Your Division"
                                class="form-control input-height @error('division') is-invalid @enderror"
                                value="{{old('division','')}}" />
                            @error('division')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <input type="hidden" class="form-control" value="{{Auth::user()->id}}" required readonly
                                name="user_id" />
                            <div class="form-group">
                                <div class="offset-md-3 col-md-9">
                                    <button type="submit" class="btn btn-info m-r-20 my-3">Add</button>
                                    <a class="btn btn-secondary" href="{{route('profile')}}">Cancel</a>
                                </div>
                            </div>
                        </form>
                        @else
                        <form action="{{route('education.update',$educ->id)}}" id="form_sample_2"
                            class="form-horizontal" method="post" autocomplete="on">
                            {{csrf_field()}}
                            @method('PUT')
                            <input type="hidden" name="_method" value="PUT">
                            <label for="degree">Degree</label>
                            <input type="text" name="degree" required placeholder="Enter Your Degree"
                                class="form-control input-height @error('degree') is-invalid @enderror"
                                value="{{old('degree',$educ->degree)}}" />
                            @error('degree')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="board">Board</label>
                            <input type="text" name="board" required placeholder="Enter Your Board"
                                class="form-control input-height @error('board') is-invalid @enderror"
                                value="{{old('board',$educ->board)}}" />
                            @error('board')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="faculty">Faculty</label>
                            <input type="text" name="faculty" required placeholder="Enter Your Faculty"
                                class="form-control input-height @error('faculty') is-invalid @enderror"
                                value="{{old('faculty',$educ->faculty)}}" />
                            @error('faculty')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="institute_name">Institute Name</label>
                            <input type="text" name="institute_name" required placeholder="Enter Your Institute Name"
                                class="form-control input-height @error('institute_name') is-invalid @enderror"
                                value="{{old('institute_name',$educ->institute_name)}}" />
                            @error('institute_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="institute_address">Institute Address</label>
                            <input type="text" name="institute_address" required
                                placeholder="Enter Your Institute Address"
                                class="form-control input-height @error('institute_address') is-invalid @enderror"
                                value="{{old('institute_address',$educ->institute_address)}}" />
                            @error('institute_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="passed_year">Passed Year</label>
                            <input type="date" name="passed_year" required placeholder="Enter Your Institute Address"
                                class="form-control input-height @error('passed_year') is-invalid @enderror"
                                value="{{old('passed_year',$educ->passed_year)}}" />
                            @error('passed_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <label for="division">Division</label>
                            <input type="text" name="division" required placeholder="Enter Your Division"
                                class="form-control input-height @error('division') is-invalid @enderror"
                                value="{{old('division',$educ->division)}}" />
                            @error('division')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            {{csrf_field()}}
                            <input type="hidden" class="form-control" value="{{Auth::user()->id}}" required readonly
                                name="user_id" />
                            <div class="form-group">
                                <div class="offset-md-3 col-md-9">
                                    <button type="submit" class="btn btn-info m-r-20 my-3">Update</button>
                                    <a class="btn btn-secondary" href="{{route('profile')}}">Cancel</a>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>

@endSection
