@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper" style="background-color: #1b2d5d; color: white;">
            <div class="sidebar-heading">Student Portal</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('student-home') }}" class="list-group-item list-group-item-action text-white"><i
                        class="fa fa-home" id="icons" aria-hidden="true"></i>Home</a>
                <a href="{{ route('student-proposal') }}" class="list-group-item list-group-item-action text-white"><i
                        class="fa fa-sticky-note" id="icons" aria-hidden="true"></i>Proposal</a>
                <a href="{{ route('student-thesis') }}"
                    class="list-group-item list-group-item-action text-white active"><i class="fa fa-pencil-alt" id="icons"
                        aria-hidden="true"></i>Thesis</a>
            </div>
        </div>
        <!-- End Of Sidebar -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- If Student Hasn't Submitted Proposal Yet -->
            @if ($student->progress == 'Thesis' or $student->progress == 'Examination')
                <div class="container-fluid">
                    <button class="btn btn-light" id="menu-toggle"><span class="dark-blue-text"><i class="fa fa-bars"
                                aria-hidden="true"></i></span></button>
                    <div class="row" style="padding-top: 3%;">
                        <div class="col-sm-12">
                            <!--Monthly Progress Reports-->
                            <div class="card text-center shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Monthly Progress Reports</h5>
                                <div class="card-body">
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card-rectangle" style="width: 18rem;">
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
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Outstanding
                                                                        Reports</h5>
                                                                    <button type="button" class="close"
                                                                        style="color: white;" data-dismiss="modal"
                                                                        aria-label="Close">
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
                                        <div class="col-sm-6">
                                            <div class="card-rectangle" style="width: 18rem;">
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
                                                                    <button type="button" class="close"
                                                                        style="color: white;" data-dismiss="modal"
                                                                        aria-label="Close">
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
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card-rectangle" style="width: 18rem;">
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
                                                                    <button type="button" class="close"
                                                                        style="color: white;" data-dismiss="modal"
                                                                        aria-label="Close">
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
                                        <div class="col-sm-6">
                                            <div class="card-rectangle" style="width: 18rem; float: left;">
                                                <div class="card-body">
                                                    <a href="#" class="card-link" data-toggle="modal"
                                                        data-target="#submitReport">
                                                        <p class="card-text" style="font-size: 37px;">Submit <br> Report</p>
                                                    </a>
                                                </div>
                                            </div>
                                            <!--Modal To Submit Report-->
                                            <div class="modal fade" id="submitReport" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Submit
                                                                Monthly
                                                                Progress Reports</h5>
                                                            <button type="button" class="close" style="color: white;"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <b>Current Month</b>
                                                            <form>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlFile1">April Progress
                                                                        Report</label>
                                                                    <input type="file" class="form-control-file"
                                                                        id="exampleFormControlFile1">
                                                                </div>
                                                            </form>

                                                            <b>Outstanding Monthly Reports</b>
                                                            <form>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlFile1">January Progress
                                                                        Report</label>
                                                                    <input type="file" class="form-control-file"
                                                                        id="exampleFormControlFile1">
                                                                </div>
                                                            </form>

                                                            <form>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlFile1">February Progress
                                                                        Report</label>
                                                                    <input type="file" class="form-control-file"
                                                                        id="exampleFormControlFile1">
                                                                </div>
                                                            </form>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <!-- Check If Student Has Submitted Any Documents -->
                            @if ($intentionToSubmitFileName != null)
                                <!-- Check The Student's Submission Status -->
                                @if ($thesisStatus->status == 'Supervisor Rejected: Resubmit')
                                    <div class="card shadow p-3 mb-5 bg-white rounded">
                                        <h5 class="card-header">Final Thesis</h5>
                                        <hr>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>
                                                Your Thesis Documents Have Been Rejected By Your Supervisor. Please
                                                Resubmit.
                                                <br>
                                                Supervisor Comments: {{ $thesisStatus->supervisor_comments }}
                                            </strong>
                                        </div>
                                        <p style="color: black;">Please resubmit the following documents:</p>
                                        <ul>
                                            <li>Intention To Submit Thesis</li>
                                            <li>Thesis Abstract</li>
                                            <li>Final Thesis</li>
                                        </ul>
                                        <!-- Button trigger modal -->
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#final">
                                                Submit
                                            </button>
                                        </div>
                                        <!--Modal To Submit Final Proposal Documents-->
                                        <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Submit Thesis
                                                            Documents
                                                        </h5>
                                                        <button type="button" class="close" style="color: white;"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="alert alert-danger print-thesisDocsResubmit-error-msg"
                                                        role="alert" style="display:none">
                                                        <strong>
                                                            <ul></ul>
                                                        </strong>
                                                    </div>
                                                    <div class="alert alert-success print-thesisDocsResubmit-success-msg"
                                                        role="alert" style="display: none">
                                                        <strong>
                                                            Documents Successfully Submitted.
                                                        </strong>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="resubmit_thesis_documents" enctype="multipart/form-data"
                                                            method="POST">
                                                            <div class="form-group">
                                                                <label for="intention" style="color: black;">Intention To
                                                                    Submit</label>
                                                                <input type="file" class="form-control-file"
                                                                    name="intention_to_submit" id="intention_to_submit">
                                                                <hr>

                                                                <label for="thesis_abstract" style="color: black;">Thesis
                                                                    Abstract</label>
                                                                <input type="file" class="form-control-file"
                                                                    name="thesis_abstract" id="thesis_abstract">
                                                                <hr>

                                                                <label for="final_thesis" style="color: black;">Final
                                                                    Thesis</label>
                                                                <input type="file" class="form-control-file"
                                                                    name="final_thesis" id="final_thesis">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            id="thesisDocumentsReSubmit-close"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" id="thesisDocumentsReSubmit"
                                                            class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @elseif ($thesisStatus->status == "HOD Rejected: Resubmit")
                                    <div class="card shadow p-3 mb-5 bg-white rounded">
                                        <h5 class="card-header">Final Thesis</h5>
                                        <hr>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>
                                                Your Thesis Documents Have Been Rejected By The Head of Department. Please
                                                Resubmit.
                                                <br>
                                                HOD Comments: {{ $thesisStatus->hod_comments }}
                                            </strong>
                                        </div>
                                        <p style="color: black;">Please resubmit the following documents:</p>
                                        <ul>
                                            <li>Thesis Abstract</li>
                                            <li>Final Thesis</li>
                                        </ul>
                                        <!-- Button trigger modal -->
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#final">
                                                Submit
                                            </button>
                                        </div>
                                        <!--Modal To Submit Final Proposal Documents-->
                                        <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Submit Thesis
                                                            Documents
                                                        </h5>
                                                        <button type="button" class="close" style="color: white;"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="alert alert-danger print-thesisDocsResubmit-error-msg"
                                                        role="alert" style="display:none">
                                                        <strong>
                                                            <ul></ul>
                                                        </strong>
                                                    </div>
                                                    <div class="alert alert-success print-thesisDocsResubmit-success-msg"
                                                        role="alert" style="display: none">
                                                        <strong>
                                                            Documents Successfully Submitted.
                                                        </strong>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="resubmit_thesis_documents" enctype="multipart/form-data"
                                                            method="POST">
                                                            <div class="form-group">
                                                                <label for="thesis_abstract" style="color: black;">Thesis
                                                                    Abstract</label>
                                                                <input type="file" class="form-control-file"
                                                                    name="thesis_abstract" id="thesis_abstract">
                                                                <hr>

                                                                <label for="final_thesis" style="color: black;">Final
                                                                    Thesis</label>
                                                                <input type="file" class="form-control-file"
                                                                    name="final_thesis" id="final_thesis">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            id="thesisDocumentsReSubmit-close"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" id="thesisDocumentsReSubmit"
                                                            class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                @elseif ($thesisStatus->status == "HDC Rejected: Resubmit")
                                    <div class="card shadow p-3 mb-5 bg-white rounded">
                                        <h5 class="card-header">Final Thesis</h5>
                                        <hr>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>
                                                Your Thesis Documents Have Been Rejected By The Higher Degree Committee.
                                                Please
                                                Submit Your Corrected Thesis And A Corrections Report.
                                                <br>
                                                HDC Comments: {{ $thesisStatus->hdc_comments }}
                                            </strong>
                                        </div>
                                        <p style="color: black;">Please submit the following documents:</p>
                                        <ul>
                                            <li>Final Thesis</li>
                                            <li>Corrections Report</li>
                                        </ul>
                                        <!-- Button trigger modal -->
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#final">
                                                Submit
                                            </button>
                                        </div>
                                        <!--Modal To Submit Final Proposal Documents-->
                                        <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Submit Thesis
                                                            Documents
                                                        </h5>
                                                        <button type="button" class="close" style="color: white;"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="alert alert-danger print-thesisCorrections-error-msg"
                                                        role="alert" style="display:none">
                                                        <strong>
                                                            <ul></ul>
                                                        </strong>
                                                    </div>
                                                    <div class="alert alert-success print-thesisCorrections-success-msg"
                                                        role="alert" style="display: none">
                                                        <strong>
                                                            Documents Successfully Submitted.
                                                        </strong>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="thesis_corrections" enctype="multipart/form-data"
                                                            method="POST">
                                                            <!--@csrf-->
                                                            <div class="form-group">

                                                                <label for="final_thesis" style="color: black;"><span id="required">*</span>Final
                                                                    Thesis</label>
                                                                <input type="file" class="form-control-file"
                                                                    name="final_thesis" id="final_thesis">
                                                                <hr>
                                                                <label for="corrections_report"
                                                                    style="color: black;"><span id="required">*</span>Corrections Report</label>
                                                                <input type="file" class="form-control-file"
                                                                    name="corrections_report" id="corrections_report">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            id="thesisCorrectionClose" data-dismiss="modal">Close</button>
                                                        <button type="button" id="thesisCorrectionSubmit"
                                                            class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @elseif ($thesisStatus->status == "Supervisor Approved")
                                    <div class="card shadow p-3 mb-5 bg-white rounded">
                                        <h5 class="card-header">Final Thesis</h5>
                                        <hr>
                                        <div class="alert alert-warning" role="alert">
                                            <strong>
                                                Your Supervisor Has Approved Your Documents. Your Documents Are Now Awaiting
                                                Approval From The HOD.
                                            </strong>
                                        </div>
                                        <p style="color: black;">You have submitted the following documents:</p>
                                        <ul>
                                            <li>Intention To Submit Thesis</li>
                                            <li>Thesis Abstract</li>
                                            <li>Final Thesis</li>
                                        </ul>
                                        <!-- Button trigger modal -->
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#final">
                                                View Submissions
                                            </button>
                                        </div>
                                        <!--Modal To Submit Final Proposal Documents-->
                                        <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Thesis Documents
                                                        </h5>
                                                        <button type="button" class="close" style="color: white;"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align: justify">
                                                        <div class="form-group">
                                                            <label for="intention">Intention To Submit</label><br>
                                                            <a
                                                                href="/download/{{ $intentionToSubmitFileName->file_name }}">{{ $intentionToSubmitFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="thesis_abstract">Thesis Abstract</label><br>
                                                            <a
                                                                href="/download/{{ $thesisAbstractFileName->file_name }}">{{ $thesisAbstractFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="final_thesis">Final Thesis</label><br>
                                                            <a
                                                                href="/download/{{ $finalThesisFileName->file_name }}">{{ $finalThesisFileName->file_name }}</a>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                id="thesisDocumentsClose"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                @elseif ($thesisStatus->status == "Supervisor Approved: Thesis Correction Submission")
                                    <div class="card shadow p-3 mb-5 bg-white rounded">
                                        <h5 class="card-header">Final Thesis</h5>
                                        <hr>
                                        <div class="alert alert-warning" role="alert">
                                            <strong>
                                                Your Supervisor Has Approved Your Documents. Your Documents Are Now Awaiting
                                                Approval From The HOD.
                                            </strong>
                                        </div>
                                        <p style="color: black;">You have submitted the following documents:</p>
                                        <ul>
                                            <li>Intention To Submit Thesis</li>
                                            <li>Thesis Abstract</li>
                                            <li>Final Thesis</li><br>
                                            <hr>
                                            <li>Corrections Report</li>
                                        </ul>
                                        <!-- Button trigger modal -->
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#final">
                                                View Submissions
                                            </button>
                                        </div>
                                        <!--Modal To Submit Final Proposal Documents-->
                                        <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Thesis Documents
                                                        </h5>
                                                        <button type="button" class="close" style="color: white;"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align: justify">
                                                        <div class="form-group">
                                                            <label for="intention">Intention To Submit</label><br>
                                                            <a
                                                                href="/download/{{ $intentionToSubmitFileName->file_name }}">{{ $intentionToSubmitFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="thesis_abstract">Thesis Abstract</label><br>
                                                            <a
                                                                href="/download/{{ $thesisAbstractFileName->file_name }}">{{ $thesisAbstractFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="final_thesis">Final Thesis</label><br>
                                                            <a
                                                                href="/download/{{ $finalThesisFileName->file_name }}">{{ $finalThesisFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="final_thesis">Corrections Report</label><br>
                                                            <a
                                                                href="/download/{{ $correctionsReportFileName->file_name }}">{{ $correctionsReportFileName->file_name }}</a>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                id="thesisDocumentsClose"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                @elseif ($thesisStatus->status == "HOD Approved")
                                    <div class="card shadow p-3 mb-5 bg-white rounded">
                                        <h5 class="card-header">Final Thesis</h5>
                                        <hr>
                                        <div class="alert alert-success" role="alert">
                                            <strong>
                                                The HOD Has Approved Your Documents. You Are Now In The Examination Stage.
                                            </strong>
                                        </div>
                                        <p style="color: black;">You have submitted the following documents:</p>
                                        <ul>
                                            <li>Intention To Submit Thesis</li>
                                            <li>Thesis Abstract</li>
                                            <li>Final Thesis</li>
                                        </ul>
                                        <!-- Button trigger modal -->
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#final">
                                                View Submissions
                                            </button>
                                        </div>
                                        <!--Modal To Submit Final Proposal Documents-->
                                        <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Thesis Documents
                                                        </h5>
                                                        <button type="button" class="close" style="color: white;"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align: justify">
                                                        <div class="form-group">
                                                            <label for="intention">Intention To Submit</label><br>
                                                            <a
                                                                href="/download/{{ $intentionToSubmitFileName->file_name }}">{{ $intentionToSubmitFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="thesis_abstract">Thesis Abstract</label><br>
                                                            <a
                                                                href="/download/{{ $thesisAbstractFileName->file_name }}">{{ $thesisAbstractFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="final_thesis">Final Thesis</label><br>
                                                            <a
                                                                href="/download/{{ $finalThesisFileName->file_name }}">{{ $finalThesisFileName->file_name }}</a>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                id="thesisDocumentsClose"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                @elseif ($thesisStatus->status == "Examination Complete")
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                    <div class="alert alert-success" role="alert">
                                        <strong>
                                            Your Final Thesis Has Successfully Undergone Examination. Below Is The Examiner's Report.
                                            <br>
                                            <br>
                                            Examiner's Report: <a
                                                href="/download/{{ $examinersReport[0]->file_name }}">View</a>
                                        </strong>
                                    </div>
                                    <p style="color: black;">You Have Submitted The Following Documents:</p>
                                    <ul>
                                        <li>Intention To Submit Thesis</li>
                                        <li>Thesis Abstract</li>
                                        <li>Final Thesis</li>
                                    </ul>
                                    <!-- Button trigger modal -->
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#final">
                                            View Submissions
                                        </button>
                                    </div>
                                    <!--Modal To Submit Final Proposal Documents-->
                                    <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Thesis Documents
                                                    </h5>
                                                    <button type="button" class="close" style="color: white;"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="text-align: justify">
                                                    <div class="form-group">
                                                        <label for="intention">Intention To Submit</label><br>
                                                        <a
                                                            href="/download/{{ $intentionToSubmitFileName->file_name }}">{{ $intentionToSubmitFileName->file_name }}</a>
                                                        <hr>
                                                        <label for="thesis_abstract">Thesis Abstract</label><br>
                                                        <a
                                                            href="/download/{{ $thesisAbstractFileName->file_name }}">{{ $thesisAbstractFileName->file_name }}</a>
                                                        <hr>
                                                        <label for="final_thesis">Final Thesis</label><br>
                                                        <a
                                                            href="/download/{{ $finalThesisFileName->file_name }}">{{ $finalThesisFileName->file_name }}</a>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            id="thesisDocumentsClose"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                @elseif ($thesisStatus->status == "HOD Approved: Thesis Correction Submission")
                                    <div class="card shadow p-3 mb-5 bg-white rounded">
                                        <h5 class="card-header">Final Thesis</h5>
                                        <hr>
                                        <div class="alert alert-warning" role="alert">
                                            <strong>
                                                The HOD Has Approved Your Documents. Your Documents Are Now Awaiting
                                                Approval From The HDC.
                                            </strong>
                                        </div>
                                        <p style="color: black;">You have submitted the following documents:</p>
                                        <ul>
                                            <li>Intention To Submit Thesis</li>
                                            <li>Thesis Abstract</li>
                                            <li>Final Thesis</li><br>
                                            <hr>
                                            <li>Corrections Report</li>
                                        </ul>
                                        <!-- Button trigger modal -->
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#final">
                                                View Submissions
                                            </button>
                                        </div>
                                        <!--Modal To Submit Final Proposal Documents-->
                                        <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Thesis Documents
                                                        </h5>
                                                        <button type="button" class="close" style="color: white;"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align: justify">
                                                        <div class="form-group">
                                                            <label for="intention">Intention To Submit</label><br>
                                                            <a
                                                                href="/download/{{ $intentionToSubmitFileName->file_name }}">{{ $intentionToSubmitFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="thesis_abstract">Thesis Abstract</label><br>
                                                            <a
                                                                href="/download/{{ $thesisAbstractFileName->file_name }}">{{ $thesisAbstractFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="final_thesis">Final Thesis</label><br>
                                                            <a
                                                                href="/download/{{ $finalThesisFileName->file_name }}">{{ $finalThesisFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="final_thesis">Corrections Report</label><br>
                                                            <a
                                                                href="/download/{{ $correctionsReportFileName->file_name }}">{{ $correctionsReportFileName->file_name }}</a>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                id="thesisDocumentsClose"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                @elseif ($thesisStatus->status == "HDC Approved")
                                    <div class="card shadow p-3 mb-5 bg-white rounded">
                                        <h5 class="card-header">Final Thesis</h5>
                                        <hr>
                                        <div class="alert alert-success" role="alert">
                                            <strong>
                                                The HDC Has Approved Your Documents. You Are Now In The Examination Stage.
                                            </strong>
                                        </div>
                                        <p style="color: black;">You have submitted the following documents:</p>
                                        <ul>
                                            <li>Intention To Submit Thesis</li>
                                            <li>Thesis Abstract</li>
                                            <li>Final Thesis</li><br>
                                            <hr>
                                            <li>Corrections Report</li>
                                        </ul>
                                        <!-- Button trigger modal -->
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#final">
                                                View Submissions
                                            </button>
                                        </div>
                                        <!--Modal To Submit Final Proposal Documents-->
                                        <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Thesis Documents
                                                        </h5>
                                                        <button type="button" class="close" style="color: white;"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align: justify">
                                                        <div class="form-group">
                                                            <label for="intention">Intention To Submit</label><br>
                                                            <a
                                                                href="/download/{{ $intentionToSubmitFileName->file_name }}">{{ $intentionToSubmitFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="thesis_abstract">Thesis Abstract</label><br>
                                                            <a
                                                                href="/download/{{ $thesisAbstractFileName->file_name }}">{{ $thesisAbstractFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="final_thesis">Final Thesis</label><br>
                                                            <a
                                                                href="/download/{{ $finalThesisFileName->file_name }}">{{ $finalThesisFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="final_thesis">Corrections Report</label><br>
                                                            <a
                                                                href="/download/{{ $correctionsReportFileName->file_name }}">{{ $correctionsReportFileName->file_name }}</a>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                id="thesisDocumentsClose"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                @elseif ($thesisStatus->status == null || $thesisStatus->status == "Submitted")
                                    <div class="card shadow p-3 mb-5 bg-white rounded">
                                        <h5 class="card-header">Final Thesis</h5>
                                        <hr>
                                        <div class="alert alert-success" role="alert">
                                            <strong>
                                                Documents Successfully Submitted. Please Wait For A Response From Your
                                                Supervisor.
                                            </strong>
                                        </div>
                                        <p style="color: black;">You have submitted the following documents:</p>
                                        <ul>
                                            <li>Intention To Submit Thesis</li>
                                            <li>Thesis Abstract</li>
                                            <li>Final Thesis</li>
                                        </ul>
                                        <!-- Button trigger modal -->
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#final">
                                                View Submissions
                                            </button>
                                        </div>
                                        <!--Modal To Submit Final Proposal Documents-->
                                        <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Thesis Documents
                                                        </h5>
                                                        <button type="button" class="close" style="color: white;"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align: justify">
                                                        <div class="form-group">
                                                            <label for="intention">Intention To Submit</label><br>
                                                            <a
                                                                href="/download/{{ $intentionToSubmitFileName->file_name }}">{{ $intentionToSubmitFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="thesis_abstract">Thesis Abstract</label><br>
                                                            <a
                                                                href="/download/{{ $thesisAbstractFileName->file_name }}">{{ $thesisAbstractFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="final_thesis">Final Thesis</label><br>
                                                            <a
                                                                href="/download/{{ $finalThesisFileName->file_name }}">{{ $finalThesisFileName->file_name }}</a>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                id="thesisDocumentsClose"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                @elseif ($thesisStatus->status == "Thesis Correction Submitted" || $thesisStatus->status
                                    == "Thesis Correction Resubmitted")
                                    <div class="card shadow p-3 mb-5 bg-white rounded">
                                        <h5 class="card-header">Final Thesis</h5>
                                        <hr>
                                        <div class="alert alert-success" role="alert">
                                            <strong>
                                                Documents Successfully Submitted. Please Wait For A Response From Your
                                                Supervisor.
                                            </strong>
                                        </div>
                                        <p style="color: black;">You have submitted the following documents:</p>
                                        <ul>
                                            <li>Intention To Submit Thesis</li>
                                            <li>Thesis Abstract</li>
                                            <li>Final Thesis</li>
                                            <hr>
                                            <li>Corrections Report</li>
                                        </ul>
                                        <!-- Button trigger modal -->
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#final">
                                                View Submissions
                                            </button>
                                        </div>
                                        <!--Modal To Submit Final Proposal Documents-->
                                        <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Thesis Documents
                                                        </h5>
                                                        <button type="button" class="close" style="color: white;"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align: justify">
                                                        <div class="form-group">
                                                            <label for="intention">Intention To Submit</label><br>
                                                            <a
                                                                href="/download/{{ $intentionToSubmitFileName->file_name }}">{{ $intentionToSubmitFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="thesis_abstract">Thesis Abstract</label><br>
                                                            <a
                                                                href="/download/{{ $thesisAbstractFileName->file_name }}">{{ $thesisAbstractFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="final_thesis">Final Thesis</label><br>
                                                            <a
                                                                href="/download/{{ $finalThesisFileName->file_name }}">{{ $finalThesisFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="final_thesis">Corrections Report</label><br>
                                                            <a
                                                                href="/download/{{ $correctionsReportFileName->file_name }}">{{ $correctionsReportFileName->file_name }}</a>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                id="thesisDocumentsClose"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                @elseif ($thesisStatus->status == "Supervisor Rejected: Thesis Correction Submission")
                                    <div class="card shadow p-3 mb-5 bg-white rounded">
                                        <h5 class="card-header">Final Thesis</h5>
                                        <hr>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>
                                                Your Thesis Documents Have Been Rejected By Your Supervisor. Please
                                                Resubmit.
                                                <br>
                                                Supervisor Comments: {{ $thesisStatus->supervisor_comments }}
                                            </strong>
                                        </div>
                                        <p style="color: black;">Please resubmit the following documents:</p>
                                        <ul>
                                            <li>Final Thesis</li>
                                            <li>Corrections Report</li>
                                        </ul>
                                        <!-- Button trigger modal -->
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#final">
                                                Submit
                                            </button>
                                        </div>
                                        <!--Modal To Submit Final Proposal Documents-->
                                        <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Submit Thesis
                                                            Documents
                                                        </h5>
                                                        <button type="button" class="close" style="color: white;"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="alert alert-danger print-thesisCorrections-error-msg"
                                                        role="alert" style="display:none">
                                                        <strong>
                                                            <ul></ul>
                                                        </strong>
                                                    </div>
                                                    <div class="alert alert-success print-thesisCorrections-success-msg"
                                                        role="alert" style="display: none">
                                                        <strong>
                                                            Documents Successfully Submitted.
                                                        </strong>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="thesis_corrections" enctype="multipart/form-data"
                                                            method="POST">
                                                            <!--@csrf-->
                                                            <div class="form-group">

                                                                <label for="final_thesis" style="color: black;"><span id="required">*</span>Final
                                                                    Thesis</label>
                                                                <input type="file" class="form-control-file"
                                                                    name="final_thesis" id="final_thesis">
                                                                <hr>
                                                                <label for="corrections_report"
                                                                    style="color: black;"><span id="required">*</span>Corrections Report</label>
                                                                <input type="file" class="form-control-file"
                                                                    name="corrections_report" id="corrections_report">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            id="thesisCorrectionClose" data-dismiss="modal">Close</button>
                                                        <button type="button" id="thesisCorrectionSubmit"
                                                            class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @elseif ($thesisStatus->status == "HOD Rejected: Thesis Correction Submission")
                                    <div class="card shadow p-3 mb-5 bg-white rounded">
                                        <h5 class="card-header">Final Thesis</h5>
                                        <hr>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>
                                                Your Thesis Documents Have Been Rejected By The Head of Department.
                                                <br>
                                                HOD Comments: {{ $thesisStatus->hod_comments }}
                                            </strong>
                                        </div>
                                        <p style="color: black;">Please resubmit the following documents:</p>
                                        <ul>
                                            <li>Final Thesis</li>
                                            <li>Corrections Report</li>
                                        </ul>
                                        <!-- Button trigger modal -->
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#final">
                                                Submit
                                            </button>
                                        </div>
                                        <!--Modal To Submit Final Proposal Documents-->
                                        <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Submit Thesis
                                                            Documents
                                                        </h5>
                                                        <button type="button" class="close" style="color: white;"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="alert alert-danger print-thesisCorrections-error-msg"
                                                        role="alert" style="display:none">
                                                        <strong>
                                                            <ul></ul>
                                                        </strong>
                                                    </div>
                                                    <div class="alert alert-success print-thesisCorrections-success-msg"
                                                        role="alert" style="display: none">
                                                        <strong>
                                                            Documents Successfully Submitted.
                                                        </strong>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="thesis_corrections" enctype="multipart/form-data"
                                                            method="POST">
                                                            <!--@csrf-->
                                                            <div class="form-group">

                                                                <label for="final_thesis" style="color: black;"><span id="required">*</span>Final
                                                                    Thesis</label>
                                                                <input type="file" class="form-control-file"
                                                                    name="final_thesis" id="final_thesis">
                                                                <hr>
                                                                <label for="corrections_report"
                                                                    style="color: black;"><span id="required">*</span>Corrections Report</label>
                                                                <input type="file" class="form-control-file"
                                                                    name="corrections_report" id="corrections_report">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            id="thesisCorrectionClose" data-dismiss="modal">Close</button>
                                                        <button type="button" id="thesisCorrectionSubmit"
                                                            class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @else
                                    <!-- Student Hasn't Submitted Any Documents Yet -->
                                    <div class="card shadow p-3 mb-5 bg-white rounded">
                                        <h5 class="card-header">Final Thesis</h5>
                                        <hr>
                                        <p style="color: black;">Please submit the following documents:</p>
                                        <ul>
                                            <li>Intention To Submit Thesis</li>
                                            <li>Thesis Abstract</li>
                                            <li>Final Thesis</li>
                                        </ul>
                                        <!-- Button trigger modal -->
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#final">
                                                Submit
                                            </button>
                                        </div>
                                        <!--Modal To Submit Final Proposal Documents-->
                                        <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Submit Thesis
                                                            Documents
                                                        </h5>
                                                        <button type="button" class="close" style="color: white;"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="alert alert-danger print-thesis-error-msg" role="alert"
                                                        style="display:none">
                                                        <strong>
                                                            <ul></ul>
                                                        </strong>
                                                    </div>
                                                    <div class="alert alert-success print-thesis-success-msg" role="alert"
                                                        style="display: none">
                                                        <strong>
                                                            Documents Successfully Submitted.
                                                        </strong>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="thesis_documents" enctype="multipart/form-data"
                                                            method="POST">
                                                            <div class="form-group">
                                                                <label for="intention" style="color: black;">Intention To
                                                                    Submit</label>
                                                                <input type="file" class="form-control-file"
                                                                    name="intention_to_submit" id="intention_to_submit">

                                                                <label for="thesis_abstract" style="color: black;">Thesis
                                                                    Abstract</label>
                                                                <input type="file" class="form-control-file"
                                                                    name="thesis_abstract" id="thesis_abstract">

                                                                <label for="final_thesis" style="color: black;">Final
                                                                    Thesis</label>
                                                                <input type="file" class="form-control-file"
                                                                    name="final_thesis" id="final_thesis">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" id="thesisDocumentsSubmit"
                                                            class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                @endif
                            @else
                            <!-- Student Hasn't Submitted Any Documents Yet -->
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Thesis</h5>
                                <hr>
                                <p style="color: black;">Please submit the following documents:</p>
                                <ul>
                                    <li>Intention To Submit Thesis</li>
                                    <li>Thesis Abstract</li>
                                    <li>Final Thesis</li>
                                </ul>
                                <!-- Button trigger modal -->
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#final">
                                        Submit
                                    </button>
                                </div>
                                <!--Modal To Submit Final Proposal Documents-->
                                <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Submit Thesis
                                                    Documents
                                                </h5>
                                                <button type="button" class="close" style="color: white;"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="alert alert-danger print-thesis-error-msg" role="alert"
                                                style="display:none">
                                                <strong>
                                                    <ul></ul>
                                                </strong>
                                            </div>
                                            <div class="alert alert-success print-thesis-success-msg" role="alert"
                                                style="display: none">
                                                <strong>
                                                    Documents Successfully Submitted.
                                                </strong>
                                            </div>
                                            <div class="modal-body">
                                                <form id="thesis_documents" enctype="multipart/form-data"
                                                    method="POST">
                                                    <div class="form-group">
                                                        <label for="intention" style="color: black;"><span id="required">*</span>Intention To
                                                            Submit</label>
                                                        <input type="file" class="form-control-file"
                                                            name="intention_to_submit" id="intention_to_submit">

                                                        <hr>

                                                        <label for="thesis_abstract" style="color: black;"><span id="required">*</span>Thesis
                                                            Abstract</label>
                                                        <input type="file" class="form-control-file"
                                                            name="thesis_abstract" id="thesis_abstract">

                                                        <hr>

                                                        <label for="final_thesis" style="color: black;"><span id="required">*</span>Final
                                                            Thesis</label>
                                                        <input type="file" class="form-control-file"
                                                            name="final_thesis" id="final_thesis">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" id="thesisDocumentsSubmit"
                                                    class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="container-fluid">
                    <button class="btn btn-light" id="menu-toggle"><span class="dark-blue-text"><i class="fa fa-bars"
                                aria-hidden="true"></i></span></button>
                    <div class="row" style="padding-top: 3%;">
                        <div class="col-sm-12">
                            <!--Monthly Progress Reports-->
                            <div class="card text-center shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header" style="background-color: red"><span style="padding-right: 1%"><i
                                            class="fa fa-exclamation-triangle" aria-hidden="true"
                                            class="text-danger"></i></span>Access
                                    Restricted</h5>
                                <div class="card-body">
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-rectangle" style="width: 100%">
                                                {{-- <div class="card-body" style="background-color: white">
                                                <div class="alert alert-danger">
                                                    You Do Not Have Access To This Stage Yet.
                                                </div>
                                            </div> --}}
                                                <div class="text-center" style="background-color: white; color: black">
                                                    <h5><b>Requirements To Gain Access To This Stage</b></h5><br>
                                                    <ul>
                                                        <li>You Must Submit Your Proposal Documents (Proposal Summary,
                                                            Plagiarism Report & Final Proposal)</li>
                                                        <li>Your Supervisor Must Approve Your Proposal Documents</li>
                                                        <li>Your Proposal Documents Must Successfully Undergo Evaluation,
                                                            and</li>
                                                        <li>The Higher Degree Committee Must Give Final Approval</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <!-- End Of Page Content -->
    @endsection
