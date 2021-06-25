<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    // Function To Handle Document Downloading
    public function download($file_name, $file_type)
    {
        switch ($file_type) {
            case 'final_proposal':
                $file_path = public_path('final_proposals/' . $file_name);
                return response()->download($file_path);
                break;
            case 'plagiarism_report':
                $file_path = public_path('plagiarism_reports/' . $file_name);
                return response()->download($file_path);
                break;
            
            case 'proposal_summary':
                $file_path = public_path('proposal_summaries/' . $file_name);
                return response()->download($file_path);
                break;

            default:
                # code...
                break;
        }
    }
}
