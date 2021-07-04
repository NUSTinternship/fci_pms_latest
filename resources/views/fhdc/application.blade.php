@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper" style="background-color: #1b2d5d; color: white;">
            <div class="sidebar-heading">FHDC Portal</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('hdc-home') }}" class="list-group-item list-group-item-action text-white"><i
                        class="fa fa-home" id="icons" aria-hidden="true"></i>Home</a>
                <a href="{{ route('hdc-application') }}" class="list-group-item list-group-item-action text-white active"><i
                        class="fa fa-newspaper" id="icons" aria-hidden="true"></i>Application</a>
                <a href="{{ route('hdc-proposal') }}" class="list-group-item list-group-item-action text-white"><i
                        class="fa fa-sticky-note" id="icons" aria-hidden="true"></i>Proposal</a>
                <a href="{{ route('hdc-thesis') }}" class="list-group-item list-group-item-action text-white"><i
                        class="fa fa-pencil-alt" id="icons" aria-hidden="true"></i>Thesis</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <div class="container-fluid">
                <button class="btn btn-light" id="menu-toggle"><span class="dark-blue-text"><i class="fa fa-bars"
                            aria-hidden="true"></i></span></button>
                <div class="row" style="padding-top: 3%;">
                    <div class="col-sm-12">
                        <div class="card shadow p-3 mb-5 bg-white rounded h-70 border-left-primary">
                            <!--Assign Supervisor Card-->
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold" style="text-align: center">ASSIGN SUPERVISOR</h5>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h5 class="card-title font-weight-bold">DEPARTMENT OF COMPUTER SCIENCE</h5>
                                        <table class="table table-hover">
                                            <thead class="thead-blue">
                                                <tr>
                                                    <th scope="col" style="color: white;">Student</th>
                                                    <th scope="col" style="color: white;">Supervisor</th>
                                                    <th scope="col" style="color: white;">Co-Supervisor</th>
                                                </tr>
                                            </thead>
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" colspan="3">Masters Students</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($compSciMastersStudents as $student)
                                                    <tr>
                                                        <td><a href="#" style="color: black;">{{ $student->name }}</a>
                                                        </td>
                                                        @if ($student->supervisor_id != null)
                                                            <td>
                                                                {{ App\Models\User::find(App\Models\Supervisor::find($student->supervisor_id)->user_id)->name }}
                                                            </td>
                                                        @else
                                                        <td>
                                                          <button type="button" class="btn btn-primary" data-toggle="modal"
                                                              data-target="#assignEval">Assign</button>
                                                          <!-- Modal -->
                                                          <div class="modal fade" id="assignEval" tabindex="-1" role="dialog"
                                                              aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                              <div class="modal-dialog" role="document">
                                                                  <div class="modal-content">
                                                                      <div class="modal-header">
                                                                          <h5 class="modal-title" id="exampleModalLabel">
                                                                              Assign Supervisor</h5>
                                                                          <button type="button" class="close"
                                                                              data-dismiss="modal" aria-label="Close">
                                                                              <span aria-hidden="true">&times;</span>
                                                                          </button>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                          <label>Please select a supervisor:</label>
                                                                          <select class="form-select"
                                                                              aria-label="Default select example">
                                                                              <option selected>Assign</option>
                                                                              <option value="1">One</option>
                                                                              <option value="2">Two</option>
                                                                              <option value="3">Three</option>
                                                                          </select>
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                          <button type="button" class="btn btn-secondary"
                                                                              data-dismiss="modal">Close</button>
                                                                          <button type="button"
                                                                              class="btn btn-primary">Submit</button>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </td>
                                                        @endif
                                                        @if ($student->co_supervisor_id != null)
                                                        {{ $co_supervisor_id = App\Models\Supervisor::find($student->co_supervisor_id)->user_id }}
                                                        <td>
                                                          {{ App\Models\User::find($co_supervisor_id)->name }}
                                                      </td>
                                                        @else
                                                        <td>
                                                          <button type="button" class="btn btn-primary" data-toggle="modal"
                                                              data-target="#assignCoEval">Assign</button>
                                                          <!-- Modal -->
                                                          <div class="modal fade" id="assignCoEval" tabindex="-1"
                                                              role="dialog" aria-labelledby="exampleModalLabel"
                                                              aria-hidden="true">
                                                              <div class="modal-dialog" role="document">
                                                                  <div class="modal-content">
                                                                      <div class="modal-header">
                                                                          <h5 class="modal-title" id="exampleModalLabel">
                                                                              Assign Co-Supervisor</h5>
                                                                          <button type="button" class="close"
                                                                              data-dismiss="modal" aria-label="Close">
                                                                              <span aria-hidden="true">&times;</span>
                                                                          </button>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                          <label>Please select a co-supervisor:</label>
                                                                          <select class="form-select"
                                                                              aria-label="Default select example">
                                                                              <option selected>N/A</option>
                                                                              <option value="1">One</option>
                                                                              <option value="2">Two</option>
                                                                              <option value="3">Three</option>
                                                                          </select>
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                          <button type="button" class="btn btn-secondary"
                                                                              data-dismiss="modal">Close</button>
                                                                          <button type="button"
                                                                              class="btn btn-primary">Submit</button>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </td>
                                                        @endif
                                                  </tr>
                                                @empty
                                                    <td colspan="3" style="text-align: center; font-weight: bold">No Masters
                                                        Students In This Department</td>
                                                @endforelse
                                                </tr>
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" colspan="3">PhD Students</th>
                                                    </tr>
                                                </thead>
                                            <tbody>
                                              @forelse ($compSciPhdStudents as $student)
                                                <tr>
                                                  <td><a href="#" style="color: black;">{{ $student->name }}</a>
                                                  </td>
                                                  @if ($student->supervisor_id != null)
                                                            <td>
                                                                {{ App\Models\User::find(App\Models\Supervisor::find($student->supervisor_id)->user_id)->name }}
                                                            </td>
                                                        @else
                                                        <td>
                                                          <button type="button" class="btn btn-primary" data-toggle="modal"
                                                              data-target="#assignEval">Assign</button>
                                                          <!-- Modal -->
                                                          <div class="modal fade" id="assignEval" tabindex="-1" role="dialog"
                                                              aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                              <div class="modal-dialog" role="document">
                                                                  <div class="modal-content">
                                                                      <div class="modal-header">
                                                                          <h5 class="modal-title" id="exampleModalLabel">
                                                                              Assign Supervisor</h5>
                                                                          <button type="button" class="close"
                                                                              data-dismiss="modal" aria-label="Close">
                                                                              <span aria-hidden="true">&times;</span>
                                                                          </button>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                          <label>Please select a supervisor:</label>
                                                                          <select class="form-select"
                                                                              aria-label="Default select example">
                                                                              <option selected>Assign</option>
                                                                              <option value="1">One</option>
                                                                              <option value="2">Two</option>
                                                                              <option value="3">Three</option>
                                                                          </select>
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                          <button type="button" class="btn btn-secondary"
                                                                              data-dismiss="modal">Close</button>
                                                                          <button type="button"
                                                                              class="btn btn-primary">Submit</button>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </td>
                                                        @endif
                                                        @if ($student->co_supervisor_id != null)
                                                        {{ $co_supervisor_id = App\Models\Supervisor::find($student->co_supervisor_id)->user_id }}
                                                        <td>
                                                          {{ App\Models\User::find($co_supervisor_id)->name }}
                                                      </td>
                                                        @else
                                                        <td>
                                                          <button type="button" class="btn btn-primary" data-toggle="modal"
                                                              data-target="#assignCoEval">Assign</button>
                                                          <!-- Modal -->
                                                          <div class="modal fade" id="assignCoEval" tabindex="-1"
                                                              role="dialog" aria-labelledby="exampleModalLabel"
                                                              aria-hidden="true">
                                                              <div class="modal-dialog" role="document">
                                                                  <div class="modal-content">
                                                                      <div class="modal-header">
                                                                          <h5 class="modal-title" id="exampleModalLabel">
                                                                              Assign Co-Supervisor</h5>
                                                                          <button type="button" class="close"
                                                                              data-dismiss="modal" aria-label="Close">
                                                                              <span aria-hidden="true">&times;</span>
                                                                          </button>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                          <label>Please select a co-supervisor:</label>
                                                                          <select class="form-select"
                                                                              aria-label="Default select example">
                                                                              <option selected>N/A</option>
                                                                              <option value="1">One</option>
                                                                              <option value="2">Two</option>
                                                                              <option value="3">Three</option>
                                                                          </select>
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                          <button type="button" class="btn btn-secondary"
                                                                              data-dismiss="modal">Close</button>
                                                                          <button type="button"
                                                                              class="btn btn-primary">Submit</button>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </td>
                                                        @endif
                                                </tr>
                                              @empty
                                              <td colspan="3" style="text-align: center; font-weight: bold">No PhD
                                                Students In This Department</td>
                                              @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5 class="card-title font-weight-bold">DEPARTMENT OF INFORMATICS</h5>
                                        <table class="table table-hover">
                                            <thead class="thead-blue">
                                                <tr>
                                                    <th scope="col" style="color: white;">Student</th>
                                                    <th scope="col" style="color: white;">Supervisor</th>
                                                    <th scope="col" style="color: white;">Co-Supervisor</th>
                                                </tr>
                                            </thead>
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" colspan="3">Masters Students</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @forelse ($informaticsMastersStudents as $student)
                                              <tr>
                                                  <td><a href="#" style="color: black;">{{ $student->name }}</a>
                                                  </td>
                                                  @if ($student->supervisor_id != null)
                                                      <td>
                                                          {{ App\Models\User::find(App\Models\Supervisor::find($student->supervisor_id)->user_id)->name }}
                                                      </td>
                                                  @else
                                                  <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#assignEval">Assign</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="assignEval" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Assign Supervisor</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <label>Please select a supervisor:</label>
                                                                    <select class="form-select"
                                                                        aria-label="Default select example">
                                                                        <option selected>Assign</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button"
                                                                        class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                  @endif
                                                  @if ($student->co_supervisor_id != null)
                                                  {{ $co_supervisor_id = App\Models\Supervisor::find($student->co_supervisor_id)->user_id }}
                                                  <td>
                                                    {{ App\Models\User::find($co_supervisor_id)->name }}
                                                </td>
                                                  @else
                                                  <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#assignCoEval">Assign</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="assignCoEval" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Assign Co-Supervisor</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <label>Please select a co-supervisor:</label>
                                                                    <select class="form-select"
                                                                        aria-label="Default select example">
                                                                        <option selected>N/A</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button"
                                                                        class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                  @endif
                                            </tr>
                                          @empty
                                              <td colspan="3" style="text-align: center; font-weight: bold">No Masters
                                                  Students In This Department</td>
                                          @endforelse
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" colspan="3">PhD Students</th>
                                                    </tr>
                                                </thead>
                                            <tbody>
                                              @forelse ($informaticsPhdStudents as $student)
                                                <tr>
                                                  <td><a href="#" style="color: black;">{{ $student->name }}</a>
                                                  </td>
                                                  @if ($student->supervisor_id != null)
                                                            <td>
                                                                {{ App\Models\User::find(App\Models\Supervisor::find($student->supervisor_id)->user_id)->name }}
                                                            </td>
                                                        @else
                                                        <td>
                                                          <button type="button" class="btn btn-primary" data-toggle="modal"
                                                              data-target="#assignEval">Assign</button>
                                                          <!-- Modal -->
                                                          <div class="modal fade" id="assignEval" tabindex="-1" role="dialog"
                                                              aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                              <div class="modal-dialog" role="document">
                                                                  <div class="modal-content">
                                                                      <div class="modal-header">
                                                                          <h5 class="modal-title" id="exampleModalLabel">
                                                                              Assign Supervisor</h5>
                                                                          <button type="button" class="close"
                                                                              data-dismiss="modal" aria-label="Close">
                                                                              <span aria-hidden="true">&times;</span>
                                                                          </button>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                          <label>Please select a supervisor:</label>
                                                                          <select class="form-select"
                                                                              aria-label="Default select example">
                                                                              <option selected>Assign</option>
                                                                              <option value="1">One</option>
                                                                              <option value="2">Two</option>
                                                                              <option value="3">Three</option>
                                                                          </select>
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                          <button type="button" class="btn btn-secondary"
                                                                              data-dismiss="modal">Close</button>
                                                                          <button type="button"
                                                                              class="btn btn-primary">Submit</button>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </td>
                                                        @endif
                                                        @if ($student->co_supervisor_id != null)
                                                        {{ $co_supervisor_id = App\Models\Supervisor::find($student->co_supervisor_id)->user_id }}
                                                        <td>
                                                          {{ App\Models\User::find($co_supervisor_id)->name }}
                                                      </td>
                                                        @else
                                                        <td>
                                                          <button type="button" class="btn btn-primary" data-toggle="modal"
                                                              data-target="#assignCoEval">Assign</button>
                                                          <!-- Modal -->
                                                          <div class="modal fade" id="assignCoEval" tabindex="-1"
                                                              role="dialog" aria-labelledby="exampleModalLabel"
                                                              aria-hidden="true">
                                                              <div class="modal-dialog" role="document">
                                                                  <div class="modal-content">
                                                                      <div class="modal-header">
                                                                          <h5 class="modal-title" id="exampleModalLabel">
                                                                              Assign Co-Supervisor</h5>
                                                                          <button type="button" class="close"
                                                                              data-dismiss="modal" aria-label="Close">
                                                                              <span aria-hidden="true">&times;</span>
                                                                          </button>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                          <label>Please select a co-supervisor:</label>
                                                                          <select class="form-select"
                                                                              aria-label="Default select example">
                                                                              <option selected>N/A</option>
                                                                              <option value="1">One</option>
                                                                              <option value="2">Two</option>
                                                                              <option value="3">Three</option>
                                                                          </select>
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                          <button type="button" class="btn btn-secondary"
                                                                              data-dismiss="modal">Close</button>
                                                                          <button type="button"
                                                                              class="btn btn-primary">Submit</button>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </td>
                                                        @endif
                                                </tr>
                                              @empty
                                              <td colspan="3" style="text-align: center; font-weight: bold">No PhD
                                                Students In This Department</td>
                                              @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="assign-supervisor.html" type="button" class="btn btn-primary">See All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding-top: 3%;">
                    <div class="col-sm-12">
                        <div class="card shadow p-3 mb-5 bg-white rounded h-70 border-left-primary">
                            <!--Assign Supervisor Card-->
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">SUPERVISORS</h5>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h5 class="card-title font-weight-bold">DEPARTMENT OF COMPUTER SCIENCE</h5>
                                        <table class="table table-hover">
                                            <thead class="thead-blue">
                                                <tr>
                                                    <th scope="col" style="color: white;">Name</th>
                                                    <th scope="col" style="color: white;">Load</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Mr X</td>
                                                    <td>
                                                        3
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Ms Y</td>
                                                    <td>
                                                        2
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Mr Z</td>
                                                    <td>
                                                        1
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5 class="card-title font-weight-bold">DEPARTMENT OF INFORMATICS</h5>
                                        <table class="table table-hover">
                                            <thead class="thead-blue">
                                                <tr>
                                                    <th scope="col" style="color: white;">Name</th>
                                                    <th scope="col" style="color: white;">Load</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Mr X</td>
                                                    <td>
                                                        3
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Ms Y</td>
                                                    <td>
                                                        2
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Mr Z</td>
                                                    <td>
                                                        1
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
@endsection
