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

            <!-- If Student Hasn't Submitted Proposal Yet -->
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button class="btn btn-light" id="menu-toggle"><span class="dark-blue-text"><i class="fa fa-bars"
                                aria-hidden="true"></i></span></button>
                </nav>
                <div class="main-body">

                    <!-- Breadcrumb -->

                    <!-- /Breadcrumb -->

                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                            class="rounded-circle" width="150">
                                        <div class="mt-3">
                                            <h4>{{ $user->name }}</h4>
                                            <p class="text-secondary mb-1">{{ $student[0]->program }} Student</p>
                                            <p class="text-muted font-size-sm"></p>
                                            <button class="btn btn-outline-primary">Message</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->name }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->email }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Registration Year</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->created_at->format('Y') }}
                                        </div>
                                    </div>
                                    @if ($student[0]->supervisor_id != null && $student[0]->co_supervisor_id != null)
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Supervisor</h6>
                                            </div>
                                            <div class="col-sm-5 text-secondary">
                                                {{ App\Models\User::find(App\Models\Supervisor::find($student[0]->supervisor_id)->user_id)->name }}
                                            </div>
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#editSupervisor">Edit</button>
                                                <div class="modal fade" id="editSupervisor" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Edit Supervisor</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    @csrf
                                                                    <label>Please select a new
                                                                        supervisor:</label>
                                                                    <div class="alert alert-danger print-editSupervisor-error-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            <ul></ul>
                                                                        </strong>
                                                                    </div>
                                                                    <div class="alert alert-success print-editSupervisor-success-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            Supervisor Successfully
                                                                            Changed.
                                                                        </strong>
                                                                    </div>
                                                                    <select name="select_editSupervisor"
                                                                        id="select_editSupervisor" class="form-control">
                                                                        @foreach ($users as $user)
                                                                            <option value="{{ $user->id }}">
                                                                                {{ $user->name }}</option>
                                                                        @endforeach
                                                                        <input type="hidden"
                                                                            value="{{ $student[0]->user_id }}"
                                                                            id="editSupervisor_student_id">
                                                                    </select>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="button" id="editSupervisorSubmit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Co-Supervisor</h6>
                                            </div>
                                            <div class="col-sm-5 text-secondary">
                                                {{ App\Models\User::find(App\Models\Supervisor::find($student[0]->co_supervisor_id)->user_id)->name }}
                                            </div>
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#editCoSupervisor">Edit</button>
                                                <div class="modal fade" id="editCoSupervisor" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Edit Co-Supervisor</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    @csrf
                                                                    <label>Please select a new
                                                                        co-supervisor:</label>
                                                                    <div class="alert alert-danger print-editCoSupervisor-error-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            <ul></ul>
                                                                        </strong>
                                                                    </div>
                                                                    <div class="alert alert-success print-editCoSupervisor-success-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            Supervisor Successfully
                                                                            Changed.
                                                                        </strong>
                                                                    </div>
                                                                    <select name="select_editCoSupervisor"
                                                                        id="select_editCoSupervisor" class="form-control">
                                                                        @foreach ($users as $user)
                                                                            <option value="{{ $user->id }}">
                                                                                {{ $user->name }}</option>
                                                                        @endforeach
                                                                        <input type="hidden"
                                                                            value="{{ $student[0]->user_id }}"
                                                                            id="editCoSupervisor_student_id">
                                                                    </select>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="button" id="editCoSupervisorSubmit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($student[0]->supervisor_id == null && $student[0]->co_supervisor_id == null)
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Supervisor</h6>
                                            </div>
                                            <div class="col-sm-5 text-secondary">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#assignSupervisor">Assign</button>
                                            </div>
                                            <div class="modal fade" id="assignSupervisor" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Edit Supervisor</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
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
                                                                    id="select_assignSupervisor" class="form-control">
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}">
                                                                            {{ $user->name }}</option>
                                                                    @endforeach
                                                                    <input type="hidden"
                                                                        value="{{ $student[0]->user_id }}"
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
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Co-Supervisor</h6>
                                            </div>
                                            <div class="col-sm-5 text-secondary">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#assignCoSupervisor">Assign</button>
                                            </div>
                                            <div class="modal fade" id="assignCoSupervisor" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Edit Co-Supervisor</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
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
                                                                    id="select_assignCoSupervisor" class="form-control">
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}">
                                                                            {{ $user->name }}</option>
                                                                    @endforeach
                                                                    <input type="hidden"
                                                                        value="{{ $student[0]->user_id }}"
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
                                        </div>
                                    @elseif ($student[0]->supervisor_id != null && $student[0]->co_supervisor_id == null)
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Supervisor</h6>
                                            </div>
                                            <div class="col-sm-5 text-secondary">
                                                {{ App\Models\User::find(App\Models\Supervisor::find($student[0]->supervisor_id)->user_id)->name }}
                                            </div>
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#editSupervisor">Edit</button>
                                                <div class="modal fade" id="editSupervisor" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Edit Supervisor</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    @csrf
                                                                    <label>Please select a new
                                                                        supervisor:</label>
                                                                    <div class="alert alert-danger print-editSupervisor-error-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            <ul></ul>
                                                                        </strong>
                                                                    </div>
                                                                    <div class="alert alert-success print-editSupervisor-success-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            Supervisor Successfully
                                                                            Changed.
                                                                        </strong>
                                                                    </div>
                                                                    <select name="select_editSupervisor"
                                                                        id="select_editSupervisor" class="form-control">
                                                                        @foreach ($users as $user)
                                                                            <option value="{{ $user->id }}">
                                                                                {{ $user->name }}</option>
                                                                        @endforeach
                                                                        <input type="hidden"
                                                                            value="{{ $student[0]->user_id }}"
                                                                            id="editSupervisor_student_id">
                                                                    </select>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="button" id="editSupervisorSubmit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Co-Supervisor</h6>
                                            </div>
                                            <div class="col-sm-5 text-secondary">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#assignCoSupervisor">Assign</button>
                                            </div>
                                            <div class="modal fade" id="assignCoSupervisor" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Edit Co-Supervisor</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
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
                                                                    id="select_assignCoSupervisor" class="form-control">
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}">
                                                                            {{ $user->name }}</option>
                                                                    @endforeach
                                                                    <input type="hidden"
                                                                        value="{{ $student[0]->user_id }}"
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
                                        </div>
                                        @elseif (($student[0]->supervisor_id == null) && ($student[0]->co_supervisor_id != null))
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Supervisor</h6>
                                            </div>
                                            <div class="col-sm-5 text-secondary">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#assignSupervisor">Assign</button>
                                            </div>
                                            <div class="modal fade" id="assignSupervisor" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Edit Supervisor</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
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
                                                                    id="select_assignSupervisor" class="form-control">
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}">
                                                                            {{ $user->name }}</option>
                                                                    @endforeach
                                                                    <input type="hidden"
                                                                        value="{{ $student[0]->user_id }}"
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
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Co-Supervisor</h6>
                                            </div>
                                            <div class="col-sm-5 text-secondary">
                                                {{ App\Models\User::find(App\Models\Supervisor::find($student[0]->co_supervisor_id)->user_id)->name }}
                                            </div>
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#editCoSupervisor">Edit</button>
                                                <div class="modal fade" id="editCoSupervisor" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Edit Co-Supervisor</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    @csrf
                                                                    <label>Please select a new
                                                                        co-supervisor:</label>
                                                                    <div class="alert alert-danger print-editCoSupervisor-error-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            <ul></ul>
                                                                        </strong>
                                                                    </div>
                                                                    <div class="alert alert-success print-editCoSupervisor-success-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            Supervisor Successfully
                                                                            Changed.
                                                                        </strong>
                                                                    </div>
                                                                    <select name="select_editCoSupervisor"
                                                                        id="select_editCoSupervisor" class="form-control">
                                                                        @foreach ($users as $user)
                                                                            <option value="{{ $user->id }}">
                                                                                {{ $user->name }}</option>
                                                                        @endforeach
                                                                        <input type="hidden"
                                                                            value="{{ $student[0]->user_id }}"
                                                                            id="editCoSupervisor_student_id">
                                                                    </select>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="button" id="editCoSupervisorSubmit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            {{-- <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->name }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->email }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Registration Year</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->created_at->format('Y') }}
                                        </div>
                                    </div>
                                    @if ($student[0]->supervisor_id != null && $student[0]->co_supervisor_id != null)
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Supervisor</h6>
                                            </div>
                                            <div class="col-sm-5 text-secondary">
                                                {{ App\Models\User::find(App\Models\Supervisor::find($student[0]->supervisor_id)->user_id)->name }}
                                            </div>
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#editSupervisor">Edit</button>
                                                <div class="modal fade" id="editSupervisor" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Edit Supervisor</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    @csrf
                                                                    <label>Please select a new
                                                                        supervisor:</label>
                                                                    <div class="alert alert-danger print-editSupervisor-error-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            <ul></ul>
                                                                        </strong>
                                                                    </div>
                                                                    <div class="alert alert-success print-editSupervisor-success-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            Supervisor Successfully
                                                                            Changed.
                                                                        </strong>
                                                                    </div>
                                                                    <select name="select_editSupervisor"
                                                                        id="select_editSupervisor" class="form-control">
                                                                        @foreach ($users as $user)
                                                                            <option value="{{ $user->id }}">
                                                                                {{ $user->name }}</option>
                                                                        @endforeach
                                                                        <input type="hidden"
                                                                            value="{{ $student[0]->user_id }}"
                                                                            id="editSupervisor_student_id">
                                                                    </select>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="button" id="editSupervisorSubmit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Co-Supervisor</h6>
                                            </div>
                                            <div class="col-sm-5 text-secondary">
                                                {{ App\Models\User::find(App\Models\Supervisor::find($student[0]->co_supervisor_id)->user_id)->name }}
                                            </div>
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#editCoSupervisor">Edit</button>
                                                <div class="modal fade" id="editCoSupervisor" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Edit Co-Supervisor</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    @csrf
                                                                    <label>Please select a new
                                                                        co-supervisor:</label>
                                                                    <div class="alert alert-danger print-editCoSupervisor-error-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            <ul></ul>
                                                                        </strong>
                                                                    </div>
                                                                    <div class="alert alert-success print-editCoSupervisor-success-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            Supervisor Successfully
                                                                            Changed.
                                                                        </strong>
                                                                    </div>
                                                                    <select name="select_editCoSupervisor"
                                                                        id="select_editCoSupervisor" class="form-control">
                                                                        @foreach ($users as $user)
                                                                            <option value="{{ $user->id }}">
                                                                                {{ $user->name }}</option>
                                                                        @endforeach
                                                                        <input type="hidden"
                                                                            value="{{ $student[0]->user_id }}"
                                                                            id="editCoSupervisor_student_id">
                                                                    </select>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="button" id="editCoSupervisorSubmit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($student[0]->supervisor_id == null && $student[0]->co_supervisor_id == null)
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Supervisor</h6>
                                            </div>
                                            <div class="col-sm-5 text-secondary">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#assignSupervisor">Assign</button>
                                            </div>
                                            <div class="modal fade" id="assignSupervisor" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Edit Supervisor</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
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
                                                                    id="select_assignSupervisor" class="form-control">
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}">
                                                                            {{ $user->name }}</option>
                                                                    @endforeach
                                                                    <input type="hidden"
                                                                        value="{{ $student[0]->user_id }}"
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
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Co-Supervisor</h6>
                                            </div>
                                            <div class="col-sm-5 text-secondary">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#assignCoSupervisor">Assign</button>
                                            </div>
                                            <div class="modal fade" id="assignCoSupervisor" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Edit Co-Supervisor</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
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
                                                                    id="select_assignCoSupervisor" class="form-control">
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}">
                                                                            {{ $user->name }}</option>
                                                                    @endforeach
                                                                    <input type="hidden"
                                                                        value="{{ $student[0]->user_id }}"
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
                                        </div>
                                    @elseif ($student[0]->supervisor_id != null && $student[0]->co_supervisor_id == null)
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Supervisor</h6>
                                            </div>
                                            <div class="col-sm-5 text-secondary">
                                                {{ App\Models\User::find(App\Models\Supervisor::find($student[0]->supervisor_id)->user_id)->name }}
                                            </div>
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#editSupervisor">Edit</button>
                                                <div class="modal fade" id="editSupervisor" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Edit Supervisor</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    @csrf
                                                                    <label>Please select a new
                                                                        supervisor:</label>
                                                                    <div class="alert alert-danger print-editSupervisor-error-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            <ul></ul>
                                                                        </strong>
                                                                    </div>
                                                                    <div class="alert alert-success print-editSupervisor-success-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            Supervisor Successfully
                                                                            Changed.
                                                                        </strong>
                                                                    </div>
                                                                    <select name="select_editSupervisor"
                                                                        id="select_editSupervisor" class="form-control">
                                                                        @foreach ($users as $user)
                                                                            <option value="{{ $user->id }}">
                                                                                {{ $user->name }}</option>
                                                                        @endforeach
                                                                        <input type="hidden"
                                                                            value="{{ $student[0]->user_id }}"
                                                                            id="editSupervisor_student_id">
                                                                    </select>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="button" id="editSupervisorSubmit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Co-Supervisor</h6>
                                            </div>
                                            <div class="col-sm-5 text-secondary">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#assignCoSupervisor">Assign</button>
                                            </div>
                                            <div class="modal fade" id="assignCoSupervisor" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Edit Co-Supervisor</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
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
                                                                    id="select_assignCoSupervisor" class="form-control">
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}">
                                                                            {{ $user->name }}</option>
                                                                    @endforeach
                                                                    <input type="hidden"
                                                                        value="{{ $student[0]->user_id }}"
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
                                        </div>
                                        @elseif (($student[0]->supervisor_id == null) && ($student[0]->co_supervisor_id != null))
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Supervisor</h6>
                                            </div>
                                            <div class="col-sm-5 text-secondary">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#assignSupervisor">Assign</button>
                                            </div>
                                            <div class="modal fade" id="assignSupervisor" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Edit Supervisor</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
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
                                                                    id="select_assignSupervisor" class="form-control">
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}">
                                                                            {{ $user->name }}</option>
                                                                    @endforeach
                                                                    <input type="hidden"
                                                                        value="{{ $student[0]->user_id }}"
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
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Co-Supervisor</h6>
                                            </div>
                                            <div class="col-sm-5 text-secondary">
                                                {{ App\Models\User::find(App\Models\Supervisor::find($student[0]->co_supervisor_id)->user_id)->name }}
                                            </div>
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#editCoSupervisor">Edit</button>
                                                <div class="modal fade" id="editCoSupervisor" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Edit Co-Supervisor</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    @csrf
                                                                    <label>Please select a new
                                                                        co-supervisor:</label>
                                                                    <div class="alert alert-danger print-editCoSupervisor-error-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            <ul></ul>
                                                                        </strong>
                                                                    </div>
                                                                    <div class="alert alert-success print-editCoSupervisor-success-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            Supervisor Successfully
                                                                            Changed.
                                                                        </strong>
                                                                    </div>
                                                                    <select name="select_editCoSupervisor"
                                                                        id="select_editCoSupervisor" class="form-control">
                                                                        @foreach ($users as $user)
                                                                            <option value="{{ $user->id }}">
                                                                                {{ $user->name }}</option>
                                                                        @endforeach
                                                                        <input type="hidden"
                                                                            value="{{ $student[0]->user_id }}"
                                                                            id="editCoSupervisor_student_id">
                                                                    </select>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="button" id="editCoSupervisorSubmit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div> --}}
                            <br>
                            <hr>
                            <br>
                            <div class="row gutters-sm">
                                @switch($student[0]->progress)
                                    @case("Proposal")
                                        <div class="col-sm-4 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h6 class="d-flex align-items-center mb-3"><i
                                                            class="material-icons text-info mr-2">Proposal</i>Status</h6>
                                                    <small>In Progress</small>
                                                    <div class="progress mb-3" style="height: 5px">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h6 class="d-flex align-items-center mb-3"><i
                                                            class="material-icons text-info mr-2">Thesis</i>Status</h6>
                                                    <small>Blocked</small>
                                                    <div class="progress mb-3" style="height: 5px">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h6 class="d-flex align-items-center mb-3"><i
                                                            class="material-icons text-info mr-2">Examimation</i>Status</h6>
                                                    <small>Blocked</small>
                                                    <div class="progress mb-3" style="height: 5px">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @break
                                    @case("Thesis")
                                        <div class="col-sm-4 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h6 class="d-flex align-items-center mb-3"><i
                                                            class="material-icons text-info mr-2">Proposal</i>Status</h6>
                                                    <small>Completed</small>
                                                    <div class="progress mb-3" style="height: 5px">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h6 class="d-flex align-items-center mb-3"><i
                                                            class="material-icons text-info mr-2">Thesis</i>Status</h6>
                                                    <small>In Progress</small>
                                                    <div class="progress mb-3" style="height: 5px">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h6 class="d-flex align-items-center mb-3"><i
                                                            class="material-icons text-info mr-2">Examimation</i>Status</h6>
                                                    <small>Blocked</small>
                                                    <div class="progress mb-3" style="height: 5px">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @break
                                    @default
                                        <div class="col-sm-4 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h6 class="d-flex align-items-center mb-3"><i
                                                            class="material-icons text-info mr-2">Proposal</i>Status</h6>
                                                    <small>Completed</small>
                                                    <div class="progress mb-3" style="height: 5px">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h6 class="d-flex align-items-center mb-3"><i
                                                            class="material-icons text-info mr-2">Thesis</i>Status</h6>
                                                    <small>Completed</small>
                                                    <div class="progress mb-3" style="height: 5px">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h6 class="d-flex align-items-center mb-3"><i
                                                            class="material-icons text-info mr-2">Examimation</i>Status</h6>
                                                    <small>In Progress</small>
                                                    <div class="progress mb-3" style="height: 5px">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"
                                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endswitch
                            </div>
                        </div>
                    </div>
                </div>
    
                {{-- <div class="card shadow p-3 mb-5 bg-white rounded">
                    <h5 class="card-header">Examiner's Report</h5>
                    <hr>
                    <p style="text-align: center;">This Will Only Be Displayed When Student's Final Thesis Has Been Approved
                    </p>

                    <div class="text-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#examreport">
                            Submit
                        </button>
                    </div>


                    <!--Modal To Submit Final Proposal Documents-->
                    <div class="modal fade text-center" id="examreport" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Submit Examiner's Report</h5>
                                    <button type="button" class="close" style="color: white;" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1" style="color: black;">Examiner's
                                                Report</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>  --}}
            </div>

        </div>
    </div>
    </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
@endsection
