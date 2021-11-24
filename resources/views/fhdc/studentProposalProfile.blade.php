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

            <!-- If Student Hasn't Submitted Proposal Yet -->
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button class="btn btn-light" id="menu-toggle"><span class="dark-blue-text"><i class="fa fa-bars"
                                aria-hidden="true"></i></span></button>
                </nav>
                <div class="row" style="padding-top: 3%;">
                    <div class="col-sm-12">
                        <!--Monthly Progress Reports-->
                        <div class="card text-center shadow p-3 mb-5 bg-white rounded">
                            <h4 class="card-header">{{ App\Models\User::find($student[0]->user_id)->name }}</h4>
                            @if ($studentsEligibleForEvaluator->contains('student_id', $student[0]->user_id) || $studentHasEvaluator->contains('user_id', $student[0]->user_id))
                                <div class="card-body">
                                    <hr>
                                    <h5 class="card-header">Evaluators</h5>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-hover">
                                                <thead class="thead-blue">
                                                    <tr>
                                                        <th scope="col" style="color: white;">Evaluator</th>
                                                        <th scope="col" style="color: white;">Co-Evaluator</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        @if ($student[0]->evaluator_id != null)
                                                            <td>{{ App\Models\User::find($student[0]->evaluator_id)->name }}
                                                            </td>
                                                        @else
                                                            <td>No Evaluator Assigned</td>
                                                        @endif
                                                        @if ($student[0]->co_evaluator_id != null)
                                                            <td>{{ App\Models\User::find($student[0]->co_evaluator_id)->name }}
                                                            </td>
                                                        @else
                                                            <td>No Co-Evaluator Assigned</td>
                                                        @endif
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @else
                                <div class="card-body">
                                    <hr>
                                    <h5 class="card-header">Evaluators</h5>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <b>This Student Is Not Eligible To Be Assigned Evaluators</b>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @endif
                        </div>
                        <!--Monthly Progress Reports-->
                        {{-- @if ($studentsEligibleForEvaluator->contains('student_id', $student[0]->user_id))
                            @if (!$checklist->isEmpty() && $proposal_status[0]->status == 'Checklist Submitted: REJECTED')
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>
                                            The Evaluators Have Rejected This Student's Proposal Documents. Please Wait
                                            Until
                                            The Student Resubmits Their Proposal Documents.
                                        </strong>
                                    </div>
                                    <br>
                                    @if ($studentsEligibleForEvaluator->contains('student_id', $student[0]->user_id))
                                        <div class="row">
                                            <div class="col-sm-10">
                                                Proposal Summary <br>
                                                Turnitin Plagiarism Report <br>
                                                Final Proposal <br>
                                                <hr>
                                                Evaluator's Checklist
                                            </div>
                                            <div class="col-sm-2">
                                                <a href="/download/{{ $proposalSummary[0]->file_name }}"><i
                                                        class="fa fa-download download-icon"></i></a><br>
                                                <a href="/download/{{ $plagiarismReportFileName->file_name }}"><i
                                                        class="fa fa-download download-icon"></i></a><br>
                                                <a href="/download/{{ $finalProposalFileName->file_name }}"><i
                                                        class="fa fa-download download-icon"></i></a>
                                                <hr>
                                                <a href="/download/{{ $checklist[0]->file_name }}"><i
                                                        class="fa fa-download download-icon"></i></a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row text-center">
                                            <div class="col-sm-12">
                                                <b>This Student Has Not Yet Submitted Their Proposal Documents</b>
                                            </div>
                                        </div>
                                    @endif
                                    <hr>
                                </div>
                            @elseif (!$checklist->isEmpty() && $proposal_status[0]->status == 'Checklist Submitted:
                                APPROVED')
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                    <div class="alert alert-success" role="alert">
                                        <strong>
                                            The Evaluators Have Approved This Student's Proposal Documents. The Student Has
                                            Now Moved On To The Thesis Stage.
                                        </strong>
                                    </div>
                                    <br>
                                    @if ($studentsEligibleForEvaluator->contains('student_id', $student[0]->user_id))
                                        <div class="row">
                                            <div class="col-sm-10">
                                                Proposal Summary <br>
                                                Turnitin Plagiarism Report <br>
                                                Final Proposal <br>
                                                <hr>
                                                Evaluator's Checklist
                                            </div>
                                            <div class="col-sm-2">
                                                <a href="/download/{{ $proposalSummary[0]->file_name }}"><i
                                                        class="fa fa-download download-icon"></i></a><br>
                                                <a href="/download/{{ $plagiarismReportFileName->file_name }}"><i
                                                        class="fa fa-download download-icon"></i></a><br>
                                                <a href="/download/{{ $finalProposalFileName->file_name }}"><i
                                                        class="fa fa-download download-icon"></i></a>
                                                <hr>
                                                <a href="/download/{{ $checklist[0]->file_name }}"><i
                                                        class="fa fa-download download-icon"></i></a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row text-center">
                                            <div class="col-sm-12">
                                                <b>This Student Has Not Yet Submitted Their Proposal Documents</b>
                                            </div>
                                        </div>
                                    @endif
                                    <hr>
                                </div>
                            @elseif (!$checklist->isEmpty() && $proposal_status[0]->status == 'Supervisor Approved')
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>
                                            The Student Has Resubmitted Their Proposal Documents And Now Requires
                                            Evaluation.
                                        </strong>
                                    </div>
                                    <br>
                                    @if ($studentsEligibleForEvaluator->contains('student_id', $student[0]->user_id))
                                        <div class="row">
                                            <div class="col-sm-10">
                                                Proposal Summary <br>
                                                Turnitin Plagiarism Report <br>
                                                Final Proposal <br>
                                                <hr>
                                                Evaluator's Checklist
                                            </div>
                                            <div class="col-sm-2">
                                                <a href="/download/{{ $proposalSummary[0]->file_name }}"><i
                                                        class="fa fa-download download-icon"></i></a><br>
                                                <a href="/download/{{ $plagiarismReportFileName->file_name }}"><i
                                                        class="fa fa-download download-icon"></i></a><br>
                                                <a href="/download/{{ $finalProposalFileName->file_name }}"><i
                                                        class="fa fa-download download-icon"></i></a>
                                                <hr>
                                                <a href="/download/{{ $checklist[0]->file_name }}"><i
                                                        class="fa fa-download download-icon"></i></a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#checklist">
                                                Submit Checklist
                                            </button>
                                            <div class="modal fade text-center" id="checklist" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Submit
                                                                Checklist</h5>
                                                            <button type="button" class="close" style="color: white;"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            <div class="alert alert-danger print-checklist-error-msg"
                                                                role="alert" style="display:none">
                                                                <strong>
                                                                    <ul></ul>
                                                                </strong>
                                                            </div>
                                                            <div class="alert alert-success print-checklist-success-msg"
                                                                role="alert" style="display:none">
                                                                <strong>
                                                                    Checklist Submitted Successfully.
                                                                </strong>
                                                            </div>
                                                            <form id="checklistForm">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlFile1"
                                                                        style="color: black;">Checklist</label>
                                                                    <input type="file" name="checklist" id="checklist"
                                                                        class="form-control-file"
                                                                        id="exampleFormControlFile1">
                                                                </div>
                                                                <hr>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlFile1"
                                                                        style="color: black;">Status</label><br>
                                                                    <select class="form-select"
                                                                        aria-label="Default select example"
                                                                        id="checklistStatus" name="checklistStatus">
                                                                        <option value="Approved">Approved</option>
                                                                        <option value="Rejected">Rejected</option>
                                                                    </select>
                                                                </div>
                                                                <input type="hidden" id="checklistStudentId" name="checklistStudentId" value="{{ $student[0]->user_id }}">
                                                        </div>
                                                        </form>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" id="checklistSubmitClose"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary" id="checklistSubmit">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row text-center">
                                            <div class="col-sm-12">
                                                <b>This Student Has Not Yet Submitted Their Proposal Documents</b>
                                            </div>
                                        </div>
                                    @endif
                                    <hr>
                                </div>
                            @elseif ($proposal_status[0]->status == 'Submitted')
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                        <div class="row text-center">
                                            <div class="col-sm-12">
                                                <b>This Student Has Not Yet Submitted Their Proposal Documents</b>
                                            </div>
                                        </div>
                                    <hr>
                                </div>
                            @elseif ($checklist->isEmpty() && $proposal_status[0]->status == 'Supervisor Approved')
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Proposal</h5>
                                <hr>
                                <div class="alert alert-warning" role="alert">
                                    <strong>
                                        The Student Has Submitted Their Proposal Documents And Now Requires
                                        Evaluation.
                                    </strong>
                                </div>
                                <br>
                                    <div class="row">
                                        <div class="col-sm-10">
                                            Proposal Summary <br>
                                            Turnitin Plagiarism Report <br>
                                            Final Proposal <br>
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
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#checklist">
                                            Submit Checklist
                                        </button>
                                        <div class="modal fade text-center" id="checklist" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Submit
                                                            Checklist</h5>
                                                        <button type="button" class="close" style="color: white;"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-left">
                                                        <div class="alert alert-danger print-checklist-error-msg"
                                                            role="alert" style="display:none">
                                                            <strong>
                                                                <ul></ul>
                                                            </strong>
                                                        </div>
                                                        <div class="alert alert-success print-checklist-success-msg"
                                                            role="alert" style="display:none">
                                                            <strong>
                                                                Checklist Submitted Successfully.
                                                            </strong>
                                                        </div>
                                                        <form id="checklistForm">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleFormControlFile1"
                                                                    style="color: black;">Checklist</label>
                                                                <input type="file" name="checklist" id="checklist"
                                                                    class="form-control-file"
                                                                    id="exampleFormControlFile1">
                                                            </div>
                                                            <hr>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlFile1"
                                                                    style="color: black;">Status</label><br>
                                                                <select class="form-select"
                                                                    aria-label="Default select example"
                                                                    id="checklistStatus" name="checklistStatus">
                                                                    <option value="Approved">Approved</option>
                                                                    <option value="Rejected">Rejected</option>
                                                                </select>
                                                            </div>
                                                            <input type="hidden" id="checklistStudentId" name="checklistStudentId" value="{{ $student[0]->user_id }}">
                                                    </div>
                                                    </form>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" id="checklistSubmitClose"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary" id="checklistSubmit">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <hr>
                            </div>
                            @elseif ($proposal_status[0]->status == 'Resubmit')
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                        <div class="row text-center">
                                            <div class="col-sm-12">
                                                <b>This Student Has Not Yet Submitted Their Proposal Documents</b>
                                            </div>
                                        </div>
                                    <hr>
                                </div>
                                @elseif ($proposal_status[0]->status == 'Checklist Submitted: APPROVED')
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header">Final Proposal</h5>
                                    <hr>
                                    <div class="alert alert-success" role="alert">
                                        <strong>
                                            The Evaluators Have Approved This Student's Proposal Documents. The Student's Submissions Are Now Be Considered By The Higher Degree Committee.
                                        </strong>
                                    </div>
                                    <br>
                                        <div class="row">
                                            <div class="col-sm-10">
                                                Proposal Summary <br>
                                                Turnitin Plagiarism Report <br>
                                                Final Proposal <br>
                                                <hr>
                                                Evaluator's Checklist
                                            </div>
                                            <div class="col-sm-2">
                                                <a href="/download/{{ $proposalSummary[0]->file_name }}"><i
                                                        class="fa fa-download download-icon"></i></a><br>
                                                <a href="/download/{{ $plagiarismReportFileName->file_name }}"><i
                                                        class="fa fa-download download-icon"></i></a><br>
                                                <a href="/download/{{ $finalProposalFileName->file_name }}"><i
                                                        class="fa fa-download download-icon"></i></a>
                                                <hr>
                                                <a href="/download/{{ $checklist[0]->file_name }}"><i
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
                                <br>
                                <div class="row text-center">
                                    <div class="col-sm-12">
                                        <b>This Student Has Not Yet Submitted Their Proposal Documents</b>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        @endif --}}

                        <!-- Check If The Student's Documents Have Been Approved By Evaluators -->
                        @if ($proposal_status[0]->status == 'Checklist Submitted: APPROVED')
                        <div class="card shadow p-3 mb-5 bg-white rounded">
                            <h5 class="card-header">Final Proposal</h5>
                            <hr>
                            <div class="alert alert-success" role="alert">
                                <strong>
                                    The Evaluators Have Approved This Student's Proposal Documents. The Student's Submissions Now Require Consideration From The External HDC.
                                </strong>
                            </div>
                            <br>
                                <div class="row">
                                    <div class="col-sm-10">
                                        Proposal Summary <br>
                                        Turnitin Plagiarism Report <br>
                                        Final Proposal <br>
                                        <hr>
                                        Evaluator's Checklist
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="/download/{{ $proposalSummary[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $plagiarismReportFileName->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $finalProposalFileName->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a>
                                        <hr>
                                        <a href="/download/{{ $checklist[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a>
                                    </div>
                                </div>
                            <hr>
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
                                                    <div class="alert alert-danger print-hdcApproval-error-msg"
                                                        role="alert" style="display:none">
                                                        <strong>
                                                            <ul></ul>
                                                        </strong>
                                                    </div>
                                                    <div class="alert alert-success print-hdcApproval-success-msg"
                                                        role="alert" style="display:none">
                                                        <strong>
                                                            Comments Successfully Saved.
                                                        </strong>
                                                    </div>
                                                    <form id="hdcApprovalComments">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">Please Provide Approval
                                                                Comments</label>
                                                            <textarea class="form-control" id="approvalComments"
                                                                name="approvalComments" rows="3"></textarea>
                                                            <input type="hidden" id="approvalStudentId"
                                                                name="approvalStudentId" value="{{ $student[0]->user_id }}">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        id="hdcApprovalClose" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary"
                                                        id="hdcApprovalSubmit">Submit</button>
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
                                                    <div class="alert alert-danger print-hdcRejection-error-msg"
                                                        role="alert" style="display:none">
                                                        <strong>
                                                            <ul></ul>
                                                        </strong>
                                                    </div>
                                                    <div class="alert alert-success print-hdcRejection-success-msg"
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
                                                                name="rejectionStudentId" value="{{ $student[0]->user_id }}">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        id="hdcRejectionClose" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary"
                                                        id="hdcRejectionSubmit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        @elseif ($proposal_status[0]->status == 'HDC Rejected')
                        <div class="card shadow p-3 mb-5 bg-white rounded">
                            <h5 class="card-header">Final Proposal</h5>
                            <hr>
                            <div class="alert alert-danger" role="alert">
                                <strong>
                                    The HDC Have Rejected This Student's Proposal Documents. Please Wait For The Student To Resubmit.
                                </strong>
                            </div>
                            <br>
                                <div class="row">
                                    <div class="col-sm-10">
                                        Proposal Summary <br>
                                        Turnitin Plagiarism Report <br>
                                        Final Proposal <br>
                                        <hr>
                                        Evaluator's Checklist
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="/download/{{ $proposalSummary[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $plagiarismReportFileName->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $finalProposalFileName->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a>
                                        <hr>
                                        <a href="/download/{{ $checklist[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a>
                                    </div>
                                </div>
                        </div>
                        @elseif ($proposal_status[0]->status == 'HDC Approved')
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <h5 class="card-header">Final Proposal</h5>
                                <hr>
                                <br>
                                <div class="alert alert-success" role="alert">
                                    <strong>
                                        The Student Has Moved On To The Thesis Stage.
                                    </strong>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        Proposal Summary <br>
                                        Turnitin Plagiarism Report <br>
                                        Final Proposal
                                        @if ($correctionsReportFileName)
                                        <br>
                                        Corrections Report   
                                        @endif
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="/download/{{ $proposalSummary[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $plagiarismReportFileName->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $finalProposalFileName->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a>
                                        @if ($correctionsReportFileName)
                                        <br>
                                        <a href="/download/{{ $correctionsReportFileName->file_name }}"><i
                                            class="fa fa-download download-icon"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                            </div>
                        @elseif ($proposal_status[0]->status == 'HOD Approved (Resubmission)')
                        <div class="card shadow p-3 mb-5 bg-white rounded">
                            <h5 class="card-header">Final Proposal</h5>
                            <hr>
                            <div class="alert alert-success" role="alert">
                                <strong>
                                    The HOD Have Approved This Student's Corrected Proposal Documents. The Student's Submissions Now Require Consideration From The External HDC.
                                </strong>
                            </div>
                            <br>
                                <div class="row">
                                    <div class="col-sm-10">
                                        Proposal Summary <br>
                                        Final Proposal <br>
                                        Corrections Report <br>
                                        <hr>
                                        Evaluator's Checklist
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="/download/{{ $proposalSummary[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $finalProposalFileName->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a><br>
                                        <a href="/download/{{ $correctionsReportFileName->file_name }}"><i
                                            class="fa fa-download download-icon"></i></a><br>
                                        <hr>
                                        <a href="/download/{{ $checklist[0]->file_name }}"><i
                                                class="fa fa-download download-icon"></i></a>
                                    </div>
                                </div>
                            <hr>
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
                                                    <div class="alert alert-danger print-hdcApproval-error-msg"
                                                        role="alert" style="display:none">
                                                        <strong>
                                                            <ul></ul>
                                                        </strong>
                                                    </div>
                                                    <div class="alert alert-success print-hdcApproval-success-msg"
                                                        role="alert" style="display:none">
                                                        <strong>
                                                            Comments Successfully Saved.
                                                        </strong>
                                                    </div>
                                                    <form id="hdcApprovalComments">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">Please Provide Approval
                                                                Comments</label>
                                                            <textarea class="form-control" id="approvalComments"
                                                                name="approvalComments" rows="3"></textarea>
                                                            <input type="hidden" id="approvalStudentId"
                                                                name="approvalStudentId" value="{{ $student[0]->user_id }}">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        id="hdcApprovalClose" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary"
                                                        id="hdcApprovalSubmit">Submit</button>
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
                                                    <div class="alert alert-danger print-hdcRejection-error-msg"
                                                        role="alert" style="display:none">
                                                        <strong>
                                                            <ul></ul>
                                                        </strong>
                                                    </div>
                                                    <div class="alert alert-success print-hdcRejection-success-msg"
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
                                                                name="rejectionStudentId" value="{{ $student[0]->user_id }}">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        id="hdcRejectionClose" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary"
                                                        id="hdcRejectionSubmit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        @else
                        <div class="card shadow p-3 mb-5 bg-white rounded">
                            <h5 class="card-header">Final Proposal</h5>
                            <hr>
                                <p style="text-align: center;">The Student Has Not Submitted Their Proposal Documents Yet.</p>
                            <hr>
                        </div>
                        @endif
                        <!-- Check If Student Is In The Process Of Being Evaluated -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
@endsection
