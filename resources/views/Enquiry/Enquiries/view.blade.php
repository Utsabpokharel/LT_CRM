@extends('Admin.Layout.master')
@section('title', 'All Enquiry')
@section('content')
<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('enquiry.index')}}"> Enquiry</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">All Enquiry</li>
    </ol>
</div>
<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 row">
            <div class="col-md-6">
                <h6 class="font-weight-bold text-primary">All Enquiry</h6>
            </div>
            <div class="col-md-6">
                <a class="btn btn-success float-right" href="{{route('enquiry.create')}}">Add +</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Enquiry Category</th>
                            <th>Enquiry Source</th>
                            <th>Enquired Date</th>
                            <th>Enquired Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Enquiry Category</th>
                            <th>Enquiry Source</th>
                            <th>Enquired Date</th>
                            <th>Enquired Time</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    @foreach($enquiry as $enquiry)
                    <tbody class="text-center">
                        <tr>
                            <th>{{$loop->index+1}}</th>
                            @if($enquiry->is_customer=='Yes')
                            <td>{{$enquiry->customer->firstname}} {{$enquiry->customer->lastname}}</td>
                            <td>{{$enquiry->customer->email}}</td>
                            <td>{{$enquiry->customer->contact_number}}</td>
                            @else
                            <td>{{$enquiry->name}}</td>
                            <td>{{$enquiry->email}}</td>
                            <td>{{$enquiry->phone}}</td>
                            @endif
                            <td>{{$enquiry->category['categoryname']}}</td>
                            <td>{{$enquiry->source['source']}}</td>
                            <td>{{$enquiry->date}}</td>
                            <td>{{$enquiry->time}}</td>
                            <td>
                                <form action="{{route('enquiry.edit',$enquiry->id)}}" method="GET"
                                    style="display: inline-block">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <button class="btn btn-primary btn-sm" type="submit"><span
                                            class="fa fa-edit"></span></button>
                                </form>
                                <form action="{{ route('enquiry.destroy', $enquiry->id)}}" method="post"
                                    style="display: inline-block">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger btn-sm" type="submit"><span
                                            class="fa fa-trash"></span></button>
                                </form>
                                <a href="{{ route('enquiryresponse.create', $enquiry->id)}}"><span class="fa fa-reply"></span></a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection