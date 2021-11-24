<?php

namespace App\Http\Controllers;

use App\Models\CorrectionsReport;
use App\Models\finalProposal;
use App\Models\FinalThesis;
use App\Models\intentionToSubmit;
use App\Models\plagiarismReport;
use App\Models\ProposalStatus;
use App\Models\proposalSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Models\Supervisor;
use App\Models\thesisAbstract;
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
        $userId = Auth::user()->id;
        $supervisor = DB::table('students')->select('supervisor_id')->where('user_id', $userId)->first();

        $user = DB::table('students')->where('user_id', $userId)->first();

        return view('student.index', compact('supervisor', 'user'));
    }

    public function proposal()
    {
        $id = Auth::user()->id;
        $proposalSummaryFileName = DB::table('proposal_summaries')->select('file_name')->where('user_id', $id)->first();
        $proposalStatus = DB::table('proposal_status')->where('student_id', $id)->limit(1)->get();
        //$proposalSummaryFileName = $proposalSummaryFileName->file_name;

        /*
        Since A Student Needs To Submit All Three Documents At Once, We Know That If The Query Is Null
        The Student Hasn't Yet Submitted Any Documents. Therefore We Only Perform The Below Queries If
        The Query Returns Something
        */
        $checklist = DB::table('evaluator_checklists')->where('user_id', $id)->select('file_name')->first();
        if ($proposalSummaryFileName) {
            $plagiarismReportFileName = DB::table('plagiarism_reports')->select('file_name')->where('user_id', $id)->first();
            $finalProposalFileName = DB::table('final_proposals')->select('file_name')->where('user_id', $id)->first();
            $correctionsReportFileName = DB::table('corrections_reports')->select('file_name')->where('user_id', $id)->first();
            $finalProposalFileName = $finalProposalFileName->file_name;
            return view('student.proposal',  compact('plagiarismReportFileName', 'finalProposalFileName', 'proposalSummaryFileName', 'proposalStatus', 'checklist', 'correctionsReportFileName'));
        } else {
            return view('student.proposal', compact('proposalSummaryFileName', 'checklist'));
        }
    }

    public function thesis()
    {
        $id = Auth::user()->id;
        $intentionToSubmitFileName = DB::table('intentions')->select('file_name')->where('user_id', $id)->first();
        $thesisStatus = DB::table('thesis_status')->where('student_id', $id)->first();
        $student = DB::table('students')->select('progress')->where('user_id', $id)->first();
        /*
        Since A Student Needs To Submit All Three Documents At Once, We Know That If The Query Is Null
        The Student Hasn't Yet Submitted Any Documents. Therefore We Only Perform The Below Queries If
        The Query Returns Something
        */
        if ($intentionToSubmitFileName) {
            $thesisAbstractFileName = DB::table('thesis_abstracts')->select('file_name')->where('user_id', $id)->first();
            $finalThesisFileName = DB::table('final_thesis')->select('file_name')->where('user_id', $id)->first();
            $correctionsReportFileName = DB::table('corrections_reports')->select('file_name')->where('user_id', $id)->first();
            $examinersReport = DB::table('examiners_reports')->where('user_id', $id)->select('file_name')->get();
            return view('student.thesis',  compact('thesisAbstractFileName', 'finalThesisFileName', 'intentionToSubmitFileName', 'student', 'thesisStatus', 'correctionsReportFileName', 'examinersReport'));
        } else {
            return view('student.thesis', compact('intentionToSubmitFileName', 'student', 'thesisStatus'));
        }
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

            $data=array('student_id'=>$user_id, "attempts"=>1, 'status'=> 'Submitted');
            DB::table('proposal_status')->insert($data);

            return response()->json(['success' => 'Supervisor Successfully Created.']);
        } else {
            // Return Error Messages
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function resubmitProposalDocuments(Request $request)
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

            // Find This User's Previously Submitted Documents
            $previousPlagiarismReport = DB::table('plagiarism_reports')->where('user_id', $user_id)->get();
            $previousFinalProposal = DB::table('final_proposals')->where('user_id', $user_id)->get();
            $previousProposalSummary = DB::table('proposal_summaries')->where('user_id', $user_id)->get();

            // Delete These Previous Files From Storage
            if(is_file($previousProposalSummary[0]->file_path))
            {
                // 1. possibility
                //Storage::delete($previousProposalSummary[0]->file_path);
                // 2. possibility
                unlink(storage_path($previousProposalSummary[0]->file_path));
            }

            if(is_file($previousFinalProposal[0]->file_path))
            {
                // 1. possibility
                //Storage::delete($previousFinalProposal[0]->file_path);
                // 2. possibility
                unlink(storage_path($previousFinalProposal[0]->file_path));
            }

            if(is_file($previousPlagiarismReport[0]->file_path))
            {
                // 1. possibility
                //Storage::delete($previousProposalSummary[0]->file_path);
                // 2. possibility
                unlink(storage_path($previousPlagiarismReport[0]->file_path));
            }

            // Proposal Summary File Name & Path
            $proposalSummaryFileName = $user_name . '_' . time() . '_' . 'proposalsummary.' . $request->file('proposal_summary')->extension();
            $proposalSummaryFilePath = $request->file('proposal_summary')->storeAs('proposal_summaries', $proposalSummaryFileName, 'public');

            // Plagiarism Report File Name & Path
            $plagiarismReportFileName = $user_name . '_' . time() . '_' . 'plagiarismreport.' . $request->file('plagiarism_report')->extension();
            $plagiarismReportFilePath = $request->file('plagiarism_report')->storeAs('plagiarism_reports', $plagiarismReportFileName, 'public');

            $current_date_time = \Carbon\Carbon::now()->toDateTimeString();

            // Final Proposal File Name & Path
            $finalProposalFileName = $user_name . '_' . time() . '_' . 'finalproposal.' . $request->file('final_proposal')->extension();
            $finalProposalFilePath = $request->file('final_proposal')->storeAs('final_proposals', $finalProposalFileName, 'public');

            // Update Proposal Summaries Table With The New File Information
            $proposalSummariesData=array('user_id'=>$user_id, 'file_name'=> $proposalSummaryFileName, 'file_path' => '/storage/' . $proposalSummaryFilePath, 'updated_at' => $current_date_time);
            DB::table('proposal_summaries')->where('user_id', $user_id)->update($proposalSummariesData);

            // Update Plagiarism Reports Table With The New File Information
            $plagiarismReportsData=array('user_id'=>$user_id, 'file_name'=> $plagiarismReportFileName, 'file_path' => '/storage/' . $plagiarismReportFilePath, 'updated_at' => $current_date_time);
            DB::table('plagiarism_reports')->where('user_id', $user_id)->update($plagiarismReportsData);

            // Update Final Proposals Table With The New File Information
            $finalProposalsData=array('user_id'=>$user_id, 'file_name'=> $finalProposalFileName, 'file_path' => '/storage/' . $finalProposalFilePath, 'updated_at' => $current_date_time);
            DB::table('final_proposals')->where('user_id', $user_id)->update($finalProposalsData);

            // Get The Student's Current Number Of Attempts And Add One To That Value
            $attempts = DB::table('proposal_status')->select('attempts')->where('student_id', $user_id)->get();
            $newAttempts = $attempts[0]->attempts + 1;

            $data=array('student_id'=>$user_id, "attempts"=>$newAttempts, 'status'=> 'Submitted');
            DB::table('proposal_status')->where('student_id', $user_id)->update($data);

            return response()->json(['success' => 'Supervisor Successfully Created.']);
        } else {
            // Return Error Messages
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function resubmitHDCProposalDocuments(Request $request)
    {
        // Validate Files
        $validator = Validator::make($request->all(), [
            'proposal_summary' => 'required|mimes:pdf,doc,docx|max:2048', 
            'corrections_report' => 'required|mimes:pdf,doc,docx|max:2048',
            'final_proposal' => 'required|mimes:pdf,doc,docx|max:2048'
        ]);

        // If Validation Is Successful
        if (!$validator->fails()) {

            // Get Current Logged In User's ID & name
            $user_id = Auth::user()->id;
            $user_name = Auth::user()->name;

            // Find This User's Previously Submitted Documents
            $previousCorrectionsReport = DB::table('corrections_reports')->where('user_id', $user_id)->get();
            $previousFinalProposal = DB::table('final_proposals')->where('user_id', $user_id)->get();
            $previousProposalSummary = DB::table('proposal_summaries')->where('user_id', $user_id)->get();

            // Delete These Previous Files From Storage
            if(is_file($previousProposalSummary[0]->file_path))
            {
                // 1. possibility
                //Storage::delete($previousProposalSummary[0]->file_path);
                // 2. possibility
                unlink(storage_path($previousProposalSummary[0]->file_path));
            }

            if(is_file($previousFinalProposal[0]->file_path))
            {
                // 1. possibility
                //Storage::delete($previousFinalProposal[0]->file_path);
                // 2. possibility
                unlink(storage_path($previousFinalProposal[0]->file_path));
            }

            // if(is_file($previousCorrectionsReport[0]->file_path))
            // {
            //     // 1. possibility
            //     //Storage::delete($previousProposalSummary[0]->file_path);
            //     // 2. possibility
            //     unlink(storage_path($previousCorrectionsReport[0]->file_path));
            // }

            // Proposal Summary File Name & Path
            $proposalSummaryFileName = $user_name . '_' . time() . '_' . 'proposalsummary.' . $request->file('proposal_summary')->extension();
            $proposalSummaryFilePath = $request->file('proposal_summary')->storeAs('proposal_summaries', $proposalSummaryFileName, 'public');

            // Plagiarism Report File Name & Path
            $correctionsReportFileName = $user_name . '_' . time() . '_' . 'correctionsreport.' . $request->file('corrections_report')->extension();
            $correctionsReportFilePath = $request->file('corrections_report')->storeAs('corrections_reports', $correctionsReportFileName, 'public');

            $current_date_time = \Carbon\Carbon::now()->toDateTimeString();

            // Final Proposal File Name & Path
            $finalProposalFileName = $user_name . '_' . time() . '_' . 'finalproposal.' . $request->file('final_proposal')->extension();
            $finalProposalFilePath = $request->file('final_proposal')->storeAs('final_proposals', $finalProposalFileName, 'public');

            // Update Proposal Summaries Table With The New File Information
            $proposalSummariesData=array('user_id'=>$user_id, 'file_name'=> $proposalSummaryFileName, 'file_path' => '/storage/' . $proposalSummaryFilePath, 'updated_at' => $current_date_time);
            DB::table('proposal_summaries')->where('user_id', $user_id)->update($proposalSummariesData);

            // Update Plagiarism Reports Table With The New File Information
            if ($previousCorrectionsReport->isEmpty()) {
                CorrectionsReport::create([
                    'user_id' => $user_id,
                    'file_name' => $correctionsReportFileName,
                    'file_path' => '/storage' . $correctionsReportFilePath,
                    'updated_at' => $current_date_time
                ]);
            } else {
                $correctionsReportsData=array('user_id'=>$user_id, 'file_name'=> $correctionsReportFileName, 'file_path' => '/storage/' . $correctionsReportFilePath, 'updated_at' => $current_date_time);
                DB::table('corrections_reports')->where('user_id', $user_id)->update($correctionsReportsData);
            }

            // Update Final Proposals Table With The New File Information
            $finalProposalsData=array('user_id'=>$user_id, 'file_name'=> $finalProposalFileName, 'file_path' => '/storage/' . $finalProposalFilePath, 'updated_at' => $current_date_time);
            DB::table('final_proposals')->where('user_id', $user_id)->update($finalProposalsData);

            // Get The Student's Current Number Of Attempts And Add One To That Value
            $attempts = DB::table('proposal_status')->select('attempts')->where('student_id', $user_id)->get();
            $newAttempts = $attempts[0]->attempts + 1;

            $data=array('student_id'=>$user_id, "attempts"=>$newAttempts, 'status'=> 'Proposal Corrections Submitted');
            DB::table('proposal_status')->where('student_id', $user_id)->update($data);

            return response()->json(['success' => 'Supervisor Successfully Created.']);
        } else {
            // Return Error Messages
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function resubmitThesisDocuments(Request $request)
    {
        // Validate Files
        $validator = Validator::make($request->all(), [
            'thesis_abstract' => 'required|mimes:pdf,doc,docx|max:2048',
            'final_thesis' => 'required|mimes:pdf,doc,docx|max:2048'
        ]);

        // If Validation Is Successful
        if (!$validator->fails()) {

            // Get Current Logged In User's ID & name
            $user_id = Auth::user()->id;
            $user_name = Auth::user()->name;

            // Find This User's Previously Submitted Documents
            $previousThesisAbstract = DB::table('thesis_abstracts')->where('user_id', $user_id)->get();
            $previousFinalThesis = DB::table('final_thesis')->where('user_id', $user_id)->get();

            // Delete These Previous Files From Storage
            if(is_file($previousThesisAbstract[0]->file_path))
            {
                // 1. possibility
                //Storage::delete($previousProposalSummary[0]->file_path);
                // 2. possibility
                unlink(storage_path($previousThesisAbstract[0]->file_path));
            }

            if(is_file($previousFinalThesis[0]->file_path))
            {
                // 1. possibility
                //Storage::delete($previousProposalSummary[0]->file_path);
                // 2. possibility
                unlink(storage_path($previousFinalThesis[0]->file_path));
            }

            // Plagiarism Report File Name & Path
            $thesisAbstractFileName = $user_name . '_' . time() . '_' . 'thesisabstract.' . $request->file('thesis_abstract')->extension();
            $thesisAbstractFilePath = $request->file('thesis_abstract')->storeAs('thesis_abstracts', $thesisAbstractFileName, 'public');

            // Final Thesis File Name & Path
            $finalThesisFileName = $user_name . '_' . time() . '_' . 'finalthesis.' . $request->file('final_thesis')->extension();
            $finalThesisFilePath = $request->file('final_thesis')->storeAs('final_thesis', $finalThesisFileName, 'public');

            $current_date_time = \Carbon\Carbon::now()->toDateTimeString();

            // Update Plagiarism Reports Table With The New File Information
            $thesisAbstractData=array('user_id'=>$user_id, 'file_name'=> $thesisAbstractFileName, 'file_path' => '/storage/' . $thesisAbstractFilePath, 'updated_at' => $current_date_time);
            DB::table('thesis_abstracts')->where('user_id', $user_id)->update($thesisAbstractData);

            // Update Final Proposals Table With The New File Information
            $finalThesisData=array('user_id'=>$user_id, 'file_name'=> $finalThesisFileName, 'file_path' => '/storage/' . $finalThesisFilePath, 'updated_at' => $current_date_time);
            DB::table('final_thesis')->where('user_id', $user_id)->update($finalThesisData);

            // Get The Student's Current Number Of Attempts And Add One To That Value
            $attempts = DB::table('thesis_status')->select('attempts')->where('student_id', $user_id)->get();
            $newAttempts = $attempts[0]->attempts + 1;

            $data=array('student_id'=>$user_id, "attempts"=>$newAttempts, 'status'=> 'Submitted');
            DB::table('thesis_status')->where('student_id', $user_id)->update($data);

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
            'thesis_abstract' => 'required|mimes:pdf,doc,docx|max:2048',
            'intention_to_submit' => 'required|mimes:pdf,doc,docx|max:2048',
            'final_thesis' => 'required|mimes:pdf,doc,docx|max:2048'
        ]);

        // If Validation Is Successful
        if (!$validator->fails()) {

            // Get Current Logged In User's ID & name
            $user_id = Auth::user()->id;
            $user_name = Auth::user()->name;

            // Intention To Submit File Name & Path
            $intentionFileName = $user_name . '_' . time() . '_' . 'intention_to_submit.' . $request->file('intention_to_submit')->extension();
            $intentionFilePath = $request->file('intention_to_submit')->storeAs('intentions', $intentionFileName, 'public');

            // Plagiarism Report File Name & Path
            $thesisAbstractFileName = $user_name . '_' . time() . '_' . 'thesisabstract.' . $request->file('thesis_abstract')->extension();
            $thesisAbstractFilePath = $request->file('thesis_abstract')->storeAs('thesis_abstracts', $thesisAbstractFileName, 'public');

            // Final Proposal File Name & Path
            $finalThesisFileName = $user_name . '_' . time() . '_' . 'finalthesis.' . $request->file('final_thesis')->extension();
            $finalThesisFilePath = $request->file('final_thesis')->storeAs('final_thesis', $finalThesisFileName, 'public');

            // Add The Proposal Summary To It's Respective Table
           thesisAbstract::create([
                'user_id' => $user_id,
                'file_name' => $thesisAbstractFileName,
                'file_path' => '/storage/' . $thesisAbstractFilePath
            ]);

            // Add The Plagiarism Report To It's Respective Table
            intentionToSubmit::create([
                'user_id' => $user_id,
                'file_name' => $intentionFileName,
                'file_path' => '/storage/' . $intentionFilePath
            ]);

            // Add The Final Proposal To It's Respective Table
            FinalThesis::create([
                'user_id' => $user_id,
                'file_name' => $finalThesisFileName,
                'file_path' => '/storage/' . $finalThesisFilePath
            ]);

            $data=array('student_id'=>$user_id, 'status'=> 'Submitted', 'attempts'=> 1);
            DB::table('thesis_status')->insert($data);

            return response()->json(['success' => 'Supervisor Successfully Created.']);
        } else {
            // Return Error Messages
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function submitThesisCorrection(Request $request)
    {
        // Validate Files
        $validator = Validator::make($request->all(), [
            'corrections_report' => 'required|mimes:pdf,doc,docx|max:2048',
            'final_thesis' => 'required|mimes:pdf,doc,docx|max:2048'
        ]);

        if (!$validator->fails()) {
            // Get Current Logged In User's ID & name
            $user_id = Auth::user()->id;
            $user_name = Auth::user()->name;

            // Check If Student Has Previously Submitted Documents
            $previousCorrectionsReport = DB::table('corrections_reports')->where('user_id', $user_id)->first();

            if ($previousCorrectionsReport) {
                $previousFinalThesis = DB::table('final_thesis')->where('user_id', $user_id)->first();

                // Delete Previously Uploaded Files
                if(is_file($previousFinalThesis->file_path)) {
                    unlink(storage_path($previousFinalThesis->file_path));
                }

                if(is_file($previousCorrectionsReport->file_path)) {
                    unlink(storage_path($previousCorrectionsReport->file_path));
                }

                // Intention To Submit File Name & Path
                $correctionsReportFileName = $user_name . '_' . time() . '_' . 'corrections_report.' . $request->file('corrections_report')->extension();
                $correctionsReportFilePath = $request->file('corrections_report')->storeAs('corrections_reports', $correctionsReportFileName, 'public');

                // Final Proposal File Name & Path
                $finalThesisFileName = $user_name . '_' . time() . '_' . 'finalthesis.' . $request->file('final_thesis')->extension();
                $finalThesisFilePath = $request->file('final_thesis')->storeAs('final_thesis', $finalThesisFileName, 'public');

                $current_date_time = \Carbon\Carbon::now()->toDateTimeString();

                // Update Final Thesis Table With The New File Information
                $finalThesisData=array('user_id'=>$user_id, 'file_name'=> $finalThesisFileName, 'file_path' => '/storage/' . $finalThesisFilePath, 'updated_at' => $current_date_time);
                DB::table('final_thesis')->where('user_id', $user_id)->update($finalThesisData);

                // Update Corrections Report Table With The New File Information
                $correctionsReportData=array('user_id'=>$user_id, 'file_name'=> $correctionsReportFileName, 'file_path' => '/storage/' . $correctionsReportFilePath, 'updated_at' => $current_date_time);
                DB::table('corrections_reports')->where('user_id', $user_id)->update($correctionsReportData);

                // Get The Student's Current Number Of Attempts And Add One To That Value
                $attempts = DB::table('thesis_status')->select('attempts')->where('student_id', $user_id)->get();
                $newAttempts = $attempts[0]->attempts + 1;

                $data=array('student_id'=>$user_id, "attempts"=>$newAttempts, 'status'=> 'Thesis Correction Resubmitted');
                DB::table('thesis_status')->where('student_id', $user_id)->update($data);

                return response()->json(['success' => 'Supervisor Successfully Created.']);
            } else {
                // Student Has Never Submitted Corrections Report Before

                // Get Current Logged In User's ID & name
                $user_id = Auth::user()->id;
                $user_name = Auth::user()->name;

                // Intention To Submit File Name & Path
                $correctionsReportFileName = $user_name . '_' . time() . '_' . 'corrections_report.' . $request->file('corrections_report')->extension();
                $correctionsReportFilePath = $request->file('corrections_report')->storeAs('corrections_reports', $correctionsReportFileName, 'public');

                // Final Proposal File Name & Path
                $finalThesisFileName = $user_name . '_' . time() . '_' . 'finalthesis.' . $request->file('final_thesis')->extension();
                $finalThesisFilePath = $request->file('final_thesis')->storeAs('final_thesis', $finalThesisFileName, 'public');

                $current_date_time = \Carbon\Carbon::now()->toDateTimeString();

                // Update The Final Proposal To It's Respective Table
                $finalThesisData=array('user_id'=>$user_id, 'file_name'=> $finalThesisFileName, 'file_path' => '/storage/' . $finalThesisFilePath, 'updated_at' => $current_date_time);
                DB::table('final_thesis')->where('user_id', $user_id)->update($finalThesisData);
                
                CorrectionsReport::create([
                    'user_id' => $user_id,
                    'file_name' => $correctionsReportFileName,
                    'file_path' => '/storage' . $correctionsReportFilePath,
                    'updated_at' => $current_date_time
                ]);

                // Get The Student's Current Number Of Attempts And Add One To That Value
                $attempts = DB::table('thesis_status')->select('attempts')->where('student_id', $user_id)->get();
                $newAttempts = $attempts[0]->attempts + 1;

                $data=array('student_id'=>$user_id, "attempts"=>$newAttempts, 'status'=> 'Thesis Correction Submitted');
                DB::table('thesis_status')->where('student_id', $user_id)->update($data);

                return response()->json(['success' => 'Supervisor Successfully Created.']);
            }
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
