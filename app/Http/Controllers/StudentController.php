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
        return view('student.proposal');
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
        // Validate Files (I tried mime, mimes, mimetypes) none of them are validating any of the files correctly.
        $validator = Validator::make($request->all(), [
            'proposal_summary' => 'required|mimes:application/pdf|max:2048',//'required|mimetypes:application/pdf|max:2048',
            'plagiarism_report' => 'required|mimes:application/pdf|max:2048',//'required|mimetypes:pdf,doc,docx,txt|max:2048',
            'final_proposal' => 'required|mimes:application/pdf|max:2048'//'required|mimes:pdf,doc,docx,txt|max:2048',
        ]);

        // If Validation Is Successful
        if (!$validator->fails()) {

            // Get Current Logged In User's ID & name
            $user_id = Auth::user()->id;
            $user_name = Auth::user()->name;
            
            DB::table('proposal_summaries')->insert(
                ['user_id' => $user_id],
                ['file_path' => '/storage/' . 'messi']
            );

            DB::table('plagiarism_reports')->insert(
                ['user_id' => $user_id],
                ['file_path' => '/storage/' . 'messi']
            );

            DB::table('final_proposals')->insert(
                ['user_id' => $user_id],
                ['file_path' => '/storage/' . 'mesi']
            );
            
            // Proposal Summary File Name & Path
            $proposalSummaryFileName = $user_name.'_'.time().'_'.'proposalsummary';
            $proposalSummaryFilePath = $request->file('proposal_summary')->storeAs('uploads', $proposalSummaryFileName, 'public');

            // Plagiarism Report File Name & Path
            $plagiarismReportFileName = $user_name.'_'.time().'_'.'plagiarismreport';
            $plagiarismReportFilePath = $request->file('plagiarism_report')->storeAs('uploads', $plagiarismReportFileName, 'public');

            // Final Proposal File Name & Path
            $finalProposalFileName = $user_name.'_'.time().'_'.'finalproposal';
            $finalProposalFilePath = $request->file('final_proposal')->storeAs('uploads', $finalProposalFileName, 'public');

            // Add The Proposal Summary To It's Respective Table
            // proposalSummary::create([
            //     'user_id' => $user_id,
            //     'file_path' => '/storage/' . $proposalSummaryFilePath
            // ]);

            // Add The Plagiarism Report To It's Respective Table
            // plagiarismReport::create([
            //     'user_id' => $user_id,
            //     'file_path' => '/storage/' . $plagiarismReportFilePath
            // ]);

            // Add The Final Proposal To It's Respective Table
            // finalProposal::create([
            //     'user_id' => $user_id,
            //     'file_path' => '/storage/' . $finalProposalFilePath
            // ]);

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
