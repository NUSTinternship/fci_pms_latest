<?php

namespace App\Http\Controllers;

use App\Models\ProposalStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

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
        return view('supervisor.index', compact('students'));
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
        $proposalPhDStudents = DB::table('students')->select('id', 'user_id', 'progress')->where('supervisor_id', $supervisorId[0]->id)->where('program', 'PhD')->where('progress', 'PhD')->get();
        return view('supervisor.proposal', compact('proposalMastersStudents', 'proposalPhDStudents'));
    }

    public function studentProfile($id)
    {
        $user = User::find($id);
        $student = DB::table('students')->where('user_id', $id)->get();
        $proposalSummary = DB::table('proposal_summaries')->where('user_id', $id)->get();
        $proposalStatus = DB::table('proposal_status')->where('student_id', $id)->get();

        if ($proposalSummary) {
            $plagiarismReportFileName = DB::table('plagiarism_reports')->select('file_name')->where('user_id', $id)->first();
            $finalProposalFileName = DB::table('final_proposals')->select('file_name')->where('user_id', $id)->first();
        }

        return view('supervisor.studentProfile', compact('user', 'student', 'proposalStatus', 'proposalSummary', 'plagiarismReportFileName', 'finalProposalFileName'));
    }

    public function proposalDocumentsComments(Request $request)
    {
        
        if ($request->input('approvalComments')) {
            // Validate Files
            $validator = Validator::make($request->all(), [
                'approvalComments' => 'required'
            ]);

            if (!$validator->fails()) {
                $studentId = $request->input('studentId');
                $comments = 'APPROVED: ' . $request->input('approvalComments');

                $data=array('supervisor_comments'=>$comments, 'status'=> 'Resubmit');
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

    public function thesis()
    {
        //
        return view('supervisor.thesis');
    }
}
