@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper" style="background-color: #1b2d5d; color: white;">
            <div class="sidebar-heading">Supervisor Portal</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('supervisor-home') }}" class="list-group-item list-group-item-action text-white"><i
                        class="fa fa-home" id="icons" aria-hidden="true"></i>Home</a>
                <a href="{{ route('supervisor-proposal') }}"
                    class="list-group-item list-group-item-action text-white active"><i class="fa fa-sticky-note" id="icons"
                        aria-hidden="true"></i>Proposal</a>
                <a href="{{ route('supervisor-thesis') }}" class="list-group-item list-group-item-action text-white"><i
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
                        <div class="col-md-4">
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
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Co-Supervisor</h6>
                                        </div>
                                        @if ($student[0]->co_supervisor_id != null)
                                            <div class="col-sm-9 text-secondary">
                                                {{ App\Models\User::find(App\Models\Supervisor::find($student[0]->co_supervisor_id)->user_id)->name }}
                                            </div>
                                        @else
                                            <div class="col-sm-9 text-secondary">
                                                No Co-Supervisor Assigned
                                            </div>
                                        @endif
                                    </div>
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
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Co-Supervisor</h6>
                                        </div>
                                        @if ($student[0]->co_supervisor_id != null)
                                            <div class="col-sm-9 text-secondary">
                                                {{ App\Models\User::find(App\Models\Supervisor::find($student[0]->co_supervisor_id)->user_id)->name }}
                                            </div>
                                        @else
                                            <div class="col-sm-9 text-secondary">
                                                No Co-Supervisor Assigned
                                            </div>
                                        @endif
                                    </div>
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
                <!-- Display This If Student Has Submitted Proposal Document -->
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
                </div> --}}
            </div>

            {{-- <div class="container-fluid">
                <div class="row" style="padding-top: 3%;">
                    <div class="col-sm-12">
                        <!--Monthly Progress Reports-->
                        <div class="card text-center shadow p-3 mb-5 bg-white rounded">
                            <h4 class="card-header">{{ $user->name }}</h4>
                            <div class="card-body">
                                <hr>
                                <h5 class="card-header">Monthly Progress Reports</h5>
                                <br>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="card-rectangle" style="width: 15rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">Outstanding</h5>
                                                <a href="#" class="card-link" data-toggle="modal"
                                                    data-target="#outstanding">
                                                    <p class="card-text" style="font-size: 50px;">5</p>
                                                </a>
                                                <!-- Outstanding Reports Modal -->
                                                <div class="modal fade" id="outstanding" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Outstanding
                                                                    Reports</h5>
                                                                <button type="button" class="close" style="color: white;"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul>
                                                                    <li>April Progress Report</li>
                                                                    <li>May Progress Report</li>
                                                                    <li>June Progress Report</li>
                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card-rectangle" style="width: 15rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">Late</h5>
                                                <a href="#" class="card-link" data-toggle="modal" data-target="#late">
                                                    <p class="card-text" style="font-size: 50px;">5</p>
                                                </a>
                                                <!-- Late Reports Modal -->
                                                <div class="modal fade" id="late" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Late
                                                                    Submissions</h5>
                                                                <button type="button" class="close" style="color: white;"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul>
                                                                    <li>April Progress Report</li>
                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <div class="card-rectangle" style="width: 15rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">On Time</h5>
                                                <a href="#" class="card-link" data-toggle="modal" data-target="#ontime">
                                                    <p class="card-text" style="font-size: 50px;">5</p>
                                                </a>
                                                <!-- On Time Reports Modal -->
                                                <div class="modal fade" id="ontime" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Reports
                                                                    Submitted On Time</h5>
                                                                <button type="button" class="close" style="color: white;"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul>
                                                                    <li>April Progress Report</li>
                                                                    <li>May Progress Report</li>
                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                            </div>
                        </div>
                        @if (!$proposalSummary->isEmpty())
                            @if ($proposalStatus[0]->status == 'Submitted')
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                    <div class="text-center">
                                        Attempts: {{ $proposalStatus[0]->attempts }}
                                    </div>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>
                                            This Student Has Submitted Their Proposal Documents. Please Evaluate The
                                            Documents And Provide Feedback.
                                        </strong>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-10">
                                            Proposal Summary <br>
                                            Turnitin Plagiarism Report <br>
                                            Final Proposal
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="/download/{{ $proposalSummary[0]->file_name }}"><i
                                                    class="fa fa-download download-icon"></i></a><br>
                                            <a href="/download/{{ $plagiarismReportFileName->file_name }}"><i
                                                    class="fa fa-download download-icon"></i></a><br>
                                            <a href="/download/{{ $finalProposalFileName->file_name }}"><i
                                                    class="fa fa-download download-icon"></i></a>
                                        </div>
                                    </div>

                                    <!-- Button trigger modal -->
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#approve">
                                            Approve
                                        </button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#reject">
                                            Reject
                                        </button>
                                    </div>
                                    <!--Modal To Submit Final Proposal Documents-->
                                    <div class="modal fade text-center" id="approve" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Comments</h5>
                                                    <button type="button" class="close" style="color: white;"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="alert alert-danger print-proposalDocsApproval-error-msg"
                                                        role="alert" style="display:none">
                                                        <strong>
                                                            <ul></ul>
                                                        </strong>
                                                    </div>
                                                    <div class="alert alert-success print-proposalDocsApproval-success-msg"
                                                        role="alert" style="display:none">
                                                        <strong>
                                                            Comments Successfully Saved.
                                                        </strong>
                                                    </div>
                                                    <form id="proposalDocsApprovalComments">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">Please Provide Approval
                                                                Comments</label>
                                                            <textarea class="form-control" id="approvalComments"
                                                                name="approvalComments" rows="3"></textarea>
                                                            <input type="hidden" id="approvalStudentId"
                                                                name="approvalStudentId" value="{{ $user->id }}">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        id="proposalDocsApprovalClose" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary"
                                                        id="proposalDocsApproval">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade text-center" id="reject" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Comments</h5>
                                                    <button type="button" class="close" style="color: white;"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="alert alert-danger print-proposalDocsRejection-error-msg"
                                                        role="alert" style="display:none">
                                                        <strong>
                                                            <ul></ul>
                                                        </strong>
                                                    </div>
                                                    <div class="alert alert-success print-proposalDocsRejection-success-msg"
                                                        role="alert" style="display:none">
                                                        <strong>
                                                            Comments Saved Successfully.
                                                        </strong>
                                                    </div>
                                                    <form>
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">Please Provide
                                                                Rejection
                                                                Comments</label>
                                                            <textarea class="form-control" name="rejectionComments"
                                                                id="rejectionComments" rows="3"></textarea>
                                                            <input type="hidden" id="rejectionStudentId"
                                                                name="rejectionStudentId" value="{{ $user->id }}">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        id="proposalDocsRejectionClose" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary"
                                                        id="proposalDocsRejection">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @elseif($proposalStatus[0]->status == 'Resubmit')
                                <!-- Show Div That Tells Supervisor To Wait For Resubmission -->
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                    <div class="text-center">
                                        Attempts: {{ $proposalStatus[0]->attempts }}
                                    </div>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>
                                            You have rejected this student's proposal documents. Please wait for them to
                                            resubmit their documents.
                                        </strong>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-10">
                                            Proposal Summary <br>
                                            Turnitin Plagiarism Report <br>
                                            Final Proposal
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="/download/{{ $proposalSummary[0]->file_name }}"><i
                                                    class="fa fa-download download-icon"></i></a><br>
                                            <a href="/download/{{ $plagiarismReportFileName->file_name }}"><i
                                                    class="fa fa-download download-icon"></i></a><br>
                                            <a href="/download/{{ $finalProposalFileName->file_name }}"><i
                                                    class="fa fa-download download-icon"></i></a>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @elseif ($proposalStatus[0]->status == 'Checklist Submitted: REJECTED')
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                    <div class="text-center">
                                        Attempts: {{ $proposalStatus[0]->attempts }}
                                    </div>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>
                                            This Student's Proposal Documents Have Been Rejected By Evaluators. The Student
                                            Will Be Required To Resubmit Their Documents. <br>
                                            Evaluator's Checklist: <a
                                                href="/download/{{ $checklist->file_name }}">View</a>
                                        </strong>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-10">
                                            Proposal Summary <br>
                                            Turnitin Plagiarism Report <br>
                                            Final Proposal
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="/download/{{ $proposalSummary[0]->file_name }}"><i
                                                    class="fa fa-download download-icon"></i></a><br>
                                            <a href="/download/{{ $plagiarismReportFileName->file_name }}"><i
                                                    class="fa fa-download download-icon"></i></a><br>
                                            <a href="/download/{{ $finalProposalFileName->file_name }}"><i
                                                    class="fa fa-download download-icon"></i></a>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @elseif ($proposalStatus[0]->status == 'Checklist Submitted: APPROVED')
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                    <div class="text-center">
                                        Attempts: {{ $proposalStatus[0]->attempts }}
                                    </div>
                                    <div class="alert alert-success" role="alert">
                                        <strong>
                                            This Student's Proposal Documents Have Been Approved By Evaluators. The Student
                                            Will Now Proceed To The Thesis Stage. <br>
                                            Evaluator's Checklist: <a
                                                href="/download/{{ $checklist->file_name }}">View</a>
                                        </strong>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-10">
                                            Proposal Summary <br>
                                            Turnitin Plagiarism Report <br>
                                            Final Proposal
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="/download/{{ $proposalSummary[0]->file_name }}"><i
                                                    class="fa fa-download download-icon"></i></a><br>
                                            <a href="/download/{{ $plagiarismReportFileName->file_name }}"><i
                                                    class="fa fa-download download-icon"></i></a><br>
                                            <a href="/download/{{ $finalProposalFileName->file_name }}"><i
                                                    class="fa fa-download download-icon"></i></a>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @else
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                    <div class="text-center">
                                        Attempts: {{ $proposalStatus[0]->attempts }}
                                    </div>
                                    <br>
                                    <div class="alert alert-success" role="alert">
                                        <strong>
                                            You have approved this student's proposal documents. The student will now
                                            undergo evaluation.
                                        </strong>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-10">
                                            Proposal Summary <br>
                                            Turnitin Plagiarism Report <br>
                                            Final Proposal
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="/download/{{ $proposalSummary[0]->file_name }}"><i
                                                    class="fa fa-download download-icon"></i></a><br>
                                            <a href="/download/{{ $plagiarismReportFileName->file_name }}"><i
                                                    class="fa fa-download download-icon"></i></a><br>
                                            <a href="/download/{{ $finalProposalFileName->file_name }}"><i
                                                    class="fa fa-download download-icon"></i></a>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @endif
                        @else
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Proposal</h5>
                                <hr>
                                <p style="text-align: center;">The Student Has Not Submitted Their Proposal Documents Yet.
                                </p>
                                <hr>
                            </div>
                        @endif
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    </div>
    </div>
    </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
@endsection
