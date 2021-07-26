<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
use App\Models\User;
use App\Models\Supervisor;

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

    public function allStudents()
    {
        //
        // Get Students To Display On FHDC Index Page
        $mastersStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('name', 'program', 'progress', 'department')
            ->where('program', 'Masters')
            ->get();

        $phdStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('name', 'program', 'progress', 'department')
            ->where('program', 'PhD')
            ->get();

        return view('fhdc.allStudents', compact('mastersStudents', 'phdStudents'));
    }

    public function proposal()
    {
        //
        $mastersProposalStudents = DB::table('students')
            ->select('id', 'user_id')
            ->where('progress', 'Proposal')
            ->where('program', 'Masters')
            ->get();

        $phdProposalStudents = DB::table('students')
            ->select('id', 'user_id')
            ->where('progress', 'Proposal')
            ->where('program', 'PhD')
            ->get();

        return view('fhdc.proposal', compact('mastersProposalStudents', 'phdProposalStudents'));
    }

    public function thesis()
    {
        //
        $mastersThesisStudents = DB::table('students')
            ->select('id', 'user_id')
            ->where('progress', 'Thesis')
            ->where('program', 'Masters')
            ->get();

        $phdThesisStudents = DB::table('students')
            ->select('id', 'user_id')
            ->where('progress', 'Thesis')
            ->where('program', 'PhD')
            ->get();
    
        return view('fhdc.thesis', compact('mastersThesisStudents', 'phdThesisStudents'));
    }

    public function application()
    {
        //
        // Get Students To Display On FHDC Index Page
        // $compSciMastersStudents = DB::table('users')
        //     ->join('students', 'students.user_id', '=', 'users.id')
        //     ->join('supervisors', 'students.supervisor_id', '=', 'supervisors.id')
        //     ->select('students.user_id', 'name', 'program', 'supervisor_id', 'co_supervisor_id', 'students.department')
        //     ->where('program', 'Masters')
        //     ->where('students.department', 'Computer Science')
        //     ->get();

        $compSciMastersStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('users.id', 'user_id', 'name', 'program', 'department', 'supervisor_id', 'co_supervisor_id')
            ->where('program', 'Masters')
            ->where('department', 'Computer Science')
            ->get();

        $informaticsMastersStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('users.id', 'user_id', 'name', 'program', 'supervisor_id', 'co_supervisor_id', 'department')
            ->where('program', 'Masters')
            ->where('department', 'Informatics')
            ->get();

        $compSciPhdStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('users.id', 'user_id', 'name', 'program', 'supervisor_id', 'co_supervisor_id', 'department')
            ->where('program', 'Phd')
            ->where('department', 'Computer Science')
            ->get();

        $informaticsPhdStudents = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')
            ->select('users.id', 'user_id', 'name', 'program', 'supervisor_id', 'co_supervisor_id', 'department')
            ->where('program', 'PhD')
            ->where('department', 'Informatics')
            ->get();

        $supervisors = DB::table('students')->selectRaw('supervisor_id, COUNT(*) as count')->where('supervisor_id', '!=', null)->groupBy('supervisor_id')->pluck('count', 'supervisor_id');
        $allSupervisors = DB::table('supervisors')->select('id')->pluck('id');
        //dd($supervisors);

        $supervisorsWithLoadIDs = array();
        foreach ($supervisors as $key => $value) {
            $supervisorsWithLoadIDs[] = $key;
        }

        $allSupervisorsIDs = array();
        foreach ($allSupervisors as $key => $value) {
            $allSupervisorsIDs[] = $value;
        }

        $supervisorsWithNoLoad = array();
        foreach ($allSupervisorsIDs as $value) {
            if (!in_array($value, $supervisorsWithLoadIDs)) {
                $supervisorsWithNoLoad[] = $value;
            }
        }

        //dd($supervisors, $supervisorsWithNoLoad);

        $users = DB::table('users')
            ->where('user_type', '=', 'Supervisor')
            ->select('id', 'name')
            ->get();

        //dd($users);

        return view('fhdc.application', compact('compSciMastersStudents', 'informaticsMastersStudents', 'informaticsPhdStudents', 'compSciPhdStudents', 'users', 'supervisors', 'supervisorsWithNoLoad'));
    }

    public function addSupervisor(Request $request)
    {
        // Validate Form Input
        $validator = Validator::make($request->all(), [
            'selected' => 'required',
            'student_id' => 'required',
        ]);

        if (!$validator->fails()) {

            $user_id = $request->input('selected');
            $id = DB::table('supervisors')->where('user_id', $user_id)->get('id');

            // How I Will Implement Assigning Evaluators
            // switch ($user->user_type) {
            //     case 'Supervisor':
            //         $id = DB::table('supervisors')->where('user_id', $user_id)->get('id');
            //         break;
            //     case 'HOD':
            //         $id = DB::table('hods')->where('user_id', $user_id)->get('id');
            //         break;
            //     default:
            //         $id = DB::table('fhdc')->where('user_id', $user_id)->get('id');
            //         break;
            // }

            DB::table('students')
                ->where('user_id', $request->input('student_id'))
                ->update(['supervisor_id' => $id[0]->id]);

            return response()->json(['success' => 'FHDC Successfully Created.']);
        } else {
            // Return Error Messages
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function addCoSupervisor(Request $request)
    {
        // Validate Form Input
        $validator = Validator::make($request->all(), [
            'selected' => 'required',
            'student_id' => 'required',
        ]);

        if (!$validator->fails()) {

            $user_id = $request->input('selected');
            $id = DB::table('supervisors')->where('user_id', $user_id)->get('id');

            // How I Will Implement Assigning Evaluators
            // switch ($user->user_type) {
            //     case 'Supervisor':
            //         $id = DB::table('supervisors')->where('user_id', $user_id)->get('id');
            //         break;
            //     case 'HOD':
            //         $id = DB::table('hods')->where('user_id', $user_id)->get('id');
            //         break;
            //     default:
            //         $id = DB::table('fhdc')->where('user_id', $user_id)->get('id');
            //         break;
            // }

            DB::table('students')
                ->where('user_id', $request->input('student_id'))
                ->update(['co_supervisor_id' => $id[0]->id]);

            return response()->json(['success' => 'FHDC Successfully Created.']);
        } else {
            // Return Error Messages
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function studentProfile($id)
    {
        $user = User::find($id);
        $student = DB::table('students')->where('user_id', $id)->get();
        $users = DB::table('users')
            ->where('user_type', '=', 'Supervisor')
            ->select('id', 'name')
            ->get();
        return view('fhdc.studentProfile', compact('user', 'student', 'users'));
    }
}
