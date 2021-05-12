<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* Show Different View Based On User Type
    public function index()
    {
        if (Auth::user()->hasRole('student')) {
            return view('student.index');
            return redirect()->route('route_name');
        } elseif (Auth::user()->hasRole('supervisor')) {
            return view('supervisor.index');
        } elseif (Auth::user()->hasRole('hod')) {
            return view('hod.index');
        } else {
            return view('fhdc.index');
        }
    } */
}
