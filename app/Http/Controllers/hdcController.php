<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        //
        return view('fhdc.index');
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
