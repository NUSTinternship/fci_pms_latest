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
                                                        <td><a href="{{ route('student.profile', $student->id) }}" style="color: black;">{{ $student->name }}</a>
                                                        </td>
                                                        @if ($student->supervisor_id != null)
                                                            <td>
                                                                {{ App\Models\User::find(App\Models\Supervisor::find($student->supervisor_id)->user_id)->name }}
                                                            </td>
                                                        @else
                                                            <td>
                                                                <button type="button" class="btn btn-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#assignCompMastersSupervisor">Assign</button>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="assignCompMastersSupervisor"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
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
                                                                                    <div class="alert alert-danger print-addSupervisorCompMasters-error-msg"
                                                                                        role="alert" style="display:none">
                                                                                        <strong>
                                                                                            <ul></ul>
                                                                                        </strong>
                                                                                    </div>
                                                                                    <div class="alert alert-success print-addSupervisorCompMasters-success-msg"
                                                                                        role="alert" style="display:none">
                                                                                        <strong>
                                                                                            Supervisor Successfully
                                                                                            Assigned.
                                                                                        </strong>
                                                                                    </div>
                                                                                    <select
                                                                                        name="select_comp_masters_supervisors"
                                                                                        id="select_comp_masters_supervisors"
                                                                                        class="form-control">
                                                                                        @foreach ($users as $user)
                                                                                            <option
                                                                                                value="{{ $user->id }}">
                                                                                                {{ $user->name }}</option>
                                                                                        @endforeach
                                                                                        <input type="hidden"
                                                                                            value="{{ $student->user_id }}"
                                                                                            id="comp_masters_student_id">
                                                                                    </select>
                                                                                </form>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button type="button"
                                                                                    id="addCompSciMastersSupervisor"
                                                                                    class="btn btn-primary">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        @endif
                                                        @if ($student->co_supervisor_id != null)
                                                            <td>
                                                                {{ App\Models\User::find(App\Models\Supervisor::find($student->co_supervisor_id)->user_id)->name }}
                                                            </td>
                                                        @else
                                                            <td>
                                                                <button type="button" class="btn btn-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#assignCompMastersCoSupervisor">Assign</button>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="assignCompMastersCoSupervisor"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
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
                                                                                        co-supervisor:</label>
                                                                                    <div class="alert alert-danger print-addCompMastersCoSupervisor-error-msg"
                                                                                        role="alert" style="display:none">
                                                                                        <strong>
                                                                                            <ul></ul>
                                                                                        </strong>
                                                                                    </div>
                                                                                    <div class="alert alert-success print-addCompMastersCoSupervisor-success-msg"
                                                                                        role="alert" style="display:none">
                                                                                        <strong>
                                                                                            Co-Supervisor Successfully
                                                                                            Assigned.
                                                                                        </strong>
                                                                                    </div>
                                                                                    <select
                                                                                        name="select_comp_masters_co_supervisors"
                                                                                        id="select_comp_masters_co_supervisors"
                                                                                        class="form-control">
                                                                                        @foreach ($users as $user)
                                                                                            <option
                                                                                                value="{{ $user->id }}">
                                                                                                {{ $user->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                        <input type="hidden"
                                                                                            value="{{ $student->user_id }}"
                                                                                            id="comp_mastersCo_student_id">
                                                                                    </select>
                                                                                </form>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button type="button"
                                                                                    id="addCompSciMastersCoSupervisor"
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
                                                        <td><a href="{{ route('student.profile', $student->id) }}" style="color: black;">{{ $student->name }}</a>
                                                        </td>
                                                        @if ($student->supervisor_id != null)
                                                            <td>
                                                                {{ App\Models\User::find(App\Models\Supervisor::find($student->supervisor_id)->user_id)->name }}
                                                            </td>
                                                        @else
                                                            <td>
                                                                <button type="button" class="btn btn-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#assignCompPhdSupervisor">Assign</button>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="assignCompPhdSupervisor"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
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
                                                                                    <div class="alert alert-danger print-addCompPhdSupervisor-error-msg"
                                                                                        role="alert" style="display:none">
                                                                                        <strong>
                                                                                            <ul></ul>
                                                                                        </strong>
                                                                                    </div>
                                                                                    <div class="alert alert-success print-addCompPhdSupervisor-success-msg"
                                                                                        role="alert" style="display:none">
                                                                                        <strong>
                                                                                            Supervisor Successfully
                                                                                            Assigned.
                                                                                        </strong>
                                                                                    </div>
                                                                                    <select
                                                                                        name="select_comp_phd_supervisors"
                                                                                        id="select_comp_phd_supervisors"
                                                                                        class="form-control">
                                                                                        @foreach ($users as $user)
                                                                                            <option
                                                                                                value="{{ $user->id }}">
                                                                                                {{ $user->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                        <input type="hidden"
                                                                                            value="{{ $student->user_id }}"
                                                                                            id="comp_phd_student_id">
                                                                                    </select>
                                                                                </form>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button type="button"
                                                                                    id="addCompSciPhdSupervisor"
                                                                                    class="btn btn-primary">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        @endif
                                                        @if ($student->co_supervisor_id != null)

                                                            <td>
                                                                {{ App\Models\User::find(App\Models\Supervisor::find($student->co_supervisor_id)->user_id)->name }}

                                                            </td>
                                                        @else
                                                            <td>
                                                                <button type="button" class="btn btn-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#assignCompPhdCoSupervisor">Assign</button>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="assignCompPhdCoSupervisor"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
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
                                                                                        co-supervisor:</label>
                                                                                    <div class="alert alert-danger print-addCompPhdCoSupervisor-error-msg"
                                                                                        role="alert" style="display:none">
                                                                                        <strong>
                                                                                            <ul></ul>
                                                                                        </strong>
                                                                                    </div>
                                                                                    <div class="alert alert-success print-addCompPhdCoSupervisor-success-msg"
                                                                                        role="alert" style="display:none">
                                                                                        <strong>
                                                                                            Co-Supervisor Successfully
                                                                                            Assigned.
                                                                                        </strong>
                                                                                    </div>
                                                                                    <select
                                                                                        name="select_comp_phd_co_supervisors"
                                                                                        id="select_comp_phd_co_supervisors"
                                                                                        class="form-control">
                                                                                        @foreach ($users as $user)
                                                                                            <option
                                                                                                value="{{ $user->id }}">
                                                                                                {{ $user->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                        <input type="hidden"
                                                                                            value="{{ $student->user_id }}"
                                                                                            id="comp_phdCo_student_id">
                                                                                    </select>
                                                                                </form>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button type="button"
                                                                                    id="addCompSciPhdCoSupervisor"
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
                                                        <td><a href="{{ route('student.profile', $student->id) }}" style="color: black;">{{ $student->name }}</a>
                                                        </td>
                                                        @if ($student->supervisor_id != null)
                                                            <td>
                                                                {{ App\Models\User::find(App\Models\Supervisor::find($student->supervisor_id)->user_id)->name }}
                                                            </td>
                                                        @else
                                                            <td>
                                                                <button type="button" class="btn btn-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#assignInfoMastersSupervisor">Assign</button>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="assignInfoMastersSupervisor"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
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
                                                                                        co-supervisor:</label>
                                                                                    <div class="alert alert-danger print-addInfoMastersSupervisor-error-msg"
                                                                                        role="alert" style="display:none">
                                                                                        <strong>
                                                                                            <ul></ul>
                                                                                        </strong>
                                                                                    </div>
                                                                                    <div class="alert alert-success print-addInfoMastersSupervisor-success-msg"
                                                                                        role="alert" style="display:none">
                                                                                        <strong>
                                                                                            Supervisor Successfully
                                                                                            Assigned.
                                                                                        </strong>
                                                                                    </div>
                                                                                    <select
                                                                                        name="select_info_masters_supervisors"
                                                                                        id="select_info_masters_supervisors"
                                                                                        class="form-control">
                                                                                        @foreach ($users as $user)
                                                                                            <option
                                                                                                value="{{ $user->id }}">
                                                                                                {{ $user->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                        <input type="hidden"
                                                                                            value="{{ $student->user_id }}"
                                                                                            id="info_masters_student_id">
                                                                                    </select>
                                                                                </form>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button type="button"
                                                                                    id="addInfoMastersSupervisor"
                                                                                    class="btn btn-primary">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        @endif
                                                        @if ($student->co_supervisor_id != null)

                                                            <td>

                                                                {{ App\Models\User::find(App\Models\Supervisor::find($student->co_supervisor_id)->user_id)->name }}
                                                            </td>
                                                        @else
                                                            <td>
                                                                <button type="button" class="btn btn-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#assignInfoMastersCoSupervisor">Assign</button>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="assignInfoMastersCoSupervisor"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
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
                                                                                        co-supervisor:</label>
                                                                                    <div class="alert alert-danger print-addInfoMastersCoSupervisor-error-msg"
                                                                                        role="alert" style="display:none">
                                                                                        <strong>
                                                                                            <ul></ul>
                                                                                        </strong>
                                                                                    </div>
                                                                                    <div class="alert alert-success print-addInfoMastersCoSupervisor-success-msg"
                                                                                        role="alert" style="display:none">
                                                                                        <strong>
                                                                                            Co-Supervisor Successfully
                                                                                            Assigned.
                                                                                        </strong>
                                                                                    </div>
                                                                                    <select
                                                                                        name="select_info_masters_co_supervisors"
                                                                                        id="select_info_masters_co_supervisors"
                                                                                        class="form-control">
                                                                                        @foreach ($users as $user)
                                                                                            <option
                                                                                                value="{{ $user->id }}">
                                                                                                {{ $user->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                        <input type="hidden"
                                                                                            value="{{ $student->user_id }}"
                                                                                            id="info_mastersCo_student_id">
                                                                                    </select>
                                                                                </form>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button type="button"
                                                                                    id="addInfoMastersCoSupervisor"
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
                                                        <td><a href="{{ route('student.profile', $student->id) }}" style="color: black;">{{ $student->name }}</a>
                                                        </td>
                                                        @if ($student->supervisor_id != null)
                                                            <td>
                                                                {{ App\Models\User::find(App\Models\Supervisor::find($student->supervisor_id)->user_id)->name }}
                                                            </td>
                                                        @else
                                                            <td>
                                                                <button type="button" class="btn btn-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#assignInfoPhdSupervisor">Assign</button>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="assignInfoPhdSupervisor"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
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
                                                                                    <div class="alert alert-danger print-addInfoPhdSupervisor-error-msg"
                                                                                        role="alert" style="display:none">
                                                                                        <strong>
                                                                                            <ul></ul>
                                                                                        </strong>
                                                                                    </div>
                                                                                    <div class="alert alert-success print-addInfoPhdSupervisor-success-msg"
                                                                                        role="alert" style="display:none">
                                                                                        <strong>
                                                                                            Supervisor Successfully
                                                                                            Assigned.
                                                                                        </strong>
                                                                                    </div>
                                                                                    <select
                                                                                        name="select_info_phd_supervisors"
                                                                                        id="select_info_phd_supervisors"
                                                                                        class="form-control">
                                                                                        @foreach ($users as $user)
                                                                                            <option
                                                                                                value="{{ $user->id }}">
                                                                                                {{ $user->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                        <input type="hidden"
                                                                                            value="{{ $student->user_id }}"
                                                                                            id="info_phd_student_id">
                                                                                    </select>
                                                                                </form>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button type="button"
                                                                                    id="addInfoPhdSupervisor"
                                                                                    class="btn btn-primary">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        @endif
                                                        @if ($student->co_supervisor_id != null)

                                                            <td>
                                                                {{ App\Models\User::find(App\Models\Supervisor::find($student->co_supervisor_id)->user_id)->name }}
                                                            </td>
                                                        @else
                                                            <td>
                                                                <button type="button" class="btn btn-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#assignInfoPhdCoSupervisor">Assign</button>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="assignInfoPhdCoSupervisor"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
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
                                                                                        co-supervisor:</label>
                                                                                    <div class="alert alert-danger print-addInfoPhdCoSupervisor-error-msg"
                                                                                        role="alert" style="display:none">
                                                                                        <strong>
                                                                                            <ul></ul>
                                                                                        </strong>
                                                                                    </div>
                                                                                    <div class="alert alert-success print-addInfoPhdCoSupervisor-success-msg"
                                                                                        role="alert" style="display:none">
                                                                                        <strong>
                                                                                            Co-Supervisor Successfully
                                                                                            Assigned.
                                                                                        </strong>
                                                                                    </div>
                                                                                    <select
                                                                                        name="select_info_phd_co_supervisors"
                                                                                        id="select_info_phd_co_supervisors"
                                                                                        class="form-control">
                                                                                        @foreach ($users as $user)
                                                                                            <option
                                                                                                value="{{ $user->id }}">
                                                                                                {{ $user->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                        <input type="hidden"
                                                                                            value="{{ $student->user_id }}"
                                                                                            id="info_phdCo_student_id">
                                                                                    </select>
                                                                                </form>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button type="button"
                                                                                    id="addInfoPhdCoSupervisor"
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
                                                @foreach ($supervisors as $key => $value)
                                                    @if (App\Models\Supervisor::find($key)->department == "Computer Science")
                                                        <tr>
                                                            <td>{{ App\Models\User::find(App\Models\Supervisor::find($key)->user_id)->name }}</td>
                                                            <td>
                                                                {{ $value }}
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                @foreach ($supervisorsWithNoLoad as $key => $value)
                                                            @if (App\Models\Supervisor::find($value)->department == "Computer Science")
                                                            <tr>
                                                                <td>
                                                                    {{ App\Models\User::find(App\Models\Supervisor::find($value)->user_id)->name }}
                                                                </td>
                                                                <td>
                                                                    0
                                                                </td>
                                                            </tr>
                                                            @endif
                                                @endforeach
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
                                                @foreach ($supervisors as $key => $value)
                                                    @if (App\Models\Supervisor::find($key)->department == "Informatics")
                                                    <tr>
                                                        <td>{{ App\Models\User::find(App\Models\Supervisor::find($key)->user_id)->name }}</td>
                                                        <td>
                                                            {{ $value }}
                                                        </td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                                @foreach ($supervisorsWithNoLoad as $key => $value)
                                                    @if (App\Models\Supervisor::find($value)->department == "Informatics")
                                                        <tr>
                                                            <td>
                                                                {{ App\Models\User::find(App\Models\Supervisor::find($value)->user_id)->name }}
                                                            </td>
                                                            <td>
                                                                0
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                {{-- @forelse ($supervisors as $key => $value)
                                                    @if (App\Models\Supervisor::find($key)->department == "Informatics")
                                                        <tr>
                                                            <td>{{ App\Models\User::find(App\Models\Supervisor::find($key)->user_id)->name }}</td>
                                                            <td>
                                                                {{ $value }}
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @empty
                                                    <td colspan="2" style="text-align: center; font-weight: bold">No Supervisors Found</td>
                                                @endforelse --}}
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
