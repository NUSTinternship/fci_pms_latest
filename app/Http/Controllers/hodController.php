<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        //
        return view('hod.index');
    }

    public function proposal()
    {
        //
        return view('hod.proposal');
    }

    public function thesis()
    {
        //
        return view('hod.thesis');
    }
}
