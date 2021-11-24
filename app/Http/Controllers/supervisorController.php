<?php

namespace App\Http\Controllers;

use App\Models\ProposalStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class supervisorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $userId = Auth::user()->id;
        $supervisorId = DB::table('supervisors')->select('id')->where('user_id', $userId)->get();
        $students = DB::table('students')->select('id', 'user_id', 'progress')->where('supervisor_id', $supervisorId[0]->id)->limit(3)->get();

        $studentsYourEvaluating = DB::table('students')
            ->select('id')
            ->where('evaluator_id', $userId)
            ->orWhere('co_evaluator_id', $userId)
            ->get();

        $mastersStudentsYourEvaluating = DB::table('students')
            ->select('user_id', 'program', 'evaluator_id', 'co_evaluator_id')
            ->where('evaluator_id', $userId)
            ->orWhere('co_evaluator_id', $userId)
            ->where('program', 'Masters')
            ->limit(3)
            ->get();

        $phdStudentsYourEvaluating = DB::table('students')
            ->select('user_id', 'program', 'evaluator_id', 'co_evaluator_id')
            ->where('evaluator_id', $userId)
            ->orWhere('co_evaluator_id', $userId)
            ->where('program', 'PhD')
            ->limit(3)
            ->get();

        return view('supervisor.index', compact('students', 'studentsYourEvaluating' , 'mastersStudentsYourEvaluating', 'phdStudentsYourEvaluating'));
    }

    public function allStudents()
    {
        $userId = Auth::user()->id;
        $supervisorId = DB::table('supervisors')->select('id')->where('user_id', $userId)->get();
        $allMastersStudents = DB::table('students')->select('id', 'user_id', 'progress')->where('supervisor_id', $supervisorId[0]->id)->where('program', 'Masters')->get();
        $allPhDStudents = DB::table('students')->select('id', 'user_id', 'progress')->where('supervisor_id', $supervisorId[0]->id)->where('program', 'PhD')->get();
        return view('supervisor.allStudents', compact('allMastersStudents', 'allPhDStudents'));
    }

    public function proposal()
    {
        //
        $userId = Auth::user()->id;
        $supervisorId = DB::table('supervisors')->select('id')->where('user_id', $userId)->get();
        $proposalMastersStudents = DB::table('students')->select('id', 'user_id', 'progress')->where('supervisor_id', $supervisorId[0]->id)->where('program', 'Masters')->where('progress', 'Proposal')->get();
        $proposalPhDStudents = DB::table('students')->select('id', 'user_id', 'progress')->where('supervisor_id', $supervisorId[0]->id)->where('program', 'PhD')->where('progress', 'Proposal')->get();
        return view('supervisor.proposal', compact('proposalMastersStudents', 'proposalPhDStudents'));
    }

    public function studentProfile($id)
    {
        $user = User::find($id);
        $student = DB::table('students')->where('user_id', $id)->get();
        $proposalSummary = DB::table('proposal_summaries')->where('user_id', $id)->get();
        $proposalStatus = DB::table('proposal_status')->where('student_id', $id)->get();
        $checklist = DB::table('evaluator_checklists')->where('user_id', $id)->select('file_name')->first();

        if ($proposalSummary) {
            $plagiarismReportFileName = DB::table('plagiarism_reports')->select('file_name')->where('user_id', $id)->first();
            $finalProposalFileName = DB::table('final_proposals')->select('file_name')->where('user_id', $id)->first();
        }

        return view('supervisor.studentProfile', compact('user', 'student', 'proposalStatus', 'proposalSummary', 'plagiarismReportFileName', 'finalProposalFileName', 'checklist'));
    }

    public function studentProposalProfile($id)
    {
        $user = User::find($id);
        $student = DB::table('students')->where('user_id', $id)->get();
        $proposalSummary = DB::table('proposal_summaries')->where('user_id', $id)->get();
        $proposalStatus = DB::table('proposal_status')->where('student_id', $id)->get();
        $checklist = DB::table('evaluator_checklists')->where('user_id', $id)->select('file_name')->first();

        if ($proposalSummary) {
            $plagiarismReportFileName = DB::table('plagiarism_reports')->select('file_name')->where('user_id', $id)->first();
            $finalProposalFileName = DB::table('final_proposals')->select('file_name')->where('user_id', $id)->first();
            $correctionsFileName = DB::table('corrections_reports')->select('file_name')->where('user_id', $id)->first();
        }

        return view('supervisor.studentProposalProfile', compact('user', 'student', 'proposalStatus', 'proposalSummary', 'plagiarismReportFileName', 'finalProposalFileName', 'checklist', 'correctionsFileName'));
    }

    public function studentThesisProfile($id)
    {
        // Get Student Thesis Status
        $user = User::find($id);
        $thesisStatus = DB::table('thesis_status')->where('student_id', $id)->get();

        $intentionToSubmit = DB::table('intentions')->where('user_id', $id)->get();
        $thesisAbstract = DB::table('thesis_abstracts')->where('user_id', $id)->get();
        $finalThesis = DB::table('final_thesis')->where('user_id', $id)->get();
        $correctionsReport = DB::table('corrections_reports')->where('user_id', $id)->get();
        $examinersReport = DB::table('examiners_reports')->where('user_id', $id)->get();

        return view('supervisor.studentThesisProfile', compact('thesisStatus', 'user', 'intentionToSubmit', 'thesisAbstract', 'finalThesis', 'correctionsReport', 'examinersReport'));
    }

    public function proposalDocumentsComments(Request $request)
    {
        
        if ($request->input('rejectionComments') == 'UNDEFINED') {
            // Validate Files
            $validator = Validator::make($request->all(), [
                'approvalComments' => 'required'
            ]);

            if (!$validator->fails()) {
                $studentId = $request->input('studentId');
                $comments = 'APPROVED: ' . $request->input('approvalComments');

                $data=array('supervisor_comments'=>$comments, 'status'=> 'Supervisor Approved');
                DB::table('proposal_status')->where('student_id', $studentId)->update($data);

                return response()->json(['success' => 'Supervisor Successfully Created.']);

            } else {
                return response()->json(['error' => $validator->errors()->all()]);
            }
        } else {
            $validator = Validator::make($request->all(), [
                'rejectionComments' => 'required'
            ]);

            if (!$validator->fails()) {
                $studentId = $request->input('studentId');
                $comments = 'REJECTED: ' . $request->input('rejectionComments');

                $data=array('supervisor_comments'=>$comments, 'status'=> 'Resubmit');
                DB::table('proposal_status')->where('student_id', $studentId)->update($data);

                return response()->json(['success' => 'Supervisor Successfully Created.']);
            } else {
                return response()->json(['error' => $validator->errors()->all()]);
            }
        }

    }

    public function proposalDocumentsResubmissionComments(Request $request)
    {
        
        if ($request->input('rejectionComments') == 'UNDEFINED') {
            // Validate Files
            $validator = Validator::make($request->all(), [
                'approvalComments' => 'required'
            ]);

            if (!$validator->fails()) {
                $studentId = $request->input('studentId');
                $comments = 'APPROVED: ' . $request->input('approvalComments');

                $data=array('supervisor_comments'=>$comments, 'status'=> 'Supervisor Approved (Resubmission)');
                DB::table('proposal_status')->where('student_id', $studentId)->update($data);

                return response()->json(['success' => 'Supervisor Successfully Created.']);

            } else {
                return response()->json(['error' => $validator->errors()->all()]);
            }
        } else {
            $validator = Validator::make($request->all(), [
                'rejectionComments' => 'required'
            ]);

            if (!$validator->fails()) {
                $studentId = $request->input('studentId');
                $comments = 'REJECTED: ' . $request->input('rejectionComments');

                $data=array('supervisor_comments'=>$comments, 'status'=> 'Supervisor Rejected (Resubmission)');
                DB::table('proposal_status')->where('student_id', $studentId)->update($data);

                return response()->json(['success' => 'Supervisor Successfully Created.']);
            } else {
                return response()->json(['error' => $validator->errors()->all()]);
            }
        }

    }

    public function thesisDocumentsComments(Request $request)
    {
        
        if ($request->input('rejectionComments') == 'UNDEFINED') {
            // Validate Files
            $validator = Validator::make($request->all(), [
                'approvalComments' => 'required'
            ]);

            if (!$validator->fails()) {
                $studentId = $request->input('studentId');
                $comments = 'APPROVED: ' . $request->input('approvalComments');

                $data=array('supervisor_comments'=>$comments, 'status'=> 'Supervisor Approved');
                DB::table('thesis_status')->where('student_id', $studentId)->update($data);

                return response()->json(['success' => 'Supervisor Successfully Created.']);

            } else {
                return response()->json(['error' => $validator->errors()->all()]);
            }
        } else {
            $validator = Validator::make($request->all(), [
                'rejectionComments' => 'required'
            ]);

            if (!$validator->fails()) {
                $studentId = $request->input('studentId');
                $comments = 'REJECTED: ' . $request->input('rejectionComments');

                $data=array('supervisor_comments'=>$comments, 'status'=> 'Supervisor Rejected: Resubmit');
                DB::table('thesis_status')->where('student_id', $studentId)->update($data);

                return response()->json(['success' => 'Supervisor Successfully Created.']);
            } else {
                return response()->json(['error' => $validator->errors()->all()]);
            }
        }

    }

    public function thesisCorrectionComments(Request $request)
    {
        
        if ($request->input('rejectionComments') == 'UNDEFINED') {
            // Validate Files
            $validator = Validator::make($request->all(), [
                'approvalComments' => 'required'
            ]);

            if (!$validator->fails()) {
                $studentId = $request->input('studentId');
                $comments = 'APPROVED: ' . $request->input('approvalComments');

                $data=array('supervisor_comments'=>$comments, 'status'=> 'Supervisor Approved: Thesis Correction Submission');
                DB::table('thesis_status')->where('student_id', $studentId)->update($data);

                return response()->json(['success' => 'Supervisor Successfully Created.']);

            } else {
                return response()->json(['error' => $validator->errors()->all()]);
            }
        } else {
            $validator = Validator::make($request->all(), [
                'rejectionComments' => 'required'
            ]);

            if (!$validator->fails()) {
                $studentId = $request->input('studentId');
                $comments = 'REJECTED: ' . $request->input('rejectionComments');

                $data=array('supervisor_comments'=>$comments, 'status'=> 'Supervisor Rejected: Thesis Correction Submission');
                DB::table('thesis_status')->where('student_id', $studentId)->update($data);

                return response()->json(['success' => 'Supervisor Successfully Created.']);
            } else {
                return response()->json(['error' => $validator->errors()->all()]);
            }
        }

    }

    public function thesis()
    {
        //
        $userId = Auth::user()->id;
        $supervisorId = DB::table('supervisors')->select('id')->where('user_id', $userId)->get();
        $thesisMastersStudents = DB::table('students')->select('id', 'user_id', 'progress')->where('supervisor_id', $supervisorId[0]->id)->where('program', 'Masters')->where('progress', 'Thesis')->get();
        $thesisPhDStudents = DB::table('students')->select('id', 'user_id', 'progress')->where('supervisor_id', $supervisorId[0]->id)->where('program', 'PhD')->where('progress', 'Thesis')->get();

        return view('supervisor.thesis', compact('thesisMastersStudents', 'thesisPhDStudents'));
    }
}
