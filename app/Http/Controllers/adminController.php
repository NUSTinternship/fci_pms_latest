<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class adminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index');
    } 

    // Return Create Users View
    public function create()
    {
        return view('admin.create');
    }

    // Store Created Students In The Database
    public function createStudent(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'user_type' => "Student"
        ]);
        
        // Attaching 'Student' Role To User
        $user->attachRole('Student');

        // Adding The User To The Student's Table
        $student = new Student;
        $student->user_id = $user->id;
        $student->program = $request->input('program');
        $student->department = $request->input('department');
        $student->save();

        return redirect('/admin/create');
    }
}
