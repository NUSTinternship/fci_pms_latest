<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DownloadsController extends Controller
{
    // Function To Handle Document Downloading
    public function download($file_name)
    {
        $file_type = '';

        if (Str::contains($file_name, 'finalproposal')) {
            $file_type = 'final proposal';
        } elseif (Str::contains($file_name, 'plagiarismreport')) {
            $file_type = 'plagiarism report';
        } elseif (Str::contains($file_name, 'proposalsummary')) {
            $file_type = 'proposal summary';
        } elseif (Str::contains($file_name, 'thesisabstract')) {
            $file_type = 'thesis abstract';
        } elseif (Str::contains($file_name, 'intention')) {
            $file_type = 'intention to submit';
        } elseif (Str::contains($file_name, 'finalthesis')) {
            $file_type = 'final thesis';
        }

        switch ($file_type) {
            case 'final proposal':
                if (Storage::disk('public')->exists("final_proposals/" . $file_name)) {
                    $file_path = Storage::disk('public')->path("final_proposals/" . $file_name);
                    $content = file_get_contents($file_path);
                    return response($content)->withHeaders([
                        'Content-Type' => mime_content_type($file_path)
                    ]);
                }
                return abort(404);
                break;

            case 'plagiarism report':
                if (Storage::disk('public')->exists("plagiarism_reports/" . $file_name)) {
                    $file_path = Storage::disk('public')->path("plagiarism_reports/" . $file_name);
                    $content = file_get_contents($file_path);
                    return response($content)->withHeaders([
                        'Content-Type' => mime_content_type($file_path)
                    ]);
                }
                return abort(404);
                break;

            case 'proposal summary':
                if (Storage::disk('public')->exists("proposal_summaries/" . $file_name)) {
                    $file_path = Storage::disk('public')->path("proposal_summaries/" . $file_name);
                    $content = file_get_contents($file_path);
                    return response($content)->withHeaders([
                        'Content-Type' => mime_content_type($file_path)
                    ]);
                }
                return abort(404);
                break;

            case 'intention to submit':
                if (Storage::disk('public')->exists("intentions/" . $file_name)) {
                    $file_path = Storage::disk('public')->path("intentions/" . $file_name);
                    $content = file_get_contents($file_path);
                    return response($content)->withHeaders([
                        'Content-Type' => mime_content_type($file_path)
                    ]);
                }
                return abort(404);
                break;

            case 'thesis abstract':
                if (Storage::disk('public')->exists("thesis_abstracts/" . $file_name)) {
                    $file_path = Storage::disk('public')->path("thesis_abstracts/" . $file_name);
                    $content = file_get_contents($file_path);
                    return response($content)->withHeaders([
                        'Content-Type' => mime_content_type($file_path)
                    ]);
                }
                return abort(404);
                break;
            
            case 'final thesis':
                if (Storage::disk('public')->exists("final_thesis/" . $file_name)) {
                    $file_path = Storage::disk('public')->path("final_thesis/" . $file_name);
                    $content = file_get_contents($file_path);
                    return response($content)->withHeaders([
                        'Content-Type' => mime_content_type($file_path)
                    ]);
                }
                return abort(404);
                break;

            default:
                # code...
                break;
        }
    }
}
