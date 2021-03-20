@extends('Admin.Layout.master')
@section('content')
            <div class="page-title-breadcrumb pull-left">                
                <ol class="breadcrumb page-breadcrumb ">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('user.index')}}">Users</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">All User</li>
                </ol>                
            </div>     
        <div class="card-body p-0 border-0 shadow-lg">
            <!-- Nested Row within Card Body -->
             
             <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 row">
                            <div class="col-md-6">
                                <h6 class="font-weight-bold text-primary">All Users</h6>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-success float-right" href="{{route('user.create')}}">Add +</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="text-center">
                                        <tr>
                                            <th>11</th>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>

                                        <form action="" method="GET" style="display: inline-block">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                            <button class="btn btn-primary btn-sm" type="submit"><span
                                                    class="fa fa-edit"></span></button>
                                        </form>                                        
                                        <form action="" method="post" style="display: inline-block">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-danger btn-sm" type="submit"><span
                                                    class="fa fa-trash"></span></button>
                                        </form>
                                    </td>
                                        </tr>
                                        <tr>
                                            <th>21</th>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                        </tr>                                        
                                        <tr>
                                            <th>12</th>
                                            <td>Caesar Vance</td>
                                            <td>Pre-Sales Support</td>
                                            <td>New York</td>
                                            <td>21</td>
                                            <td>2011/12/12</td>
                                            <td>$106,450</td>
                                        </tr>           
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            
        </div>
    
@endsection
