<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\User;
use App\Models\Supervisor;

class hdcController extends Controller
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
        // Get Students To Display On FHDC Index Page
        $compSciMastersStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('name', 'user_id', 'program', 'progress', 'department')
            ->where('program', 'Masters')
            ->where('department', 'Computer Science')
            ->get();

        $informaticsMastersStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('name', 'user_id', 'program', 'progress', 'department')
            ->where('program', 'Masters')
            ->where('department', 'Informatics')
            ->get();

        $compSciPhdStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('name','user_id', 'program', 'progress', 'department')
            ->where('program', 'Phd')
            ->where('department', 'Computer Science')
            ->get();

        $informaticsPhdStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('name','user_id', 'program', 'progress', 'department')
            ->where('program', 'Phd')
            ->where('department', 'Informatics')
            ->get();

        // Check If HOD Is Evaluating Any Student, If They Are, Retrieve Them
        $userId = Auth::user()->id;

        $studentsYourEvaluating = DB::table('students')
            ->select('id')
            ->where('evaluator_id', $userId)
            ->orWhere('co_evaluator_id', $userId)
            ->get();

        $mastersStudentsYourEvaluating = DB::table('students')
            ->select('user_id', 'program', 'evaluator_id', 'co_evaluator_id')
            ->where('program', 'Masters')
            ->where('evaluator_id', $userId)
            ->orWhere('co_evaluator_id', $userId)
            ->limit(3)
            ->get();

        $phdStudentsYourEvaluating = DB::table('students')
            ->select('user_id', 'program', 'evaluator_id', 'co_evaluator_id')
            ->where('program', 'PhD')
            ->where('evaluator_id', $userId)
            ->orWhere('co_evaluator_id', $userId)
            ->limit(3)
            ->get();

        return view('fhdc.index', compact('compSciMastersStudents', 'informaticsMastersStudents', 'informaticsPhdStudents', 'compSciPhdStudents','studentsYourEvaluating', 'mastersStudentsYourEvaluating', 'phdStudentsYourEvaluating'));
    }

    public function allStudents()
    {
        //
        // Get Students To Display On FHDC Index Page
        $mastersStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('name', 'program', 'progress', 'department')
            ->where('program', 'Masters')
            ->get();

        $phdStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('name', 'program', 'progress', 'department')
            ->where('program', 'PhD')
            ->get();

        return view('fhdc.allStudents', compact('mastersStudents', 'phdStudents'));
    }

    public function assignSupervisors()
    {
        $mastersStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('name', 'program', 'progress', 'department', 'user_id', 'supervisor_id', 'co_supervisor_id')
            ->where('program', 'Masters')
            ->get();

        $phdStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('name', 'program', 'progress', 'department', 'user_id', 'supervisor_id', 'co_supervisor_id')
            ->where('program', 'PhD')
            ->get();

        $users = DB::table('users')
            ->where('user_type', '=', 'Supervisor')
            ->select('id', 'name')
            ->get();

        // $student = DB::table('students')->where('user_id', $id)->get();
        
        return view('fhdc.assignSupervisor', compact('mastersStudents', 'phdStudents', 'users'));
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

        return view('fhdc.proposal', compact('mastersProposalStudents', 'phdProposalStudents'));
    }

    public function thesis()
    {
        //
        $mastersThesisStudents = DB::table('students')
            ->select('id', 'user_id')
            ->where('progress', 'Thesis')
            ->where('program', 'Masters')
            ->get();

        $phdThesisStudents = DB::table('students')
            ->select('id', 'user_id')
            ->where('progress', 'Thesis')
            ->where('program', 'PhD')
            ->get();
    
        return view('fhdc.thesis', compact('mastersThesisStudents', 'phdThesisStudents'));
    }

    public function application()
    {
        //
        // Get Students To Display On FHDC Index Page
        // $compSciMastersStudents = DB::table('users')
        //     ->join('students', 'students.user_id', '=', 'users.id')
        //     ->join('supervisors', 'students.supervisor_id', '=', 'supervisors.id')
        //     ->select('students.user_id', 'name', 'program', 'supervisor_id', 'co_supervisor_id', 'students.department')
        //     ->where('program', 'Masters')
        //     ->where('students.department', 'Computer Science')
        //     ->get();

        $compSciMastersStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('users.id', 'user_id', 'name', 'program', 'department', 'supervisor_id', 'co_supervisor_id')
            ->where('program', 'Masters')
            ->where('department', 'Computer Science')
            ->where('supervisor_id', null)
            ->get();

        $informaticsMastersStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('users.id', 'user_id', 'name', 'program', 'supervisor_id', 'co_supervisor_id', 'department')
            ->where('program', 'Masters')
            ->where('department', 'Informatics')
            ->where('supervisor_id', null)
            ->get();

        $compSciPhdStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('users.id', 'user_id', 'name', 'program', 'supervisor_id', 'co_supervisor_id', 'department')
            ->where('program', 'Phd')
            ->where('department', 'Computer Science')
            ->where('supervisor_id', null)
            ->get();

        $informaticsPhdStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('users.id', 'user_id', 'name', 'program', 'supervisor_id', 'co_supervisor_id', 'department')
            ->where('program', 'PhD')
            ->where('department', 'Informatics')
            ->where('supervisor_id', null)
            ->get();

        $supervisors = DB::table('students')->selectRaw('supervisor_id, COUNT(*) as count')->where('supervisor_id', '!=', null)->groupBy('supervisor_id')->pluck('count', 'supervisor_id');
        $allSupervisors = DB::table('supervisors')->select('id')->pluck('id');
        //dd($supervisors);

        $supervisorsWithLoadIDs = array();
        foreach ($supervisors as $key => $value) {
            $supervisorsWithLoadIDs[] = $key;
        }

        $allSupervisorsIDs = array();
        foreach ($allSupervisors as $key => $value) {
            $allSupervisorsIDs[] = $value;
        }

        $supervisorsWithNoLoad = array();
        foreach ($allSupervisorsIDs as $value) {
            if (!in_array($value, $supervisorsWithLoadIDs)) {
                $supervisorsWithNoLoad[] = $value;
            }
        }

        //dd($supervisors, $supervisorsWithNoLoad);

        $users = DB::table('users')
            ->where('user_type', '=', 'Supervisor')
            ->select('id', 'name')
            ->get();

        //dd($users);

        return view('fhdc.application', compact('compSciMastersStudents', 'informaticsMastersStudents', 'informaticsPhdStudents', 'compSciPhdStudents', 'users', 'supervisors', 'supervisorsWithNoLoad'));
    }

    public function addSupervisor(Request $request)
    {
        // Validate Form Input
        $validator = Validator::make($request->all(), [
            'selectedSupervisor' => 'required',
            'student_id' => 'required',
        ]);

        if (!$validator->fails()) {

            $user_id = $request->input('selectedSupervisor');
            $supervisor_id = DB::table('supervisors')->where('user_id', $user_id)->get('id');

            if ($request->input('selectedCoSupervisor')) {
                if ($request->input('selectedCoSupervisor') == "None"){
                    DB::table('students')
                    ->where('user_id', $request->input('student_id'))
                    ->update(['supervisor_id' => $supervisor_id[0]->id]);
                } else {
                    $co_id = $request->input('selectedCoSupervisor');
                    $co_supervisor_id = DB::table('supervisors')->where('user_id', $co_id)->get('id');
    
                    DB::table('students')
                    ->where('user_id', $request->input('student_id'))
                    ->update(['supervisor_id' => $supervisor_id[0]->id]);
    
                    DB::table('students')
                    ->where('user_id', $request->input('student_id'))
                    ->update(['co_supervisor_id' => $co_supervisor_id[0]->id]);
                }
            } else {
                DB::table('students')
                    ->where('user_id', $request->input('student_id'))
                    ->update(['supervisor_id' => $supervisor_id[0]->id]);
            }

            return response()->json(['success' => 'FHDC Successfully Created.']);
        } else {
            // Return Error Messages
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function addCoSupervisor(Request $request)
    {
        // Validate Form Input
        $validator = Validator::make($request->all(), [
            'selected' => 'required',
            'student_id' => 'required',
        ]);

        if (!$validator->fails()) {

            $user_id = $request->input('selected');
            $id = DB::table('supervisors')->where('user_id', $user_id)->get('id');

            DB::table('students')
                ->where('user_id', $request->input('student_id'))
                ->update(['co_supervisor_id' => $id[0]->id]);

            return response()->json(['success' => 'FHDC Successfully Created.']);
        } else {
            // Return Error Messages
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
        return view('fhdc.studentProfile', compact('user', 'student', 'users'));
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
        $studentHasEvaluator = DB::table('students')->select('user_id')->where('evaluator_id','!=', null)->get();

        $noCoEvaluator = collect('None');

        $proposalSummary = DB::table('proposal_summaries')->where('user_id', $id)->get();

        if ($proposalSummary) {
            $plagiarismReportFileName = DB::table('plagiarism_reports')->select('file_name')->where('user_id', $id)->first();
            $finalProposalFileName = DB::table('final_proposals')->select('file_name')->where('user_id', $id)->first();
            $correctionsReportFileName = DB::table('corrections_reports')->select('file_name')->where('user_id', $id)->first();
        }

        $checklist = DB::table('evaluator_checklists')->where('user_id', $id)->select('file_name')->get();
        $proposal_status = DB::table('proposal_status')->where('student_id', $id)->select('status')->get();

        return view('fhdc.studentProposalProfile', compact('student', 'evaluators', 'noCoEvaluator', 'studentsEligibleForEvaluator', 'proposalSummary', 'plagiarismReportFileName', 'finalProposalFileName' ,'checklist', 'proposal_status', 'studentHasEvaluator', 'correctionsReportFileName'));
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
            $examinersReport = DB::table('examiners_reports')->select('file_name')->where('user_id', $id)->get();
        }

        $thesisStatus = DB::table('thesis_status')->where('student_id', $id)->get();

        return view('fhdc.studentThesisProfile', compact('user', 'student', 'intentionToSubmit', 'thesisAbstract', 'finalThesis', 'thesisStatus', 'correctionsReport', 'examinersReport'));
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

                $data=array('hdc_comments'=>$comments, 'status'=> 'HDC Approved');
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

                $data=array('hdc_comments'=>$comments, 'status'=> 'HDC Rejected: Resubmit');
                DB::table('thesis_status')->where('student_id', $studentId)->update($data);

                return response()->json(['success' => 'Supervisor Successfully Created.']);
            } else {
                return response()->json(['error' => $validator->errors()->all()]);
            }
        }

    }

    public function hdcProposalComments(Request $request)
    {
        
        if ($request->input('rejectionComments') == 'UNDEFINED') {
            // Validate Files
            $validator = Validator::make($request->all(), [
                'approvalComments' => 'required'
            ]);

            if (!$validator->fails()) {
                $studentId = $request->input('studentId');
                $comments = 'APPROVED: ' . $request->input('approvalComments');

                $data=array('hdc_comments'=>$comments, 'status'=> 'HDC Approved');
                DB::table('proposal_status')->where('student_id', $studentId)->update($data);

                DB::table('students')->where('user_id', $studentId)->update(['progress' => 'Thesis']); // This Happens In The HDC When They Receive Word From The External HDC

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

                $data=array('hdc_comments'=>$comments, 'status'=> 'HDC Rejected');
                DB::table('proposal_status')->where('student_id', $studentId)->update($data);

                return response()->json(['success' => 'Supervisor Successfully Created.']);
            } else {
                return response()->json(['error' => $validator->errors()->all()]);
            }
        }

    }
}
