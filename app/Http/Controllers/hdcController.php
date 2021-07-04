<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

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
            ->select('name', 'program', 'progress', 'department')
            ->where('program', 'Masters')
            ->where('department', 'Computer Science')
            ->get();
        
        $informaticsMastersStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('name', 'program', 'progress', 'department')
            ->where('program', 'Masters')
            ->where('department', 'Informatics')
            ->get();
        
        $compSciPhdStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('name', 'program', 'progress', 'department')
            ->where('program', 'Phd')
            ->where('department', 'Computer Science')
            ->get();
        
        $informaticsPhdStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('name', 'program', 'progress', 'department')
            ->where('program', 'Phd')
            ->where('department', 'Informatics')
            ->get();

        return view('fhdc.index', compact('compSciMastersStudents', 'informaticsMastersStudents', 'informaticsPhdStudents', 'compSciPhdStudents'));
    }

    public function proposal()
    {
        //
        return view('fhdc.proposal');
    }

    public function thesis()
    {
        //
        return view('fhdc.thesis');
    }

    public function application()
    {
        //
        return view('fhdc.application');
    }
}
