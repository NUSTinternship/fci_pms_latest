<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ExaminersReport;

class hodController extends Controller
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
        /* Get All Students That Require Evaluators. These Are Students Who's Proposal Documents Have Been Approved By Their Supervisor
           And Who Do Not Have Evaluators Assigned To Them.
        */
        $mastersStudentsNeedingEvaluators = DB::table('proposal_status')
            ->join('students', 'student_id' , '=', 'user_id')
            ->where('status', 'Supervisor Approved')
            ->where('program', 'Masters')
            ->whereNull('evaluator_id')
            ->select('student_id')
            ->get();
        
        $phdStudentsNeedingEvaluators = DB::table('proposal_status')
            ->join('students', 'student_id' , '=', 'user_id')
            ->where('status', 'Supervisor Approved')
            ->where('program', 'PhD')
            ->whereNull('evaluator_id')
            ->select('student_id')
            ->get();

        // Get All Potential Evaluators. These Are Basically All User Types Accept Students & Administrators
        $evaluators = DB::table('users')
            ->where('user_type', '!=', 'Student')
            ->where('user_type', '!=', 'Administrator')
            ->select('id', 'name')
            ->get();

        $noCoEvaluator = collect('None');

        // Check If HOD Is Evaluating Any Student, If They Are, Retrieve Them
        $userId = Auth::user()->id;

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

        return view('hod.index', compact('mastersStudentsNeedingEvaluators', 'phdStudentsNeedingEvaluators', 'evaluators', 'noCoEvaluator', 'studentsYourEvaluating', 'mastersStudentsYourEvaluating', 'phdStudentsYourEvaluating'));
    }

    public function proposal()
    {
        //
        $mastersProposalStudents = DB::table('students')
            ->select('id', 'user_id')
            ->where('progress', 'Proposal')
            ->where('program', 'Masters')
            ->get();

        $phdProposalStudents = DB::table('students')
            ->select('id', 'user_id')
            ->where('progress', 'Proposal')
            ->where('program', 'PhD')
            ->get();
        
        return view('hod.proposal', compact('mastersProposalStudents', 'phdProposalStudents'));
    }

    public function thesis()
    {
        //
        $thesisMastersStudents = DB::table('students')
            ->select('id', 'user_id', 'progress')
            ->where('program', 'Masters')
            ->where('progress', 'Thesis')
            ->get();

        $thesisPhDStudents = DB::table('students')
            ->select('id', 'user_id', 'progress')
            ->where('program', 'PhD')
            ->where('progress', 'Thesis')
            ->get();

        return view('hod.thesis', compact('thesisMastersStudents', 'thesisPhDStudents'));
    }

    public function studentProposalProfile($id)
    {
        $student = DB::table('students')->where('user_id', $id)->limit(1)->get();

        // Get All Potential Evaluators. These Are Basically All User Types Accept Students & Administrators
        $evaluators = DB::table('users')
            ->where('user_type', '!=', 'Student')
            ->where('user_type', '!=', 'Administrator')
            ->select('id', 'name')
            ->get();

        // dd($student[0]->id);

        $studentsEligibleForEvaluator = DB::table('students')->join('proposal_status', 'students.user_id', '=', 'proposal_status.student_id')->where('supervisor_comments', 'not like', '%REJECTED%')->select('student_id')->get();

        $noCoEvaluator = collect('None');

        $proposalSummary = DB::table('proposal_summaries')->where('user_id', $id)->get();

        if ($proposalSummary) {
            $plagiarismReportFileName = DB::table('plagiarism_reports')->select('file_name')->where('user_id', $id)->first();
            $finalProposalFileName = DB::table('final_proposals')->select('file_name')->where('user_id', $id)->first();
            $correctionsFileName = DB::table('corrections_reports')->select('file_name')->where('user_id', $id)->first();
        }

        $checklist = DB::table('evaluator_checklists')->where('user_id', $id)->select('file_name')->get();
        $proposal_status = DB::table('proposal_status')->where('student_id', $id)->select('status', 'hdc_comments')->get();

        return view('hod.studentProposalProfile', compact('student', 'evaluators', 'noCoEvaluator', 'studentsEligibleForEvaluator', 'proposalSummary', 'plagiarismReportFileName', 'finalProposalFileName' ,'checklist', 'proposal_status', 'correctionsFileName'));
    }

    public function studentThesisProfile($id)
    {
        $user = User::find($id);
        $student = DB::table('students')->where('user_id', $id)->limit(1)->get();

        $intentionToSubmit = DB::table('intentions')->where('user_id', $id)->get();

        if ($intentionToSubmit) {
            $thesisAbstract = DB::table('thesis_abstracts')->select('file_name')->where('user_id', $id)->get();
            $finalThesis = DB::table('final_thesis')->select('file_name')->where('user_id', $id)->get();
            $correctionsReport = DB::table('corrections_reports')->select('file_name')->where('user_id', $id)->get();
            $examinersReport = DB::table('examiners_reports')->where('user_id', $id)->select('file_name')->get();
        }

        $thesisStatus = DB::table('thesis_status')->where('student_id', $id)->get();

        return view('hod.studentThesisProfile', compact('user', 'student', 'intentionToSubmit', 'thesisAbstract', 'finalThesis', 'thesisStatus', 'correctionsReport', 'examinersReport'));
    }

    public function allStudentsRequiringEvaluation() 
    {
        $mastersStudentsNeedingEvaluators = DB::table('proposal_status')
            ->join('students', 'student_id' , '=', 'user_id')
            ->where('status', 'Supervisor Approved')
            ->where('program', 'Masters')
            ->whereNull('evaluator_id')
            ->select('student_id')
            ->get();

        $mastersStudentsWithEvaluators = DB::table('students')->where('program', 'Masters')->whereNotNull('evaluator_id')->select('user_id', 'evaluator_id', 'co_evaluator_id')->get();
        $phdStudentsWithEvaluators = DB::table('students')->where('program', 'PhD')->whereNotNull('evaluator_id')->select('user_id', 'evaluator_id', 'co_evaluator_id')->get();
        
        $phdStudentsNeedingEvaluators = DB::table('proposal_status')
            ->join('students', 'student_id' , '=', 'user_id')
            ->where('status', 'Supervisor Approved')
            ->where('program', 'PhD')
            ->whereNull('evaluator_id')
            ->select('student_id')
            ->get();
        
        // Get All Potential Evaluators. These Are Basically All User Types Accept Students & Administrators
        $evaluators = DB::table('users')
            ->where('user_type', '!=', 'Student')
            ->where('user_type', '!=', 'Administrator')
            ->select('id', 'name')
            ->get();

        $noCoEvaluator = collect('None');
        
        return view('hod.allStudents', compact('mastersStudentsNeedingEvaluators', 'phdStudentsNeedingEvaluators', 'evaluators', 'noCoEvaluator', 'mastersStudentsWithEvaluators', 'phdStudentsWithEvaluators'));
    }

    public function assignMastersEvaluators(Request $request)
    {
        // Validate
        $validator = Validator::make($request->all(), [
            'mastersEvaluatorID' => 'required',
            'studentId' => 'required',
        ]);

        // If Request Passes Validation, Insert Info Into Database
        if (!$validator->fails()) {

            if ($request->input('mastersCoEvaluatorID') == "None") {
                DB::table('students')
                ->where('user_id', $request->input('studentId'))
                ->update(['evaluator_id' => $request->input('mastersEvaluatorID'), 'co_evaluator_id' => NULL]);
            } else {
                DB::table('students')
                ->where('user_id', $request->input('studentId'))
                ->update(['evaluator_id' => $request->input('mastersEvaluatorID'), 'co_evaluator_id' => $request->input('mastersCoEvaluatorID')]);
            }

            return response()->json(['success' => 'FHDC Successfully Created.']);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function assignPhdEvaluators(Request $request)
    {
        // Validate
        $validator = Validator::make($request->all(), [
            'phdEvaluatorID' => 'required',
            'studentId' => 'required',
        ]);

        // If Request Passes Validation, Insert Info Into Database
        if (!$validator->fails()) {
            
            if ($request->input('phdCoEvaluatorID') == "None") {
                DB::table('students')
                ->where('user_id', $request->input('studentId'))
                ->update(['evaluator_id' => $request->input('phdEvaluatorID')]);
            } else {
                DB::table('students')
                ->where('user_id', $request->input('studentId'))
                ->update(['evaluator_id' => $request->input('phdEvaluatorID'), 'co_evaluator_id' => $request->input('phdCoEvaluatorID')]);
            }
            return response()->json(['success' => 'FHDC Successfully Created.']);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function studentProfile($id)
    {
        $user = User::find($id);
        $student = DB::table('students')->where('user_id', $id)->get();
        $users = DB::table('users')
            ->where('user_type', '=', 'Supervisor')
            ->select('id', 'name')
            ->get();

        $evaluator_id = $student[0]->evaluator_id;

        // Get All Potential Evaluators. These Are Basically All User Types Accept Students & Administrators
        $evaluators = DB::table('users')
            ->where('user_type', '!=', 'Student')
            ->where('user_type', '!=', 'Administrator')
            ->select('id', 'name')
            ->get();

        $noCoEvaluator = collect('None');

        $proposalSummary = DB::table('proposal_summaries')->where('user_id', $id)->get();

        $studentsEligibleForEvaluator = DB::table('students')->join('proposal_status', 'students.user_id', '=', 'proposal_status.student_id')->where('supervisor_comments', 'not like', '%REJECTED%')->select('student_id')->get();

        if ($proposalSummary) {
            $plagiarismReportFileName = DB::table('plagiarism_reports')->select('file_name')->where('user_id', $id)->first();
            $finalProposalFileName = DB::table('final_proposals')->select('file_name')->where('user_id', $id)->first();
        }
        $proposalStatus = DB::table('proposal_status')->where('student_id', $id)->select('status')->get();

        return view('hod.studentProfile', compact('user', 'student', 'users', 'proposalSummary', 'plagiarismReportFileName', 'finalProposalFileName', 'studentsEligibleForEvaluator', 'evaluators', 'noCoEvaluator', 'evaluator_id', 'proposalStatus'));
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

                $data=array('hod_comments'=>$comments, 'status'=> 'HOD Approved');
                DB::table('thesis_status')->where('student_id', $studentId)->update($data);
                DB::table('students')->where('user_id', $studentId)->update(['progress' => 'Examination']);

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

                $data=array('hod_comments'=>$comments, 'status'=> 'HOD Rejected: Resubmit');
                DB::table('thesis_status')->where('student_id', $studentId)->update($data);

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

                $data=array('hod_comments'=>$comments, 'status'=> 'HOD Approved (Resubmission)');
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

                $data=array('hod_comments'=>$comments, 'status'=> 'HOD Rejected (Resubmission)');
                DB::table('proposal_status')->where('student_id', $studentId)->update($data);

                return response()->json(['success' => 'Supervisor Successfully Created.']);
            } else {
                return response()->json(['error' => $validator->errors()->all()]);
            }
        }

    }

    public function thesisResubmissionComments(Request $request)
    {
        if ($request->input('rejectionComments') == 'UNDEFINED') {
            // Validate Files
            $validator = Validator::make($request->all(), [
                'approvalComments' => 'required'
            ]);

            if (!$validator->fails()) {
                $studentId = $request->input('studentId');
                $comments = 'APPROVED: ' . $request->input('approvalComments');

                $data=array('hod_comments'=>$comments, 'status'=> 'HOD Approved: Thesis Correction Submission');
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

                $data=array('hod_comments'=>$comments, 'status'=> 'HOD Rejected: Thesis Correction Submission');
                DB::table('thesis_status')->where('student_id', $studentId)->update($data);

                return response()->json(['success' => 'Supervisor Successfully Created.']);
            } else {
                return response()->json(['error' => $validator->errors()->all()]);
            }
        }
    }

    public function checklistSubmit(Request $request)
    {
        // Validate Files
        $validator = Validator::make($request->all(), [
            'checklist' => 'required|mimes:pdf,doc,docx|max:2048', 
            'checklistStatus' => 'required',
        ]);

        // If Validation Is Successful
        if (!$validator->fails()) {

            // Get Current Logged In User's ID & name
            $user_name = User::find($request->input('checklistStudentId'))->name;
            $user_id = $request->input('checklistStudentId');

            // Checklist File Name & Path
            $checklistFileName = $user_name . '_' . time() . '_' . 'checklist.' . $request->file('checklist')->extension();
            $checklistFilePath = $request->file('checklist')->storeAs('checklists', $checklistFileName, 'public');

            // Check If A Checklist Was Previously Submiited For This Student
            $previousChecklist = DB::table('evaluator_checklists')->where('user_id', $user_id)->first();

            if ($previousChecklist) {
                if ($request->input('checklistStatus') == "Approved") {
                    $updateChecklist=array('user_id'=>$user_id, 'file_name' => $checklistFileName, 'file_path' => $checklistFilePath);
                    $updateProposalStatus=array('status'=> 'Checklist Submitted: APPROVED');
                    DB::table('proposal_status')->where('student_id', $user_id)->update($updateProposalStatus);
                    DB::table('evaluator_checklists')->where('user_id', $user_id)->update($updateChecklist);
                } else {
                    $updateProposalStatus=array('student_id'=>$user_id, 'status'=> 'Checklist Submitted: REJECTED');
                    $updateChecklist = array('user_id'=>$user_id, 'file_name' => $checklistFileName, 'file_path' => $checklistFilePath);
                    DB::table('proposal_status')->where('student_id', $user_id)->update($updateProposalStatus);
                    DB::table('evaluator_checklists')->where('user_id', $user_id)->update($updateChecklist);
                }
            } else {
                Checklist::create([
                    'user_id' => $user_id,
                    'file_name' => $checklistFileName,
                    'file_path' => '/storage/' . $checklistFilePath
                ]);

                if ($request->input('checklistStatus') == "Approved") {
                    $data=array('student_id'=>$user_id, 'status'=> 'Checklist Submitted: APPROVED');
                    DB::table('proposal_status')->where('student_id', $user_id)->update($data);
                } else {
                    $data=array('student_id'=>$user_id, 'status'=> 'Checklist Submitted: REJECTED');
                    DB::table('proposal_status')->where('student_id', $user_id)->update($data);
                }
            }

            return response()->json(['success' => 'Supervisor Successfully Created.']);
        } else {
            // Return Error Messages
            return response()->json(['error' => $validator->errors()->all()]);
        }
    } 
    
    public function examinersReportSubmit(Request $request)
    {
        // Validate Files
        $validator = Validator::make($request->all(), [
            'examiners_report' => 'required|mimes:pdf,doc,docx|max:2048', 
        ]);

        // If Validation Is Successful
        if (!$validator->fails()) {

            // Get Current Logged In User's ID & name
            $user_name = User::find($request->input('checklistStudentId'))->name;
            $user_id = $request->input('checklistStudentId');

            // Checklist File Name & Path
            $examinersReportFileName = $user_name . '_' . time() . '_' . 'examinersReport.' . $request->file('examiners_report')->extension();
            $examinersReportFilePath = $request->file('examiners_report')->storeAs('examiners_reports', $examinersReportFileName, 'public');

            ExaminersReport::create([
                'user_id' => $user_id,
                'file_name' => $examinersReportFileName,
                'file_path' => '/storage/' . $examinersReportFilePath
            ]);

            $data=array('student_id'=>$user_id, 'status'=> 'Examination Complete');
            DB::table('thesis_status')->where('student_id', $user_id)->update($data);
            // DB::table('students')->where('student_id', $user_id)->update(['progress' => 'Examination Complete']);

            return response()->json(['success' => 'Supervisor Successfully Created.']);
        } else {
            // Return Error Messages
            return response()->json(['error' => $validator->errors()->all()]);
        }
    } 
}
