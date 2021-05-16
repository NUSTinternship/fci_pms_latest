@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper" style="background-color: #1b2d5d; color: white;">
            <div class="sidebar-heading">Supervisor Portal</div>
            <div class="list-group list-group-flush">
                <a href="{{route('supervisor-home')}}" class="list-group-item list-group-item-action text-white"><i class="fa fa-home"
                        id="icons" aria-hidden="true"></i>Home</a>
                <a href="{{ route('supervisor-proposal') }}" class="list-group-item list-group-item-action text-white"><i class="fa fa-sticky-note"
                        id="icons" aria-hidden="true"></i>Proposal</a>
                <a href="{{ route('supervisor-thesis') }}" class="list-group-item list-group-item-action text-white active"><i
                        class="fa fa-pencil-alt" id="icons" aria-hidden="true"></i>Thesis</a>
            </div>
        </div>
        <!-- Page Content -->
        <div id="page-content-wrapper">
      
            <!-- If Student Hasn't Submitted Proposal Yet -->
            <div class="container-fluid">
                <button class="btn btn-light" id="menu-toggle"><span class="dark-blue-text"><i class="fa fa-bars"
                    aria-hidden="true"></i></span></button>
 
              <div class="row" style="padding-top: 3%;">
                <div class="col-sm-12">
                  <!--Monthly Progress Reports-->
                  <div class="card text-center shadow p-3 mb-5 bg-white rounded">
                    <h5 class="card-header">Students</h5>
                    <div class="card-body">
                      <hr>
                      <table class="table table-hover">
                        <thead class="thead-blue">
                          <tr>
                            <th scope="col" style="color: white;">Student</th>
                            <th scope="col" style="color: white;">Submitted Documents</th>
                          </tr>
                        </thead>
                        <thead class="thead-light">
                          <tr>
                            <th scope="col" colspan="2">Masters Students</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Peter Jonas</td>
                            <td>
                              <a href="student-thesis.html" type="button" class="btn btn-primary">View</a>
                            </td>
                          </tr>
                          <tr>
      
                            <td>Jonas Peter</td>
                            <td>
                              <button type="button" class="btn btn-primary">View</button>
                            </td>
                          </tr>
                          <tr>
                            <td>Tangeni Samuel</td>
                            <td>
                              <button type="button" class="btn btn-primary">View</button>
                            </td>
                          </tr>
                        </tbody>
                        <thead class="thead-light">
                          <tr>
                            <th scope="col" colspan="2">PhD Students</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Peter Jonas</td>
                            <td>
                              <button type="button" class="btn btn-primary">View</button>
                            </td>
                          </tr>
                          <tr>
      
                            <td>Jonas Peter</td>
                            <td>
                              <button type="button" class="btn btn-primary">View</button>
                            </td>
                          </tr>
                          <tr>
                            <td>Tangeni Samuel</td>
                            <td>
                              <button type="button" class="btn btn-primary">View</button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <hr>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /#page-content-wrapper -->
    @endsection
