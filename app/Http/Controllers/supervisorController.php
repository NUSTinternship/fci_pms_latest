<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('supervisor.index');
    }

    public function proposal()
    {
        //
        return view('supervisor.proposal');
    }

    public function thesis()
    {
        //
        return view('supervisor.thesis');
    }
}
