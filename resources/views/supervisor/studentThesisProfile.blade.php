@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper" style="background-color: #1b2d5d; color: white;">
            <div class="sidebar-heading">Supervisor Portal</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('supervisor-home') }}" class="list-group-item list-group-item-action text-white"><i
                        class="fa fa-home" id="icons" aria-hidden="true"></i>Home</a>
                <a href="{{ route('supervisor-proposal') }}" class="list-group-item list-group-item-action text-white"><i
                        class="fa fa-sticky-note" id="icons" aria-hidden="true"></i>Proposal</a>
                <a href="{{ route('supervisor-thesis') }}"
                    class="list-group-item list-group-item-action text-white active"><i class="fa fa-pencil-alt" id="icons"
                        aria-hidden="true"></i>Thesis</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-light" id="menu-toggle"><span class="dark-blue-text"><i class="fa fa-bars"
                            aria-hidden="true"></i></span></button>
            </nav>
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
                                            <a href="#" class="card-link" data-toggle="modal" data-target="#outstanding">
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
                                                            <h5 class="modal-title" id="exampleModalLabel">Late Submissions
                                                            </h5>
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
                                                            <h5 class="modal-title" id="exampleModalLabel">Reports Submitted
                                                                On Time</h5>
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
                    <!-- Check If Student Has Submitted Thesis Documents -->
                    @if (!$intentionToSubmit->isEmpty())
                        @if ($thesisStatus[0]->status == 'Submitted')
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Thesis</h5>
                                <hr>
                                <div class="text-center">
                                    Attempts: {{ $thesisStatus[0]->attempts }}
                                </div>
                                <div class="alert alert-warning" role="alert">
                                    <strong>
                                        This Student Has Submitted Their Thesis Documents. Please Evaluate The
                                        Documents And Provide Feedback.
                                    </strong>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        Intention To Submit <br>
                                        Thesis Abstract <br>
                                        Final Thesis
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="/download/{{ $intentionToSubmit[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $thesisAbstract[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $finalThesis[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a>
                                    </div>
                                </div>

                                <!-- Button trigger modal -->
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#approve">
                                        Approve
                                    </button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reject">
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
                                                <div class="alert alert-danger print-thesisDocsApproval-error-msg"
                                                    role="alert" style="display:none">
                                                    <strong>
                                                        <ul></ul>
                                                    </strong>
                                                </div>
                                                <div class="alert alert-success print-thesisDocsApproval-success-msg"
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
                                                        <input type="hidden" id="approvalStudentId" name="approvalStudentId"
                                                            value="{{ $user->id }}">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" id="thesisDocsApprovalClose"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary"
                                                    id="thesisDocsApproval">Submit</button>
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
                                                <div class="alert alert-danger print-thesisDocsRejection-error-msg"
                                                    role="alert" style="display:none">
                                                    <strong>
                                                        <ul></ul>
                                                    </strong>
                                                </div>
                                                <div class="alert alert-success print-thesisDocsRejection-success-msg"
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
                                                    id="thesisDocsRejectionClose" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary"
                                                    id="thesisDocsRejection">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        @elseif ($thesisStatus[0]->status == 'Thesis Correction Submitted' || $thesisStatus[0]->status == "Thesis Correction Resubmitted")
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Thesis</h5>
                                <hr>
                                <div class="text-center">
                                    Attempts: {{ $thesisStatus[0]->attempts }}
                                </div>
                                <div class="alert alert-warning" role="alert">
                                    <strong>
                                        The Student Has Submitted Their Thesis Documents. Please Evaluate The
                                        Documents And Provide Feedback.
                                    </strong>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        Intention To Submit <br>
                                        Thesis Abstract <br>
                                        Final Thesis <br>
                                        <hr>
                                        Corrections Report
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="/download/{{ $intentionToSubmit[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $thesisAbstract[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $finalThesis[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br><br>
                                        <a href="/download/{{ $correctionsReport[0]->file_name }}"><i
                                            class="fa fa-download download-icon"></i></a>        
                                    </div>
                                </div>

                                <!-- Button trigger modal -->
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#approve">
                                        Approve
                                    </button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reject">
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
                                                <div class="alert alert-danger print-thesisDocsApproval-error-msg"
                                                    role="alert" style="display:none">
                                                    <strong>
                                                        <ul></ul>
                                                    </strong>
                                                </div>
                                                <div class="alert alert-success print-thesisDocsApproval-success-msg"
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
                                                        <input type="hidden" id="approvalStudentId" name="approvalStudentId"
                                                            value="{{ $user->id }}">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" id="thesisCorrectionApprovalClose"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary"
                                                    id="thesisCorrectionApproval">Submit</button>
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
                                                <div class="alert alert-danger print-thesisDocsRejection-error-msg"
                                                    role="alert" style="display:none">
                                                    <strong>
                                                        <ul></ul>
                                                    </strong>
                                                </div>
                                                <div class="alert alert-success print-thesisDocsRejection-success-msg"
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
                                                    id="thesisCorrectionRejectionClose" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary"
                                                    id="thesisCorrectionRejection">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        @elseif ($thesisStatus[0]->status == "Supervisor Rejected: Resubmit")
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Thesis</h5>
                                <hr>
                                <div class="text-center">
                                    Attempts: {{ $thesisStatus[0]->attempts }}
                                </div>
                                <br>
                                <div class="alert alert-danger" role="alert">
                                    <strong>
                                        You Have Rejected The Student's Thesis Documents. Please Wait For The Student To
                                        Resubmit Their Documents.
                                    </strong>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        Intention To Submit <br>
                                        Thesis Abstract <br>
                                        Final Thesis
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="/download/{{ $intentionToSubmit[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $thesisAbstract[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $finalThesis[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a>
                                    </div>
                                </div>
                                <hr>
                            </div>

                        @elseif ($thesisStatus[0]->status == "Supervisor Rejected: Thesis Correction Submission")
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Thesis</h5>
                                <hr>
                                <div class="text-center">
                                    Attempts: {{ $thesisStatus[0]->attempts }}
                                </div>
                                <br>
                                <div class="alert alert-danger" role="alert">
                                    <strong>
                                        You Have Rejected The Student's Thesis Documents. Please Wait For The Student To
                                        Resubmit Their Documents.
                                    </strong>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        Intention To Submit <br>
                                        Thesis Abstract <br>
                                        Final Thesis <br>
                                        <hr>
                                        Corrections Report
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="/download/{{ $intentionToSubmit[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $thesisAbstract[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $finalThesis[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br><br>
                                        <a href="/download/{{ $correctionsReport[0]->file_name }}"><i
                                            class="fa fa-download download-icon"></i></a>   
                                    </div>
                                </div>
                                <hr>
                            </div>
                        
                        @elseif ($thesisStatus[0]->status == "Supervisor Approved")
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Thesis</h5>
                                <hr>
                                <div class="text-center">
                                    Attempts: {{ $thesisStatus[0]->attempts }}
                                </div>
                                <br>
                                <div class="alert alert-success" role="alert">
                                    <strong>
                                        You Have Approved The Student's Thesis Documents. The Student Is Now Awaiting Approval From The HOD.
                                    </strong>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        Intention To Submit <br>
                                        Thesis Abstract <br>
                                        Final Thesis
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="/download/{{ $intentionToSubmit[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $thesisAbstract[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $finalThesis[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a>
                                    </div>
                                </div>
                                <hr>
                            </div>

                        @elseif ($thesisStatus[0]->status == "Supervisor Approved: Thesis Correction Submission")
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Thesis</h5>
                                <hr>
                                <div class="text-center">
                                    Attempts: {{ $thesisStatus[0]->attempts }}
                                </div>
                                <br>
                                <div class="alert alert-success" role="alert">
                                    <strong>
                                        You Have Approved The Student's Thesis Documents. The Student Is Now Awaiting Approval From The HOD.
                                    </strong>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        Intention To Submit <br>
                                        Thesis Abstract <br>
                                        Final Thesis <br>
                                        <hr>
                                        Corrections Report
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="/download/{{ $intentionToSubmit[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $thesisAbstract[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $finalThesis[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br><br>
                                        <a href="/download/{{ $correctionsReport[0]->file_name }}"><i
                                            class="fa fa-download download-icon"></i></a>
                                    </div>
                                </div>
                                <hr>
                            </div>

                        @elseif ($thesisStatus[0]->status == "HOD Rejected: Resubmit")
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Thesis</h5>
                                <hr>
                                <div class="text-center">
                                    Attempts: {{ $thesisStatus[0]->attempts }}
                                </div>
                                <br>
                                <div class="alert alert-danger" role="alert">
                                    <strong>
                                        The Student's Thesis Documents Have Been Rejected By The HOD. The Student Will Be Required To Resubmit Their Documents.
                                    </strong>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        Intention To Submit <br>
                                        Thesis Abstract <br>
                                        Final Thesis
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="/download/{{ $intentionToSubmit[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $thesisAbstract[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $finalThesis[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        
                        @elseif ($thesisStatus[0]->status == "HOD Rejected: Thesis Correction Submission")
                        <div class="card shadow p-3 mb-5 bg-white rounded">
                            <h5 class="card-header">Final Thesis</h5>
                            <hr>
                            <div class="text-center">
                                Attempts: {{ $thesisStatus[0]->attempts }}
                            </div>
                            <br>
                            <div class="alert alert-danger" role="alert">
                                <strong>
                                    The Student's Thesis Documents Have Been Rejected By The HOD. The Student Will Be Required To Resubmit Their Documents.
                                </strong>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    Intention To Submit <br>
                                    Thesis Abstract <br>
                                    Final Thesis <br>
                                    <hr>
                                    Corrections Report
                                </div>
                                <div class="col-sm-2">
                                    <a href="/download/{{ $intentionToSubmit[0]->file_name }}"><i
                                            class="fa fa-download download-icon"></i></a><br>
                                    <a href="/download/{{ $thesisAbstract[0]->file_name }}"><i
                                            class="fa fa-download download-icon"></i></a><br>
                                    <a href="/download/{{ $finalThesis[0]->file_name }}"><i
                                            class="fa fa-download download-icon"></i></a><br><br>
                                    <a href="/download/{{ $correctionsReport[0]->file_name }}"><i
                                        class="fa fa-download download-icon"></i></a>
                                </div>
                            </div>
                            <hr>
                        </div>

                        @elseif ($thesisStatus[0]->status == "HOD Approved")
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Thesis</h5>
                                <hr>
                                <div class="text-center">
                                    Attempts: {{ $thesisStatus[0]->attempts }}
                                </div>
                                <br>
                                <div class="alert alert-success" role="alert">
                                    <strong>
                                        The Student's Thesis Documents Have Been Approved By The HOD. The Student Is Now In The Examination Stage.
                                    </strong>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        Intention To Submit <br>
                                        Thesis Abstract <br>
                                        Final Thesis <br>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="/download/{{ $intentionToSubmit[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $thesisAbstract[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $finalThesis[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a>
                                    </div>
                                </div>
                                <hr>
                            </div>

                        @elseif ($thesisStatus[0]->status == "Examination Complete")
                        <div class="card shadow p-3 mb-5 bg-white rounded">
                            <h5 class="card-header">Final Thesis</h5>
                            <hr>
                            <div class="text-center">
                                Attempts: {{ $thesisStatus[0]->attempts }}
                            </div>
                            <br>
                            <div class="alert alert-success" role="alert">
                                <strong>
                                    The Student's Thesis Documents Have Successfully Undergone Examination.
                                </strong>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    Intention To Submit <br>
                                    Thesis Abstract <br>
                                    Final Thesis <br>
                                    <hr>
                                    Examiners Report
                                </div>
                                <div class="col-sm-2">
                                    <a href="/download/{{ $intentionToSubmit[0]->file_name }}"><i
                                            class="fa fa-download download-icon"></i></a><br>
                                    <a href="/download/{{ $thesisAbstract[0]->file_name }}"><i
                                            class="fa fa-download download-icon"></i></a><br>
                                    <a href="/download/{{ $finalThesis[0]->file_name }}"><i
                                            class="fa fa-download download-icon"></i></a><br><br>
                                    <a href="/download/{{ $examinersReport[0]->file_name }}"><i
                                        class="fa fa-download download-icon"></i></a>
                                </div>
                            </div>
                            <hr>
                        </div>

                        @elseif ($thesisStatus[0]->status == "HOD Approved: Thesis Correction Submission")
                        <div class="card shadow p-3 mb-5 bg-white rounded">
                            <h5 class="card-header">Final Thesis</h5>
                            <hr>
                            <div class="text-center">
                                Attempts: {{ $thesisStatus[0]->attempts }}
                            </div>
                            <br>
                            <div class="alert alert-success" role="alert">
                                <strong>
                                    The Student's Thesis Documents Have Been Approved By The HOD. The Student Is Now Awaiting Approval From The HDC.
                                </strong>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    Intention To Submit <br>
                                    Thesis Abstract <br>
                                    Final Thesis <br>
                                    <hr>
                                    Corrections Report
                                </div>
                                <div class="col-sm-2">
                                    <a href="/download/{{ $intentionToSubmit[0]->file_name }}"><i
                                            class="fa fa-download download-icon"></i></a><br>
                                    <a href="/download/{{ $thesisAbstract[0]->file_name }}"><i
                                            class="fa fa-download download-icon"></i></a><br>
                                    <a href="/download/{{ $finalThesis[0]->file_name }}"><i
                                            class="fa fa-download download-icon"></i></a><br><br>
                                    <a href="/download/{{ $correctionsReport[0]->file_name }}"><i
                                        class="fa fa-download download-icon"></i></a>
                                </div>
                            </div>
                            <hr>
                        </div>

                        @elseif ($thesisStatus[0]->status == "HDC Approved")
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Thesis</h5>
                                <hr>
                                <div class="text-center">
                                    Attempts: {{ $thesisStatus[0]->attempts }}
                                </div>
                                <br>
                                <div class="alert alert-success" role="alert">
                                    <strong>
                                        The Student's Thesis Documents Have Been Approved By The HDC. The Student Has Now Moved On To The Examination Stage.
                                    </strong>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        Intention To Submit <br>
                                        Thesis Abstract <br>
                                        Final Thesis <br>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="/download/{{ $intentionToSubmit[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $thesisAbstract[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $finalThesis[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a>
                                    </div>
                                </div>
                                <hr>
                            </div>

                        @elseif ($thesisStatus[0]->status == "HDC Rejected: Resubmit")
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Thesis</h5>
                                <hr>
                                <div class="text-center">
                                    Attempts: {{ $thesisStatus[0]->attempts }}
                                </div>
                                <br>
                                <div class="alert alert-danger" role="alert">
                                    <strong>
                                        The Student's Thesis Documents Have Been Rejected By The HDC. The Student Will Be Required To Resubmit Their Documents.
                                    </strong>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        Intention To Submit <br>
                                        Thesis Abstract <br>
                                        Final Thesis
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="/download/{{ $intentionToSubmit[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $thesisAbstract[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $finalThesis[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        @elseif ($thesisStatus[0]->status == "HDC Rejected: Thesis Correction Submission")
                        <div class="card shadow p-3 mb-5 bg-white rounded">
                            <h5 class="card-header">Final Thesis</h5>
                            <hr>
                            <div class="text-center">
                                Attempts: {{ $thesisStatus[0]->attempts }}
                            </div>
                            <br>
                            <div class="alert alert-danger" role="alert">
                                <strong>
                                    The Student's Thesis Documents Have Been Rejected By The HDC. The Student Will Be Required To Resubmit Their Documents.
                                </strong>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    Intention To Submit <br>
                                    Thesis Abstract <br>
                                    Final Thesis <br>
                                    <hr>
                                    Corrections Report
                                </div>
                                <div class="col-sm-2">
                                    <a href="/download/{{ $intentionToSubmit[0]->file_name }}"><i
                                            class="fa fa-download download-icon"></i></a><br>
                                    <a href="/download/{{ $thesisAbstract[0]->file_name }}"><i
                                            class="fa fa-download download-icon"></i></a><br>
                                    <a href="/download/{{ $finalThesis[0]->file_name }}"><i
                                            class="fa fa-download download-icon"></i></a><br><br>
                                    <a href="/download/{{ $correctionsReport[0]->file_name }}"><i
                                        class="fa fa-download download-icon"></i></a>
                                </div>
                            </div>
                            <hr>
                        </div>
                        @endif
                    @else
                        <div class="card shadow p-3 mb-5 bg-white rounded">
                            <h5 class="card-header">Final Thesis</h5>
                            <hr>
                            <p style="text-align: center;">The Student Has Not Submitted Their Thesis Documents Yet.
                            </p>
                            <hr>
                        </div>
                    @endif
                    {{-- @if (!$proposalSummary->isEmpty())
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
                            @elseif ($proposalStatus[0]->status == 'HDC Rejected')
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Proposal</h5>
                                <hr>
                                <div class="text-center">
                                    Attempts: {{ $proposalStatus[0]->attempts }}
                                </div>
                                <div class="alert alert-danger" role="alert">
                                    <strong>
                                        This Student's Proposal Documents Have Been Rejected By The HDC. The Student
                                        Will Be Required To Resubmit Their Documents. <br>
                                        HDC Comments: {{ $proposalStatus[0]->hdc_comments }}
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
                        @endif --}}
                </div>
            </div>
        </div>
        <!-- Page Content -->
        {{-- <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-light" id="menu-toggle"><span class="dark-blue-text"><i class="fa fa-bars"
                            aria-hidden="true"></i></span></button>
            <!-- If Student Hasn't Submitted Proposal Yet -->
            <div class="container">
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
            </div>
        </div> --}}

    </div>
    </div>
    </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
@endsection
