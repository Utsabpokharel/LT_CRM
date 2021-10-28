@extends('Admin.Layout.master')
@section('title', 'My Profile')
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
        background-color: #00a504;
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

    .nav-iitem a {
        text-align: center;
        color: #000;
        font-size: 25px;

    }

    .navbar-nav .nav-link {
        font-size: 16px;
    }

    .nav-iitem:hover {
        background: #00a504;
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
                    <li class="active">My Profile</li>
                </ol>
            </div>
        </div>
        <div class="card card-box">

            <div class="row mainBody">
                <div class="col-md-4 leftTab">
                    <div class="profileImg">
                        @if($employee->photo != [])
                        <img src="{{asset('Uploads/Employee/Image/'.$employee->photo)}}" alt="Profile Image">
                        @elseif($customer)
                        <img src="{{asset('Uploads/Customer/Image/'.$customer->photo)}}" alt="Profile Image">
                        @else
                        <img src="{{asset('img/undraw_profile.svg')}}" alt="Image" />
                        @endif
                    </div>
                    <div class="userName">
                        <h2>{{Auth::user()->username}}</h2>
                        <h6 class="mx-5">{{Auth::user()->roles->name}}</h6>
                    </div>
                    <div class="status my-3">Active</div>

                    <ul class="nav nav-tabs nav navbar-nav">
                        <li class="nav-iitem">
                            <a href="#personalOverview" class="nav-link active" role="tab" data-toggle="tab">
                                Profile Overview</a>
                        </li>
                        <li class="nav-iitem">
                            <a href="#personalInfo" class="nav-link" role="tab" data-toggle="tab">Personal Info</a>
                        </li>
                        <li class="nav-iitem">
                            <a href="#workInfo" class="nav-link" role="tab" data-toggle="tab">Work Info</a>
                        </li>
                        <li class="nav-iitem">
                            <a href="#educationInfo" class="nav-link" role="tab" data-toggle="tab">Education Info</a>
                        </li>
                    </ul>
                    <h2 class="text-center mt-4">
                        <a href="{{route('updateprofile')}}" class="btn btn-warning">Update Profile</a>
                    </h2>
                </div>
                <div class="col-md-8 tab-content">
                    <div role="tabpanel" class="tab-pane active" id="personalOverview">
                        <div class="row heading1">
                            <h2>Basic Details</h2>
                        </div>

                        <div class="row pItems">
                            <div class="col-md-6">Username :</div>
                            <div class="col-md-6">{{Auth::user()->username}}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-6">Email</div>
                            <div class="col-md-6">{{Auth::user()->email}}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-6">Role :</div>
                            <div class="col-md-6">{{Auth::user()->roles->name}}</div>
                        </div>
                        @if($employee)
                        <div class="row pItems">
                            <div class="col-md-6">Full Name :</div>
                            <div class="col-md-6">{{$employee->firstname}} {{$employee->lastname}}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-6">Employee Id :</div>
                            <div class="col-md-6">{{$employee->staff_id}}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-6">Contact Number:</div>
                            <div class="col-md-6">{{$employee->contact_number}}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-6">Department:</div>
                            <div class="col-md-6">{{$employee->department}}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-6">Title:</div>
                            <div class="col-md-6">{{$employee->title}}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-6">Level:</div>
                            <div class="col-md-6">{{$employee->level}}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-6">PAN:</div>
                            <div class="col-md-6">{{$employee->pan}}</div>
                        </div>
                        @endif
                        @if($customer)
                        <div class="row pItems">
                            <div class="col-md-6">Customer Type:</div>
                            <div class="col-md-6">{{$customer->customer_type}}</div>
                        </div>
                        @endif
                        <div class="bankDetails">
                            <h2>Bank Account Details</h2>
                            <div class="BDetails">
                                <div class="row pItems">
                                    <div class="col-md-6">Bank Name</div>
                                    <div class="col-md-6">{{$bank ? $bank->bank_name:'Details Not Provided' }}</div>
                                </div>
                                <div class="row pItems">
                                    <div class="col-md-6">Bank Branch</div>
                                    <div class="col-md-6">{{$bank ? $bank->branch:'Details Not Provided' }}</div>
                                </div>
                                <div class="row pItems">
                                    <div class="col-md-6">Account Holder's Name</div>
                                    <div class="col-md-6">{{$bank ? $bank->account_holder:'Details Not Provided' }}
                                    </div>
                                </div>
                                <div class="row pItems">
                                    <div class="col-md-6">Account Number</div>
                                    <div class="col-md-6">{{$bank ? $bank->account_number:'Details Not Provided' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="personalInfo">
                        <h1>Personal Information</h1>
                        <div class="row pItems">
                            <div class="col-md-6">About Me :</div>
                            <div class="col-md-6">{{$prsnl ? $prsnl->about:'Update Profile' }}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-6">Permanent Address :</div>
                            <div class="col-md-6">{{$prsnl ? $prsnl->permanent_address:'Update Profile' }}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-6">Temporary Address :</div>
                            <div class="col-md-6">{{$prsnl ? $prsnl->temporary_address:'Update Profile' }}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-6">Gender :</div>
                            <div class="col-md-6">{{$prsnl ? $prsnl->gender:'Update Profile' }}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-6">Date of Birth :</div>
                            <div class="col-md-6">{{$prsnl ? $prsnl->date_of_birth:'Update Profile' }}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-6">Citizenship Front :</div>
                            @if($prsnl == [])
                            <div class="col-md-6">Update Profile</div>
                            @else
                            <img src="{{asset('Uploads/Citizenship/'.$prsnl->ctzn_front)}}" width="200px"
                                alt="Profile Image">
                            @endif
                        </div>
                        <div class="row pItems">
                            <div class="col-md-6">Citizenship Back :</div>
                            @if($prsnl == [])
                            <div class="col-md-6">Update Profile</div>
                            @else
                            <img src="{{asset('Uploads/Citizenship/'.$prsnl->ctzn_back)}}" width="200px"
                                alt="Profile Image">
                            @endif
                        </div>
                    </div>
                    <!-- work -->
                    <div role="tabpanel" class="tab-pane" id="workInfo">
                        <h1>Work Information</h1>
                        <div class="row pItems">
                            <div class="col-md-4">Work Experience :</div>
                            <div class="col-md-6">{{$wrk ? $wrk->experiences :'Update Profile' }}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-4">Skills :</div>
                            <div class="col-md-6">{{$wrk ? $wrk->skills :'Update Profile' }}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-4">Projects :</div>
                            <div class="col-md-6">{{$wrk ? $wrk->projects :'Update Profile' }}</div>
                        </div>
                    </div>
                    <!---------Education Info ----->
                    <div role="tabpanel" class="tab-pane" id="educationInfo">
                        <h1>Education Info </h1>
                        <div class="row pItems">
                            <div class="col-md-4">Degree :</div>
                            <div class="col-md-6">{{$educ ? $educ->degree:'Update Profile'}}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-4">Board :</div>
                            <div class="col-md-6">{{$educ ? $educ->board :'Update Profile'}}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-4">Faculty :</div>
                            <div class="col-md-6">{{$educ ? $educ->faculty :'Update Profile'}}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-4">Institute Name :</div>
                            <div class="col-md-6">{{$educ ? $educ->institute_name :'Update Profile'}}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-4">Institute Address :</div>
                            <div class="col-md-6">{{$educ ? $educ->institute_address :'Update Profile'}}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-4">Passed Year :</div>
                            <div class="col-md-6">{{$educ ? $educ->passed_year :'Update Profile'}}</div>
                        </div>
                        <div class="row pItems">
                            <div class="col-md-4">Division :</div>
                            <div class="col-md-6">{{$educ ? $educ->division :'Update Profile'}}</div>
                        </div>

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
