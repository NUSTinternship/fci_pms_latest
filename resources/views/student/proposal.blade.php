@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper" style="background-color: #1b2d5d; color: white;">
            <div class="sidebar-heading">Student Portal</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('student-home') }}" class="list-group-item list-group-item-action text-white"><i
                        class="fa fa-home" id="icons" aria-hidden="true"></i>Home</a>
                <a href="{{ route('student-proposal') }}"
                    class="list-group-item list-group-item-action text-white active"><i class="fa fa-sticky-note" id="icons"
                        aria-hidden="true"></i>Proposal</a>
                <a href="{{ route('student-thesis') }}" class="list-group-item list-group-item-action text-white"><i
                        class="fa fa-pencil-alt" id="icons" aria-hidden="true"></i>Thesis</a>
            </div>
        </div>
        <!-- End Of Sidebar -->
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
                            <h5 class="card-header">Monthly Progress Reports</h5>
                            <div class="card-body">
                                <hr>
                                <div class="row">
                                    <div class="col-sm-7">
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
                                    <div class="col-sm-5">
                                        <div class="card-rectangle" style="width: 18rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">Late</h5>
                                                <a href="#" class="card-link" data-toggle="modal" data-target="#late">
                                                    <p class="card-text" style="font-size: 50px;">1</p>
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
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="card-rectangle" style="width: 18rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">On Time</h5>
                                                <a href="#" class="card-link" data-toggle="modal" data-target="#ontime">
                                                    <p class="card-text" style="font-size: 50px;">2</p>
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
                                    <div class="col-sm-5">
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
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Submit Monthly
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
                        @if ($proposalSummaryFileName != null)
                            @if ($proposalStatus[0]->status == 'Submitted')
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                    <div class="alert alert-success" role="alert">
                                        <strong>
                                            You Have Submitted Your Documents. Please Wait For A Response From Your
                                            Supervisor.
                                        </strong>
                                    </div>
                                    <p style="color: black;">You have submitted the following documents:</p>
                                    <ul>
                                        <li>Final Proposal</li>
                                        <li>Turnitin Plagiarism Report</li>
                                        <li>Proposal Summary</li>
                                    </ul>
                                    <!-- Button trigger modal -->
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#final">
                                            View Submissions
                                        </button>
                                    </div>
                                    <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Submitted Final
                                                        Proposal
                                                        Documents</h5>
                                                    <button type="button" class="close" style="color: white;"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="text-align: justify">
                                                    <form id="proposal_documents" enctype="multipart/form-data"
                                                        method="POST">
                                                        @csrf
                                                        <div class="form-group">

                                                            <label for="proposal_summary">Proposal Summary</label><br>
                                                            <a
                                                                href="/download/{{ $proposalSummaryFileName->file_name }}">{{ $proposalSummaryFileName->file_name }}</a>


                                                            <hr>
                                                            <label for="plagiarism_report">Turnitin Plagiarism
                                                                Report</label><br>
                                                            <a
                                                                href="/download/{{ $plagiarismReportFileName->file_name }}">{{ $plagiarismReportFileName->file_name }}</a>

                                                            <hr>
                                                            <label for="final_proposal">Final Proposal</label><br>
                                                            <a
                                                                href="/download/{{ $finalProposalFileName }}">{{ $finalProposalFileName }}</a>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        id="proposal-documents-close" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($proposalStatus[0]->status == "Proposal Corrections Submitted")
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                    <div class="alert alert-success" role="alert">
                                        <strong>
                                            You Have Submitted Your Documents. Please Wait For A Response From Your
                                            Supervisor.
                                        </strong>
                                    </div>
                                    <p style="color: black;">You have submitted the following documents:</p>
                                    <ul>
                                        <li>Final Proposal</li>
                                        <li>Proposal Summary</li>
                                        <li>Corrections Report</li>
                                    </ul>
                                    <!-- Button trigger modal -->
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#final">
                                            View Submissions
                                        </button>
                                    </div>
                                    <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Submitted Final
                                                        Proposal
                                                        Documents</h5>
                                                    <button type="button" class="close" style="color: white;"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="text-align: justify">
                                                    <form id="proposal_documents" enctype="multipart/form-data"
                                                        method="POST">
                                                        @csrf
                                                        <div class="form-group">

                                                            <label for="proposal_summary">Proposal Summary</label><br>
                                                            <a
                                                                href="/download/{{ $proposalSummaryFileName->file_name }}">{{ $proposalSummaryFileName->file_name }}</a>

                                                            <hr>
                                                            <label for="final_proposal">Final Proposal</label><br>
                                                            <a
                                                                href="/download/{{ $finalProposalFileName }}">{{ $finalProposalFileName }}</a>

                                                            <hr>
                                                            <label for="plagiarism_report">Corrections Report</label><br>
                                                            <a
                                                                href="/download/{{ $correctionsReportFileName->file_name }}">{{ $correctionsReportFileName->file_name }}</a>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        id="proposal-documents-close" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($proposalStatus[0]->status == "Supervisor Rejected (Resubmission)")
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Proposal</h5>
                                <hr>
                                <div class="alert alert-danger" role="alert">
                                    <strong>
                                        <center>Supervisor Comments</center>
                                        {{ $proposalStatus[0]->supervisor_comments }} <br> Please redo your documents and resubmit.
                                    </strong>
                                </div>
                                <p style="color: black;">Please resubmit the following documents:</p>
                                <ul>
                                    <li>Final Proposal</li>
                                    <li>Proposal Summary</li>
                                    <li>Corrections Report</li>
                                </ul>
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
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    Submit Final Proposal
                                                    Documents</h5>
                                                <button type="button" class="close" style="color: white;"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="alert alert-danger print-proposalDocsResubmit-error-msg"
                                                role="alert" style="display:none">
                                                <strong>
                                                    <ul></ul>
                                                </strong>
                                            </div>
                                            <div class="alert alert-success print-proposalDocsResubmit-success-msg"
                                                role="alert" style="display:none">
                                                <strong>
                                                    Documents Successfully Submitted.
                                                </strong>
                                            </div>
                                            <div class="modal-body">
                                                <form id="resubmit_proposal_documents" enctype="multipart/form-data"
                                                    method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="proposal_summary"><span id="required">*</span>Proposal
                                                            Summary</label>
                                                        <input type="file" class="form-control-file"
                                                            id="proposal_summary" name="proposal_summary" required>

                                                        <hr>

                                                        <label for="final_proposal"><span id="required">*</span>Final
                                                            Proposal</label>
                                                        <input type="file" class="form-control-file" id="final_proposal"
                                                            name="final_proposal" required>

                                                        <hr>

                                                        <label for="corrections_report"><span id="required">*</span>
                                                            Corrections Report</label>
                                                        <input type="file" class="form-control-file"
                                                            id="corrections_report" name="corrections_report" required>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" id="proposalDocumentsHDCReSubmit-close"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary"
                                                    id="proposalDocumentsHDCReSubmit" value="Submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @elseif ($proposalStatus[0]->status == "Supervisor Approved (Resubmission)")
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Proposal</h5>
                                <hr>
                                <div class="alert alert-success" role="alert">
                                    <strong>
                                        <center>Supervisor Comments</center>
                                        {{ $proposalStatus[0]->supervisor_comments }} <br> Please
                                        Wait For The Higher Degree Committee To Consider Your Documents.
                                    </strong>
                                </div>
                                <p style="color: black;">You have submitted the following documents:</p>
                                <ul>
                                    <li>Final Proposal</li>
                                    <li>Proposal Summary</li>
                                    <li>Corrections Report</li>
                                </ul>
                                <!-- Button trigger modal -->
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#final">
                                        View Submissions
                                    </button>
                                </div>
                                <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Submitted Final
                                                    Proposal
                                                    Documents</h5>
                                                <button type="button" class="close" style="color: white;"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="text-align: justify">
                                                <form id="proposal_documents" enctype="multipart/form-data"
                                                    method="POST">
                                                    @csrf
                                                    <div class="form-group">

                                                        <label for="proposal_summary">Proposal Summary</label><br>
                                                        <a
                                                            href="/download/{{ $proposalSummaryFileName->file_name }}">{{ $proposalSummaryFileName->file_name }}</a>
                                                        <hr>
                                                        
                                                        <label for="final_proposal">Final Proposal</label><br>
                                                        <a
                                                            href="/download/{{ $finalProposalFileName }}">{{ $finalProposalFileName }}</a>

                                                        <hr>
                                                        <label for="plagiarism_report">Corrections
                                                            Report</label><br>
                                                        <a
                                                            href="/download/{{ $correctionsReportFileName->file_name }}">{{ $correctionsReportFileName->file_name }}</a>
                    
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    id="proposal-documents-close" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @elseif ($proposalStatus[0]->status == "Resubmit")
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>
                                            <center>Supervisor Comments</center><br>
                                            {{ $proposalStatus[0]->supervisor_comments }}
                                        </strong>
                                    </div>
                                    <p style="color: black;">Please resubmit the following documents:</p>
                                    <ul>
                                        <li>Final Proposal</li>
                                        <li>Turnitin Plagiarism Report</li>
                                        <li>Proposal Summary</li>
                                    </ul>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#resubmit">
                                            Submit
                                        </button>
                                    </div>
                                    <!--Modal To Submit Final Proposal Documents-->
                                    <div class="modal fade text-center" id="resubmit" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                        Submit Final Proposal
                                                        Documents</h5>
                                                    <button type="button" class="close" style="color: white;"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="alert alert-danger print-proposalDocsResubmit-error-msg"
                                                    role="alert" style="display:none">
                                                    <strong>
                                                        <ul></ul>
                                                    </strong>
                                                </div>
                                                <div class="alert alert-success print-proposalDocsResubmit-success-msg"
                                                    role="alert" style="display:none">
                                                    <strong>
                                                        Documents Successfully Submitted.
                                                    </strong>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="resubmit_proposal_documents" enctype="multipart/form-data"
                                                        method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="proposal_summary">Proposal
                                                                Summary</label>
                                                            <input type="file" class="form-control-file"
                                                                id="proposal_summary" name="proposal_summary" required>

                                                            <label for="plagiarism_report">Turnitin
                                                                Plagiarism
                                                                Report</label>
                                                            <input type="file" class="form-control-file"
                                                                id="plagiarism_report" name="plagiarism_report" required>

                                                            <label for="final_proposal">Final
                                                                Proposal</label>
                                                            <input type="file" class="form-control-file" id="final_proposal"
                                                                name="final_proposal" required>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        id="proposalDocumentsResubmit-close"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary"
                                                        id="proposalDocumentsReSubmit" value="Submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($proposalStatus[0]->status == "Supervisor Approved")
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                    <div class="alert alert-success" role="alert">
                                        <strong>
                                            <center>Supervisor Comments</center>
                                            {{ $proposalStatus[0]->supervisor_comments }} <br> Please wait for evaluators
                                            to go through your documents.
                                        </strong>
                                    </div>
                                    <p style="color: black;">You have submitted the following documents:</p>
                                    <ul>
                                        <li>Final Proposal</li>
                                        <li>Turnitin Plagiarism Report</li>
                                        <li>Proposal Summary</li>
                                    </ul>
                                    <!-- Button trigger modal -->
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#final">
                                            View Submissions
                                        </button>
                                    </div>
                                    <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Submitted Final
                                                        Proposal
                                                        Documents</h5>
                                                    <button type="button" class="close" style="color: white;"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="text-align: justify">
                                                    <form id="proposal_documents" enctype="multipart/form-data"
                                                        method="POST">
                                                        @csrf
                                                        <div class="form-group">

                                                            <label for="proposal_summary">Proposal Summary</label><br>
                                                            <a
                                                                href="/download/{{ $proposalSummaryFileName->file_name }}">{{ $proposalSummaryFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="plagiarism_report">Turnitin Plagiarism
                                                                Report</label><br>
                                                            <a
                                                                href="/download/{{ $plagiarismReportFileName->file_name }}">{{ $plagiarismReportFileName->file_name }}</a>
                                                            <hr>
                                                            <label for="final_proposal">Final Proposal</label><br>
                                                            <a
                                                                href="/download/{{ $finalProposalFileName }}">{{ $finalProposalFileName }}</a>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        id="proposal-documents-close" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($proposalStatus[0]->status == "HOD Rejected (Resubmission)")
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Proposal</h5>
                                <hr>
                                <div class="alert alert-danger" role="alert">
                                    <strong>
                                        <center>HOD Comments</center>
                                        {{ $proposalStatus[0]->hod_comments }} <br> Please redo your documents and resubmit.
                                    </strong>
                                </div>
                                <p style="color: black;">Please resubmit the following documents:</p>
                                <ul>
                                    <li>Final Proposal</li>
                                    <li>Proposal Summary</li>
                                    <li>Corrections Report</li>
                                </ul>
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
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    Submit Final Proposal
                                                    Documents</h5>
                                                <button type="button" class="close" style="color: white;"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="alert alert-danger print-proposalDocsResubmit-error-msg"
                                                role="alert" style="display:none">
                                                <strong>
                                                    <ul></ul>
                                                </strong>
                                            </div>
                                            <div class="alert alert-success print-proposalDocsResubmit-success-msg"
                                                role="alert" style="display:none">
                                                <strong>
                                                    Documents Successfully Submitted.
                                                </strong>
                                            </div>
                                            <div class="modal-body">
                                                <form id="resubmit_proposal_documents" enctype="multipart/form-data"
                                                    method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="proposal_summary"><span id="required">*</span>Proposal
                                                            Summary</label>
                                                        <input type="file" class="form-control-file"
                                                            id="proposal_summary" name="proposal_summary" required>

                                                        <hr>

                                                        <label for="final_proposal"><span id="required">*</span>Final
                                                            Proposal</label>
                                                        <input type="file" class="form-control-file" id="final_proposal"
                                                            name="final_proposal" required>

                                                        <hr>

                                                        <label for="corrections_report"><span id="required">*</span>
                                                            Corrections Report</label>
                                                        <input type="file" class="form-control-file"
                                                            id="corrections_report" name="corrections_report" required>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" id="proposalDocumentsHDCReSubmit-close"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary"
                                                    id="proposalDocumentsHDCReSubmit" value="Submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @elseif ($proposalStatus[0]->status == "HOD Approved (Resubmission)")
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Proposal</h5>
                                <hr>
                                <div class="alert alert-success" role="alert">
                                    <strong>
                                        The HOD Has Approved Your Corrected Documents. Please
                                        Wait For The Higher Degree Committee To Consider Your Documents.
                                    </strong>
                                </div>
                                <p style="color: black;">You have submitted the following documents:</p>
                                <ul>
                                    <li>Final Proposal</li>
                                    <li>Proposal Summary</li>
                                    <li>Corrections Report</li>
                                </ul>
                                <!-- Button trigger modal -->
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#final">
                                        View Submissions
                                    </button>
                                </div>
                                <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Submitted Final
                                                    Proposal
                                                    Documents</h5>
                                                <button type="button" class="close" style="color: white;"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="text-align: justify">
                                                <form id="proposal_documents" enctype="multipart/form-data"
                                                    method="POST">
                                                    @csrf
                                                    <div class="form-group">

                                                        <label for="proposal_summary">Proposal Summary</label><br>
                                                        <a
                                                            href="/download/{{ $proposalSummaryFileName->file_name }}">{{ $proposalSummaryFileName->file_name }}</a>


                                                        <hr>
                                    
                                                        <label for="final_proposal">Final Proposal</label><br>
                                                        <a
                                                            href="/download/{{ $finalProposalFileName }}">{{ $finalProposalFileName }}</a>

                                                        <hr>

                                                        <label for="plagiarism_report">Corrections
                                                            Report</label><br>
                                                        <a
                                                            href="/download/{{ $correctionsReportFileName->file_name }}">{{ $correctionsReportFileName->file_name }}</a>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    id="proposal-documents-close" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @elseif ($proposalStatus[0]->status == "Checklist Submitted: REJECTED")
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>
                                            Evaluators Have Gone Through Your Proposal Documents And Have Deemed Them
                                            Unsatisfactory. Please Use The Below Checklist As A Guide And Resubmit Your
                                            Documents.
                                            <br>
                                            <br>
                                            Evaluator's Checklist: <a
                                                href="/download/{{ $checklist->file_name }}">View</a>
                                        </strong>
                                    </div>
                                    <p style="color: black;">Please resubmit the following documents:</p>
                                    <ul>
                                        <li>Final Proposal</li>
                                        <li>Turnitin Plagiarism Report</li>
                                        <li>Proposal Summary</li>
                                    </ul>
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                        Submit Final Proposal
                                                        Documents</h5>
                                                    <button type="button" class="close" style="color: white;"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="alert alert-danger print-proposalDocsResubmit-error-msg"
                                                    role="alert" style="display:none">
                                                    <strong>
                                                        <ul></ul>
                                                    </strong>
                                                </div>
                                                <div class="alert alert-success print-proposalDocsResubmit-success-msg"
                                                    role="alert" style="display:none">
                                                    <strong>
                                                        Documents Successfully Submitted.
                                                    </strong>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="resubmit_proposal_documents" enctype="multipart/form-data"
                                                        method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="proposal_summary">Proposal
                                                                Summary</label>
                                                            <input type="file" class="form-control-file"
                                                                id="proposal_summary" name="proposal_summary" required>

                                                            <label for="plagiarism_report">Turnitin
                                                                Plagiarism
                                                                Report</label>
                                                            <input type="file" class="form-control-file"
                                                                id="plagiarism_report" name="plagiarism_report" required>

                                                            <label for="final_proposal">Final
                                                                Proposal</label>
                                                            <input type="file" class="form-control-file" id="final_proposal"
                                                                name="final_proposal" required>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary"
                                                        id="proposalDocumentsReSubmit" value="Submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($proposalStatus[0]->status == "Checklist Submitted: APPROVED")
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                    <div class="alert alert-success" role="alert">
                                        <strong>
                                            Evaluators Have Determined Your Proposal Documents To Be Satisfactory. Please
                                            Wait For The Higher Degree Committee To Consider Your Documents.
                                        </strong>
                                    </div>
                                    <p style="color: black;">You have submitted the following documents:</p>
                                    <ul>
                                        <li>Final Proposal</li>
                                        <li>Turnitin Plagiarism Report</li>
                                        <li>Proposal Summary</li>
                                    </ul>
                                    <!-- Button trigger modal -->
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#final">
                                            View Submissions
                                        </button>
                                    </div>
                                    <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Submitted Final
                                                        Proposal
                                                        Documents</h5>
                                                    <button type="button" class="close" style="color: white;"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="text-align: justify">
                                                    <form id="proposal_documents" enctype="multipart/form-data"
                                                        method="POST">
                                                        @csrf
                                                        <div class="form-group">

                                                            <label for="proposal_summary">Proposal Summary</label><br>
                                                            <a
                                                                href="/download/{{ $proposalSummaryFileName->file_name }}">{{ $proposalSummaryFileName->file_name }}</a>


                                                            <hr>
                                                            <label for="plagiarism_report">Turnitin Plagiarism
                                                                Report</label><br>
                                                            <a
                                                                href="/download/{{ $plagiarismReportFileName->file_name }}">{{ $plagiarismReportFileName->file_name }}</a>

                                                            <hr>
                                                            <label for="final_proposal">Final Proposal</label><br>
                                                            <a
                                                                href="/download/{{ $finalProposalFileName }}">{{ $finalProposalFileName }}</a>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        id="proposal-documents-close" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @elseif ($proposalStatus[0]->status == "HDC Approved")
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                    <div class="alert alert-success" role="alert">
                                        <strong>
                                            <center>HDC Comments</center>
                                            {{ $proposalStatus[0]->hdc_comments }} <br> You May Move On To The Thesis Stage.
                                        </strong>
                                    </div>
                                    <p style="color: black;">You have submitted the following documents:</p>
                                    <ul>
                                        <li>Final Proposal</li>
                                        <li>Turnitin Plagiarism Report</li>
                                        <li>Proposal Summary</li>
                                        @if ($correctionsReportFileName)
                                        <li>Corrections Report</li>
                                        @endif
                                    </ul>
                                    <!-- Button trigger modal -->
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#final">
                                            View Submissions
                                        </button>
                                    </div>
                                    <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Submitted Final
                                                        Proposal
                                                        Documents</h5>
                                                    <button type="button" class="close" style="color: white;"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="text-align: justify">
                                                    <form id="proposal_documents" enctype="multipart/form-data"
                                                        method="POST">
                                                        @csrf
                                                        <div class="form-group">

                                                            <label for="proposal_summary">Proposal Summary</label><br>
                                                            <a
                                                                href="/download/{{ $proposalSummaryFileName->file_name }}">{{ $proposalSummaryFileName->file_name }}</a>


                                                            <hr>
                                                            <label for="plagiarism_report">Turnitin Plagiarism
                                                                Report</label><br>
                                                            <a
                                                                href="/download/{{ $plagiarismReportFileName->file_name }}">{{ $plagiarismReportFileName->file_name }}</a>

                                                            <hr>
                                                            <label for="final_proposal">Final Proposal</label><br>
                                                            <a
                                                                href="/download/{{ $finalProposalFileName }}">{{ $finalProposalFileName }}</a>

                                                            @if ($correctionsReportFileName)
                                                            <hr>
                                                            <label for="final_proposal">Corrections Report</label><br>
                                                            <a
                                                                href="/download/{{ $correctionsReportFileName->file_name }}">{{ $correctionsReportFileName->file_name }}</a>
                                                            @endif
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        id="proposal-documents-close" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @elseif ($proposalStatus[0]->status == "HDC Rejected")
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>
                                            <center>HDC Comments</center>
                                            {{ $proposalStatus[0]->hdc_comments }} <br> Please redo your documents and resubmit.
                                        </strong>
                                    </div>
                                    <p style="color: black;">Please resubmit the following documents:</p>
                                    <ul>
                                        <li>Final Proposal</li>
                                        <li>Proposal Summary</li>
                                        <li>Corrections Report</li>
                                    </ul>
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                        Submit Final Proposal
                                                        Documents</h5>
                                                    <button type="button" class="close" style="color: white;"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="alert alert-danger print-proposalDocsResubmit-error-msg"
                                                    role="alert" style="display:none">
                                                    <strong>
                                                        <ul></ul>
                                                    </strong>
                                                </div>
                                                <div class="alert alert-success print-proposalDocsResubmit-success-msg"
                                                    role="alert" style="display:none">
                                                    <strong>
                                                        Documents Successfully Submitted.
                                                    </strong>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="resubmit_proposal_documents" enctype="multipart/form-data"
                                                        method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="proposal_summary"><span id="required">*</span>Proposal
                                                                Summary</label>
                                                            <input type="file" class="form-control-file"
                                                                id="proposal_summary" name="proposal_summary" required>

                                                            <hr>

                                                            <label for="final_proposal"><span id="required">*</span>Final
                                                                Proposal</label>
                                                            <input type="file" class="form-control-file" id="final_proposal"
                                                                name="final_proposal" required>

                                                            <hr>

                                                            <label for="corrections_report"><span id="required">*</span>
                                                                Corrections Report</label>
                                                            <input type="file" class="form-control-file"
                                                                id="corrections_report" name="corrections_report" required>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" id="proposalDocumentsHDCReSubmit-close"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary"
                                                        id="proposalDocumentsHDCReSubmit" value="Submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Proposal</h5>
                                <hr>
                                <p style="color: black;">Please submit the following documents:</p>
                                <ul>
                                    <li>Final Proposal</li>
                                    <li>Turnitin Plagiarism Report</li>
                                    <li>Proposal Summary</li>
                                </ul>
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#final">
                                        Submit
                                    </button>
                                </div>
                                <!--Modal To Submit Final Proposal Documents-->
                                <div class="modal fade text-center" id="final" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    Submit Final Proposal
                                                    Documents</h5>
                                                <button type="button" class="close" style="color: white;"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="alert alert-danger print-proposalDocuments-error-msg" role="alert"
                                                style="display:none">
                                                <strong>
                                                    <ul></ul>
                                                </strong>
                                            </div>
                                            <div class="alert alert-success print-proposalDocuments-success-msg"
                                                role="alert" style="display:none">
                                                <strong>
                                                    Documents Successfully Submitted.
                                                </strong>
                                            </div>
                                            <div class="modal-body">
                                                <form id="proposal_documents" enctype="multipart/form-data" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="proposal_summary"><span id="required">*</span>Proposal
                                                            Summary</label>
                                                        <input type="file" class="form-control-file" id="proposal_summary"
                                                            name="proposal_summary" required>

                                                        <hr>

                                                        <label for="plagiarism_report"><span id="required">*</span>Turnitin
                                                            Plagiarism
                                                            Report</label>
                                                        <input type="file" class="form-control-file" id="plagiarism_report"
                                                            name="plagiarism_report" required>

                                                        <hr>

                                                        <label for="final_proposal"><span id="required">*</span>Final
                                                            Proposal</label>
                                                        <input type="file" class="form-control-file" id="final_proposal"
                                                            name="final_proposal" required>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" id="proposalDocumentsSubmit"
                                                    value="Submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- End Of Page Content -->
    </div>
@endsection
