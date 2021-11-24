@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper" style="background-color: #1b2d5d; color: white;">
            <div class="sidebar-heading">HOD Portal</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('hod-home') }}" class="list-group-item list-group-item-action text-white active"><i
                        class="fa fa-home" id="icons" aria-hidden="true"></i>Home</a>
                <a href="{{ route('hod-proposal') }}" class="list-group-item list-group-item-action text-white"><i
                        class="fa fa-sticky-note" id="icons" aria-hidden="true"></i>Proposal</a>
                <a href="{{ route('hod-thesis') }}" class="list-group-item list-group-item-action text-white"><i
                        class="fa fa-pencil-alt" id="icons" aria-hidden="true"></i>Thesis</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <!-- If Student Hasn't Submitted Proposal Yet -->
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button class="btn btn-light" id="menu-toggle"><span class="dark-blue-text"><i class="fa fa-bars"
                                aria-hidden="true"></i></span></button>
                </nav>
                <div class="row" style="padding-top: 3%;">
                    <div class="col-sm-12 table-responsive">
                        <!--Monthly Progress Reports-->
                        <div class="card text-center shadow p-3 mb-5 bg-white rounded">
                            <h5 class="card-header">Assign Evaluators</h5>
                            <div class="card-body">
                                <hr>
                                <table class="table table-hover">
                                    <thead class="thead-blue">
                                        <tr>
                                            <th scope="col" style="color: white;">Student</th>
                                            <th scope="col" style="color: white;">Assign</th>
                                        </tr>
                                    </thead>
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" colspan="4">Masters Students</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($mastersStudentsNeedingEvaluators as $student)
                                            <tr>
                                                <td> {{ App\Models\User::find($student->student_id)->name }} </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#assignEval">Assign</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="assignEval" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Assign
                                                                        Evaluators</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="alert alert-danger print-assignMastersEvaluator-error-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            <ul></ul>
                                                                        </strong>
                                                                    </div>
                                                                    <div class="alert alert-success print-assignMastersEvaluator-success-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            Supervisors Successfully
                                                                            Assigned.
                                                                        </strong>
                                                                    </div>
                                                                    <form>
                                                                        @csrf
                                                                        <label>Please select an evaluator:</label>
                                                                        <select class="form-select"
                                                                            aria-label="Default select example"
                                                                            id="assignMastersEvaluatorSelect"
                                                                            name="assignMastersEvaluatorSelect">
                                                                            @foreach ($evaluators as $evaluator)
                                                                                <option value="{{ $evaluator->id }}">
                                                                                    {{ $evaluator->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        <input type="hidden"
                                                                            value="{{ $student->student_id }}"
                                                                            name="mastersEvaluatorStudentId">
                                                                        <hr>
                                                                        <label>Please select a co-evaluator:</label>
                                                                        <select class="form-select"
                                                                            aria-label="Default select example"
                                                                            id="assignMastersCoEvaluatorSelect"
                                                                            name="assignMastersCoEvaluatorSelect">
                                                                            <option value="None">
                                                                                {{ $noCoEvaluator[0] }}
                                                                            </option>
                                                                            @foreach ($evaluators as $evaluator)
                                                                                <option value="{{ $evaluator->id }}">
                                                                                    {{ $evaluator->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        id="assignMastersEvaluatorClose"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary"
                                                                        id="assignMastersEvaluator">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <td colspan="2" style="text-align: center; font-weight: bold">No Masters
                                                Students Require Evaluation</td>
                                        @endforelse
                                    </tbody>
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" colspan="4">PhD Students</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($phdStudentsNeedingEvaluators as $student)
                                            <tr>
                                                <td> {{ App\Models\User::find($student->student_id)->name }} </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#assignEval">Assign</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="assignEval" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Assign
                                                                        Evaluators</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="alert alert-danger print-assignPhdEvaluator-error-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            <ul></ul>
                                                                        </strong>
                                                                    </div>
                                                                    <div class="alert alert-success print-assignPhdEvaluator-success-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            Supervisors Successfully
                                                                            Assigned.
                                                                        </strong>
                                                                    </div>
                                                                    <form>
                                                                        @csrf
                                                                        <label>Please select an evaluator:</label>
                                                                        <select class="form-select"
                                                                            aria-label="Default select example"
                                                                            id="assignPhdEvaluatorSelect"
                                                                            name="assignPhdEvaluatorSelect">
                                                                            @foreach ($evaluators as $evaluator)
                                                                                <option value="{{ $evaluator->id }}">
                                                                                    {{ $evaluator->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        <input type="hidden" name="phdEvaluatorStudentId"
                                                                            value="{{ $student->student_id }}">
                                                                        <hr>
                                                                        <label>Please select a co-evaluator:</label>
                                                                        <select class="form-select"
                                                                            aria-label="Default select example"
                                                                            id="assignPhdCoEvaluatorSelect"
                                                                            name="assignPhdCoEvaluatorSelect">
                                                                            <option value="None">
                                                                                {{ $noCoEvaluator[0] }}
                                                                            </option>
                                                                            @foreach ($evaluators as $evaluator)
                                                                                <option value="{{ $evaluator->id }}">
                                                                                    {{ $evaluator->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal"
                                                                        id="assignPhdEvaluatorClose">Close</button>
                                                                    <button type="button" class="btn btn-primary"
                                                                        id="assignPhdEvaluator">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <td colspan="3" style="text-align: center; font-weight: bold">No PhD Students
                                                Require Evaluation</td>
                                        @endforelse
                                    </tbody>
                                </table>
                                <hr>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 3%;">
                    <div class="col-sm-12 table-responsive">
                        <!--Monthly Progress Reports-->
                        <div class="card text-center shadow p-3 mb-5 bg-white rounded">
                            <h5 class="card-header">Edit Evaluators</h5>
                            <div class="card-body">
                                <hr>
                                <table class="table table-hover">
                                    <thead class="thead-blue">
                                        <tr>
                                            <th scope="col" style="color: white;">Student</th>
                                            <th scope="col" style="color: white;">Evaluator</th>
                                            <th scope="col" , style="color: white">Co-Evaluator</th>
                                            <th scope="col" style="color: white">Edit</th>
                                        </tr>
                                    </thead>
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" colspan="4">Masters Students</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($mastersStudentsWithEvaluators as $student)
                                            <tr>
                                                <td> <a href="{{ route('hod.studentProfile', $student->user_id) }}" style="color: black;">{{ App\Models\User::find($student->user_id)->name }} </td>
                                                <td> {{ App\Models\User::find($student->evaluator_id)->name }} </td>
                                                <td>
                                                    @if ($student->co_evaluator_id != null)
                                                        {{ App\Models\User::find($student->co_evaluator_id)->name }}
                                                    @else
                                                        No Co-Evaluator Assigned
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#assignEval">Re-Assign</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="assignEval" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Assign
                                                                        Evaluators</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="alert alert-danger print-assignMastersEvaluator-error-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            <ul></ul>
                                                                        </strong>
                                                                    </div>
                                                                    <div class="alert alert-success print-assignMastersEvaluator-success-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            Evaluators Successfully
                                                                            Assigned.
                                                                        </strong>
                                                                    </div>
                                                                    <form>
                                                                        @csrf
                                                                        <label>Please select an evaluator:</label>
                                                                        <select class="form-select"
                                                                            aria-label="Default select example"
                                                                            id="assignMastersEvaluatorSelect"
                                                                            name="assignMastersEvaluatorSelect">
                                                                            @foreach ($evaluators as $evaluator)
                                                                                <option value="{{ $evaluator->id }}">
                                                                                    {{ $evaluator->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        <input type="hidden"
                                                                            value="{{ $student->user_id }}"
                                                                            name="mastersEvaluatorStudentId">
                                                                        <hr>
                                                                        <label>Please select a co-evaluator:</label>
                                                                        <select class="form-select"
                                                                            aria-label="Default select example"
                                                                            id="assignMastersCoEvaluatorSelect"
                                                                            name="assignMastersCoEvaluatorSelect">
                                                                            <option value="None">
                                                                                {{ $noCoEvaluator[0] }}
                                                                            </option>
                                                                            @foreach ($evaluators as $evaluator)
                                                                                <option value="{{ $evaluator->id }}">
                                                                                    {{ $evaluator->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        id="assignMastersEvaluatorClose"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary"
                                                                        id="assignMastersEvaluator">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <td colspan="4" style="text-align: center; font-weight: bold">No Masters
                                                Students Require Evaluation</td>
                                        @endforelse
                                    </tbody>
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" colspan="4">PhD Students</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($phdStudentsWithEvaluators as $student)
                                            <tr>
                                                <td> <a href="{{ route('hod.studentProfile', $student->user_id) }}" style="color: black;">{{ App\Models\User::find($student->user_id)->name }} </td>
                                                <td> {{ App\Models\User::find($student->evaluator_id)->name }} </td>
                                                <td>
                                                    @if ($student->co_evaluator_id != null)
                                                        {{ App\Models\User::find($student->co_evaluator_id)->name }}
                                                    @else
                                                        No Co-Evaluator Assigned
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#assignEval">Re-Assign</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="assignEval" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Assign
                                                                        Evaluators</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="alert alert-danger print-assignPhdEvaluator-error-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            <ul></ul>
                                                                        </strong>
                                                                    </div>
                                                                    <div class="alert alert-success print-assignPhdEvaluator-success-msg"
                                                                        role="alert" style="display:none">
                                                                        <strong>
                                                                            Supervisors Successfully
                                                                            Assigned.
                                                                        </strong>
                                                                    </div>
                                                                    <form>
                                                                        @csrf
                                                                        <label>Please select an evaluator:</label>
                                                                        <select class="form-select"
                                                                            aria-label="Default select example"
                                                                            id="assignPhdEvaluatorSelect"
                                                                            name="assignPhdEvaluatorSelect">
                                                                            @foreach ($evaluators as $evaluator)
                                                                                <option value="{{ $evaluator->id }}">
                                                                                    {{ $evaluator->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        <input type="hidden" name="phdEvaluatorStudentId"
                                                                            value="{{ $student->user_id }}">
                                                                        <hr>
                                                                        <label>Please select a co-evaluator:</label>
                                                                        <select class="form-select"
                                                                            aria-label="Default select example"
                                                                            id="assignPhdCoEvaluatorSelect"
                                                                            name="assignPhdCoEvaluatorSelect">
                                                                            <option value="None">
                                                                                {{ $noCoEvaluator[0] }}
                                                                            </option>
                                                                            @foreach ($evaluators as $evaluator)
                                                                                <option value="{{ $evaluator->id }}">
                                                                                    {{ $evaluator->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal"
                                                                        id="assignPhdEvaluatorClose">Close</button>
                                                                    <button type="button" class="btn btn-primary"
                                                                        id="assignPhdEvaluator">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <td colspan="4" style="text-align: center; font-weight: bold">No PhD Students
                                                Have Been Assigned Evaluators</td>
                                        @endforelse
                                    </tbody>
                                </table>
                                <hr>
                                <hr>
                            </div>
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
