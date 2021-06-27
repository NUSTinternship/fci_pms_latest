<?php

namespace App\Http\Controllers;

use App\Models\finalProposal;
use App\Models\plagiarismReport;
use App\Models\proposalSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Models\Supervisor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
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
        return view('student.index');
    }

    public function proposal()
    {
        $id = Auth::user()->id;
        $proposalSummaryFileName = DB::table('proposal_summaries')->select('file_name')->where('user_id', $id)->first();
        $proposalSummaryFileName = $proposalSummaryFileName->file_name;

        /*
        Since A Student Needs To Submit All Three Documents At Once, We Know That If The Query Is Null
        The Student Hasn't Yet Submitted Any Documents. Therefore We Only Perform The Below Queries If
        The Query Returns Something
        */
        if ($proposalSummaryFileName) {
            $plagiarismReportFileName = DB::table('plagiarism_reports')->select('file_name')->where('user_id', $id)->first();
            $finalProposalFileName = DB::table('final_proposals')->select('file_name')->where('user_id', $id)->first();
            $finalProposalFileName = $finalProposalFileName->file_name;
            return view('student.proposal',  compact('plagiarismReportFileName', 'finalProposalFileName', 'proposalSummaryFileName'));
        } else {
            return view('student.proposal', compact('proposalSummaryFileName'));
        }
    }

    public function thesis()
    {
        return view('student.thesis');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function uploadProposalDocuments(Request $request)
    {
        // Validate Files
        $validator = Validator::make($request->all(), [
            'proposal_summary' => 'required|mimes:pdf,doc,docx|max:2048', 
            'plagiarism_report' => 'required|mimes:pdf,doc,docx|max:2048',
            'final_proposal' => 'required|mimes:pdf,doc,docx|max:2048'
        ]);

        // If Validation Is Successful
        if (!$validator->fails()) {

            // Get Current Logged In User's ID & name
            $user_id = Auth::user()->id;
            $user_name = Auth::user()->name;

            // Proposal Summary File Name & Path
            $proposalSummaryFileName = $user_name . '_' . time() . '_' . 'proposalsummary.' . $request->file('proposal_summary')->extension();
            $proposalSummaryFilePath = $request->file('proposal_summary')->storeAs('proposal_summaries', $proposalSummaryFileName, 'public');

            // Plagiarism Report File Name & Path
            $plagiarismReportFileName = $user_name . '_' . time() . '_' . 'plagiarismreport.' . $request->file('plagiarism_report')->extension();
            $plagiarismReportFilePath = $request->file('plagiarism_report')->storeAs('plagiarism_reports', $plagiarismReportFileName, 'public');

            // Final Proposal File Name & Path
            $finalProposalFileName = $user_name . '_' . time() . '_' . 'finalproposal.' . $request->file('final_proposal')->extension();
            $finalProposalFilePath = $request->file('final_proposal')->storeAs('final_proposals', $finalProposalFileName, 'public');

            // Add The Proposal Summary To It's Respective Table
            proposalSummary::create([
                'user_id' => $user_id,
                'file_name' => $proposalSummaryFileName,
                'file_path' => '/storage/' . $proposalSummaryFilePath
            ]);

            // Add The Plagiarism Report To It's Respective Table
            plagiarismReport::create([
                'user_id' => $user_id,
                'file_name' => $plagiarismReportFileName,
                'file_path' => '/storage/' . $plagiarismReportFilePath
            ]);

            // Add The Final Proposal To It's Respective Table
            finalProposal::create([
                'user_id' => $user_id,
                'file_name' => $finalProposalFileName,
                'file_path' => '/storage/' . $finalProposalFilePath
            ]);

            return response()->json(['success' => 'Supervisor Successfully Created.']);
        } else {
            // Return Error Messages
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function uploadThesisDocuments(Request $request)
    {
        // Validate Files
        $validator = Validator::make($request->all(), [
            'proposal_summary' => 'required|mimes:pdf,doc,docx|max:2048',
            'plagiarism_report' => 'required|mimes:pdf,doc,docx|max:2048',
            'final_proposal' => 'required|mimes:pdf,doc,docx|max:2048'
        ]);

        // If Validation Is Successful
        if (!$validator->fails()) {

            // Get Current Logged In User's ID & name
            $user_id = Auth::user()->id;
            $user_name = Auth::user()->name;

            // Proposal Summary File Name & Path
            $proposalSummaryFileName = $user_name . '_' . time() . '_' . 'proposalsummary.' . $request->file('proposal_summary')->extension();
            $proposalSummaryFilePath = $request->file('proposal_summary')->storeAs('proposal_summaries', $proposalSummaryFileName, 'public');

            // Plagiarism Report File Name & Path
            $plagiarismReportFileName = $user_name . '_' . time() . '_' . 'plagiarismreport.' . $request->file('plagiarism_report')->extension();
            $plagiarismReportFilePath = $request->file('plagiarism_report')->storeAs('plagiarism_reports', $plagiarismReportFileName, 'public');

            // Final Proposal File Name & Path
            $finalProposalFileName = $user_name . '_' . time() . '_' . 'finalproposal.' . $request->file('final_proposal')->extension();
            $finalProposalFilePath = $request->file('final_proposal')->storeAs('final_proposals', $finalProposalFileName, 'public');

            // Add The Proposal Summary To It's Respective Table
            proposalSummary::create([
                'user_id' => $user_id,
                'file_name' => $proposalSummaryFileName,
                'file_path' => '/storage/' . $proposalSummaryFilePath
            ]);

            // Add The Plagiarism Report To It's Respective Table
            plagiarismReport::create([
                'user_id' => $user_id,
                'file_name' => $plagiarismReportFileName,
                'file_path' => '/storage/' . $plagiarismReportFilePath
            ]);

            // Add The Final Proposal To It's Respective Table
            finalProposal::create([
                'user_id' => $user_id,
                'file_name' => $finalProposalFileName,
                'file_path' => '/storage/' . $finalProposalFilePath
            ]);

            return response()->json(['success' => 'Supervisor Successfully Created.']);
        } else {
            // Return Error Messages
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
