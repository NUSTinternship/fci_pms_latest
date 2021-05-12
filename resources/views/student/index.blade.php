@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper" style="background-color: #1b2d5d; color: white;">
            <div class="sidebar-heading">Student Portal</div>
            <div class="list-group list-group-flush">
                <a href="{{route('student')}}" class="list-group-item list-group-item-action text-white active"><i class="fa fa-home"
                        id="icons" aria-hidden="true"></i>Home</a>
                <a href="progress.html" class="list-group-item list-group-item-action text-white"><i class="fa fa-tasks"
                        id="icons" aria-hidden="true"></i>Progress</a>
                <a href="{{route('superProposal')}}" class="list-group-item list-group-item-action text-white"><i class="fa fa-sticky-note"
                        id="icons" aria-hidden="true"></i>Proposal</a>
                <a href="{{route('superThesis')}}" class="list-group-item list-group-item-action text-white"><i
                        class="fa fa-pencil-alt" id="icons" aria-hidden="true"></i>Thesis</a>
            </div>
        </div>
        <!-- Page Content -->
        <div id="page-content-wrapper">

            <div class="container-fluid">
 
                    
                        <button class="btn btn-light" id="menu-toggle"><span class="dark-blue-text"><i class="fa fa-bars"
                                    aria-hidden="true"></i></span></button>
                    
               
                <div class="row" style="padding-top: 3%;">
                    <div class="col-sm-6">
                        <div class="card shadow p-3 mb-5 bg-white rounded h-70 border-left-primary">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">YOUR PROGRESS</h5>
                                <table class="table">
                                    <thead class="thead-blue">
                                        <tr>
                                            <th scope="col" style="color: white;">Stage</th>
                                            <th scope="col" style="color: white;">Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Proposal</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100">Completed</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Thesis</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100">In Progress</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Exam</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100">Blocked</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card shadow p-3 mb-5 bg-white rounded h-70 border-left-secondary">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">SUPERVISOR DETAILS</h5>
                                <p>Name: Nasimane Ekandjo</p>
                                <hr>
                                <p>Email: nekandjo@nust.na</p>
                                <hr>
                                <p>Office: Poly Heights Room 508</p>
                                <hr>
                                <p>Phone: +264 61 12345</p>
                                <!--<a href="#" class="btn btn-primary">Contact Supervisor</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid content-row">
                <div class="row" style="padding-top: 3%;">
                    <div class="col-sm-6">
                        <div class="card shadow p-3 mb-5 bg-white rounded h-70 border-left-primary ">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">TEMPLATES</h5>
                                <ul>
                                    <li><a href="#">Application Form</a></li>
                                    <li><a href="#">Report Template</a></li>
                                    <li><a href="#">Checklist</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card shadow p-3 mb-5 bg-white rounded h-70 border-left-secondary">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">CALENDER</h5>
                                <p>Name: Nasimane Ekandjo</p>
                                <hr>
                                <p>Email: nekandjo@nust.na</p>
                                <hr>
                                <p>Office: Poly Heights Room 508</p>
                                <hr>
                                <p>Phone: +264 61 12345</p>
                                <!--<a href="#" class="btn btn-primary">Contact Supervisor</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection