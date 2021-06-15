<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Post;
use App\Models\HOD;
use App\Models\Hod as ModelsHod;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Facade\FlareClient\Http\Response;
use Hod as GlobalHod;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all()->count();
        $students = Student::all()->count();
        $supervisors = Supervisor::all()->count();
        return view('admin.index', compact('users', 'students', 'supervisors'));
    }

    // Return Edit User View
    public function edit($id, Request $request)
    {
        $user = User::findorFail($id);
        $student = DB::table('students')->where('user_id', $id)->first();
        return view('admin.edit', compact('user', 'student'));
    }

    // Save User Updates To Database
    public function editUser($id, Request $request)
    {
        // Find User To Edit In Database
        $user = User::find($id);

        // Find The User In The Student Table
        if ($user->user_type == "Student") {
            $student = Student::where('user_id', $id)->first();
        }

        // Only Validate Email If It Has Been Altered
        if (!strcmp($user->email, $request->input('email')) == 0) {
            $request->validate([
                'email' => 'email|unique:users,email,except,id'
            ]);
        }

        $request->validate([
            'name' => 'string|max:255',
            'program' => 'string',
            'department' => 'string',
        ]);

        // Saving New User Information
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->update();

        // Saving New Student Information
        $student->department = $request->input('department');
        $student->program = $request->input('program');
        $student->update();

        return back()->with('success', 'User Settings Successfully Changed');
    }

    public function editPassword($id, Request $request)
    {
        // Find User To Edit In Database
        $user = User::find($id);

        $current_password = $request->input('current_password');
        $new_password = $request->input('new_password');

        // Check If Password In Database Is Same As Current Password
        if (!(Hash::check($current_password, $user->password))) {
            return back()->with('error', 'Your Current Password Does Not Match With What You Provided');
        }

        // Check If Proposed New Password Is The Same As The Current One
        if (strcmp($current_password, $new_password) == 0) {
            return back()->with('error', 'Your New Password Cannot Be The Same As Your Current Password');
        }

        // Validate Input
        $request->validate([
            'new_password' => 'required|string|min:8|same:password_confirmation',
        ]);

        // Hash The New Password Before Saving It
        $new_password = Hash::make($request->input('new_password'));

        // Save New Password To Database
        $user->password = $new_password;
        $user->update();

        return back()->with('message', 'Password Has Been Changed Successfully');
    }

    // Return Create Users View
    public function users(Request $request)
    {
        $users = User::paginate(5);
        return view('admin.create', compact('users'));
    }

    public function action(Request $request)
    {
        // Check Whether AJAX Call/Request Is Received
        if ($request->ajax()) {
            $query = $request->get('search');

            if ($query != '') {
                $output = '';

                $data = DB::table('users')
                    ->where('name', 'LIKE', '%' . $query . "%")
                    ->orWhere('user_type', 'LIKE', '%' . $query . '%')
                    ->get();
            } else {
                $data = DB::table('users')->where('name', 'LIKE', ' ')->get();
            }

            $results = $data->count();

            if ($results > 0) {
                foreach ($data as $key => $row) {
                    $output .= '
                        <tr>
                            <td>' . $row->name . '</td>
                            <td>' . $row->user_type . '</td>
                            <td>
                                <a href="/admin/edit/' . $row->id . '" class="btn btn-success btn-sm style="border-radius: 25px;"">
                                    <i class="fa fa-pencil-alt"></i>
                                    EDIT
                                </a>
                            </td>
                            <td>
                                <a href="/admin/delete/{{ ' . $row->id . ' }}" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                    DELETE
                                </a>
                            </td>
                        </tr>
                    ';
                }
            } else {
                $output .= '
                <tr>
                    <td align="center" colspan="4" class="text-danger">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true" class="text-danger"></i>
                        No Users Found
                    </td>
                </tr>
            ';
            }

            return Response($output);
        }
    }

    // Store Created Students In The Database
    public function createStudent(Request $request)
    {
        // Validating Form Inputs
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,except,id',
            'password' => 'required|string|min:8|confirmed',
            'department' => 'required|string',
            'program' => 'required|string'
        ]);

        // If Validation Is Successful
        if (!$validator->fails()) {
            // Creating User    
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

            return response()->json(['success' => 'Student Successfully Created.']);
        } else {
            // Return Error Messages
            return response()->json(['error' => $validator->errors()->all()]);
        }

        // return redirect('/admin/create')->with('student_created', 'Student Created Successfully');
    }

    // Store Created Supervisors In The Database
    public function createSupervisor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,except,id',
            'password' => 'required|string|min:8|confirmed',
            'office' => 'required|string',
            'phone' => 'required|regex:/^\+26461[0-9]{7}$/|min:13|max:13',
            'department' => 'required|string'
        ]);

        // If Validation Is Successful
        if (!$validator->fails()) {

            // Creating User    
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'user_type' => "Supervisor"
            ]);

            // Attaching 'Student' Role To User
            $user->attachRole('Supervisor');

            // Adding The User To The Student's Table
            $supervisor = new Supervisor;
            $supervisor->user_id = $user->id;
            $supervisor->office = $request->input('office');
            $supervisor->phone = $request->input('phone');
            $supervisor->department = $request->input('department');
            $supervisor->save();

            return response()->json(['success' => 'Supervisor Successfully Created.']);
        } else {
            // Return Error Messages
            return response()->json(['error' => $validator->errors()->all()]);
        }

        // return redirect('/admin/create')->with('supervisor', 'Supervisor Created Successfully.');
    }

    // Store Created Supervisors In The Database
    public function createHOD(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,except,id',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // If Validation Is Successful
        if (!$validator->fails()) {

            // Creating User    
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'user_type' => "HOD"
            ]);

            $hod = Hod::create([
                'user_id' => 1,
            ]);

            // Attaching 'HOD' Role To User
            $user->attachRole('HOD');

            // Adding The User To The HOD Table
            $hod = new Hod();
            $hod->user_id = $user->id;
            $hod->save();

            return response()->json(['success' => 'HOD Successfully Created.']);
        } else {
            // Return Error Messages
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }
}
