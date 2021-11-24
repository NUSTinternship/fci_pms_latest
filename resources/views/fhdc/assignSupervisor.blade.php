@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper" style="background-color: #1b2d5d; color: white;">
            <div class="sidebar-heading">FHDC Portal</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('hdc-home') }}" class="list-group-item list-group-item-action text-white"><i
                        class="fa fa-home" id="icons" aria-hidden="true"></i>Home</a>
                <a href="{{ route('hdc-application') }}"
                    class="list-group-item list-group-item-action text-white active"><i class="fa fa-newspaper" id="icons"
                        aria-hidden="true"></i>Application</a>
                <a href="{{ route('hdc-proposal') }}" class="list-group-item list-group-item-action text-white"><i
                        class="fa fa-sticky-note" id="icons" aria-hidden="true"></i>Proposal</a>
                <a href="{{ route('hdc-thesis') }}" class="list-group-item list-group-item-action text-white"><i
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
                            <h5 class="card-header">Assign Supervisors</h5>
                            <div class="card-body">
                                <hr>
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
                                        @forelse ($mastersStudents as $student)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('hdc.studentProfile', $student->user_id) }}" style="color: black;">{{ $student->name }}
                                                </td>
                                                @if (!$student->supervisor_id == null)
                                                    <td>
                                                        {{ App\Models\User::find(App\Models\Supervisor::find($student->supervisor_id)->user_id)->name }}
                                                    </td>
                                                @else
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#assignSupervisor">Assign</button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="assignSupervisor" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
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
                                                                        <form>
                                                                            @csrf
                                                                            <label>Please select a
                                                                                supervisor:</label>
                                                                            <div class="alert alert-danger print-assignSupervisor-error-msg"
                                                                                role="alert" style="display:none">
                                                                                <strong>
                                                                                    <ul></ul>
                                                                                </strong>
                                                                            </div>
                                                                            <div class="alert alert-success print-assignSupervisor-success-msg"
                                                                                role="alert" style="display:none">
                                                                                <strong>
                                                                                    Supervisor Successfully
                                                                                    Assigned.
                                                                                </strong>
                                                                            </div>
                                                                            <select name="select_assignSupervisor"
                                                                                id="select_assignSupervisor"
                                                                                class="form-control">
                                                                                @foreach ($users as $user)
                                                                                    <option value="{{ $user->id }}">
                                                                                        {{ $user->name }}</option>
                                                                                @endforeach
                                                                                <input type="hidden"
                                                                                    value="{{ $student->user_id }}"
                                                                                    id="assignSupervisor_student_id">
                                                                            </select>
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="button" id="assignSupervisorSubmit"
                                                                            class="btn btn-primary">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @endif
                                                @if (!$student->co_supervisor_id == null)
                                                    <td>
                                                        {{ App\Models\User::find(App\Models\Supervisor::find($student->co_supervisor_id)->user_id)->name }}
                                                    </td>
                                                @else
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#assignCoSupervisor">Assign</button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="assignCoSupervisor" tabindex="-1"
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
                                                                        <form>
                                                                            @csrf
                                                                            <label>Please select a
                                                                                supervisor:</label>
                                                                            <div class="alert alert-danger print-assignCoSupervisor-error-msg"
                                                                                role="alert" style="display:none">
                                                                                <strong>
                                                                                    <ul></ul>
                                                                                </strong>
                                                                            </div>
                                                                            <div class="alert alert-success print-assignCoSupervisor-success-msg"
                                                                                role="alert" style="display:none">
                                                                                <strong>
                                                                                    Supervisor Successfully
                                                                                    Assigned.
                                                                                </strong>
                                                                            </div>
                                                                            <select name="select_assignCoSupervisor"
                                                                                id="select_assignCoSupervisor"
                                                                                class="form-control">
                                                                                @foreach ($users as $user)
                                                                                    <option value="{{ $user->id }}">
                                                                                        {{ $user->name }}</option>
                                                                                @endforeach
                                                                                <input type="hidden"
                                                                                    value="{{ $student->user_id }}"
                                                                                    id="assignCoSupervisor_student_id">
                                                                            </select>
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="button" id="assignCoSupervisorSubmit"
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
                                                Students</td>
                                        @endforelse
                                    </tbody>
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" colspan="3">PhD Students</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($phdStudents as $student)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('hdc.studentProfile', $student->user_id) }}" style="color: black;">{{ $student->name }}
                                                </td>
                                                @if (!$student->supervisor_id == null)
                                                    <td>
                                                        {{ App\Models\User::find(App\Models\Supervisor::find($student->supervisor_id)->user_id)->name }}
                                                    </td>
                                                @else
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#assignSupervisor">Assign</button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="assignSupervisor" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
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
                                                                        <form>
                                                                            @csrf
                                                                            <label>Please select a
                                                                                supervisor:</label>
                                                                            <div class="alert alert-danger print-assignSupervisor-error-msg"
                                                                                role="alert" style="display:none">
                                                                                <strong>
                                                                                    <ul></ul>
                                                                                </strong>
                                                                            </div>
                                                                            <div class="alert alert-success print-assignSupervisor-success-msg"
                                                                                role="alert" style="display:none">
                                                                                <strong>
                                                                                    Supervisor Successfully
                                                                                    Assigned.
                                                                                </strong>
                                                                            </div>
                                                                            <select name="select_assignSupervisor"
                                                                                id="select_assignSupervisor"
                                                                                class="form-control">
                                                                                @foreach ($users as $user)
                                                                                    <option value="{{ $user->id }}">
                                                                                        {{ $user->name }}</option>
                                                                                @endforeach
                                                                                <input type="hidden"
                                                                                    value="{{ $student->user_id }}"
                                                                                    id="assignSupervisor_student_id">
                                                                            </select>
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="button" id="assignSupervisorSubmit"
                                                                            class="btn btn-primary">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @endif
                                                @if (!$student->co_supervisor_id == null)
                                                    <td>
                                                        {{ App\Models\User::find(App\Models\Supervisor::find($student->co_supervisor_id)->user_id)->name }}
                                                    </td>
                                                @else
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#assignCoSupervisor">Assign</button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="assignCoSupervisor" tabindex="-1"
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
                                                                        <form>
                                                                            @csrf
                                                                            <label>Please select a
                                                                                supervisor:</label>
                                                                            <div class="alert alert-danger print-assignCoSupervisor-error-msg"
                                                                                role="alert" style="display:none">
                                                                                <strong>
                                                                                    <ul></ul>
                                                                                </strong>
                                                                            </div>
                                                                            <div class="alert alert-success print-assignCoSupervisor-success-msg"
                                                                                role="alert" style="display:none">
                                                                                <strong>
                                                                                    Supervisor Successfully
                                                                                    Assigned.
                                                                                </strong>
                                                                            </div>
                                                                            <select name="select_assignCoSupervisor"
                                                                                id="select_assignCoSupervisor"
                                                                                class="form-control">
                                                                                <option value="None">None<option
                                                                                @foreach ($users as $user)
                                                                                    <option value="{{ $user->id }}">
                                                                                        {{ $user->name }}</option>
                                                                                @endforeach
                                                                                <input type="hidden"
                                                                                    value="{{ $student->user_id }}"
                                                                                    id="assignCoSupervisor_student_id">
                                                                            </select>
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="button" id="assignCoSupervisorSubmit"
                                                                            class="btn btn-primary">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                        @empty
                                            <td colspan="3" style="text-align: center; font-weight: bold">No PhD Students
                                            </td>
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
        <!-- /#page-content-wrapper -->

    </div>
@endsection
