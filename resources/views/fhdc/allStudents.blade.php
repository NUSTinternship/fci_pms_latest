@extends('layouts.app')

@section('content')
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-right" id="sidebar-wrapper" style="background-color: #1b2d5d; color: white;">
      <div class="sidebar-heading">FHDC Portal</div>
      <div class="list-group list-group-flush">
        <a href="{{route('hdc-home')}}" class="list-group-item list-group-item-action text-white active"><i class="fa fa-home" id="icons"
            aria-hidden="true"></i>Home</a>
        <a href="{{route('hdc-application')}}" class="list-group-item list-group-item-action text-white"><i class="fa fa-newspaper" id="icons"
            aria-hidden="true"></i>Application</a>
        <a href="{{route('hdc-proposal')}}" class="list-group-item list-group-item-action text-white"><i class="fa fa-sticky-note"
            id="icons" aria-hidden="true"></i>Proposal</a>
        <a href="{{route('hdc-thesis')}}" class="list-group-item list-group-item-action text-white"><i
            class="fa fa-pencil-alt" id="icons" aria-hidden="true"></i>Thesis</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
          <button class="btn btn-light" id="menu-toggle"><span class="dark-blue-text"><i class="fa fa-bars"
                aria-hidden="true"></i></span></button>
        </nav>
  
        <!-- If Student Hasn't Submitted Proposal Yet -->
        <div class="container-fluid">
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
                        <th scope="col" style="color: white;">Progress</th>
                      </tr>
                    </thead>
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" colspan="2">Masters Students</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($mastersStudents as $student)
                          <tr>
                            <td><a href="#" style="color: black;">{{ $student->name }}</a></td>
                            <td>
                              {{ $student->progress }}
                            </td>
                          </tr>
                          @empty
                            <td colspan="3" style="text-align: center; font-weight: bold">No Masters Students</td>
                        @endforelse
                    </tbody>
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" colspan="2">PhD Students</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($phdStudents as $student)
                          <tr>
                            <td><a href="#" style="color: black;">{{ $student->name }}</a></td>
                            <td>
                              {{ $student->progress }}
                            </td>
                          </tr>
                          @empty
                            <td colspan="3" style="text-align: center; font-weight: bold">No PhD Students</td>
                        @endforelse
                    </tbody>
                  </table>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <!-- /#page-content-wrapper -->
@endsection

