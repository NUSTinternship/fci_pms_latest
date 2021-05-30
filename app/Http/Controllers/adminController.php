<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Post;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Supervisor;
use App\Models\User;
use Facade\FlareClient\Http\Response;
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
        return view('admin.index');
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
        if ($request->ajax()){
            $query = $request->get('search');

            if ($query != '') {
                $output = '';

                $data = DB::table('users')
                ->where('name','LIKE','%'.$query."%")
                ->orWhere('user_type', 'LIKE', '%'.$query.'%')
                ->get();
            } else {
                $data = DB::table('users')->where('name', 'LIKE', ' ')->get();
            }

            $results = $data->count();

            if ($results > 0) {
                foreach ($data as $key => $row) {
                    $output .= '
                        <tr>
                            <td>'.$row->name.'</td>
                            <td>'.$row->user_type.'</td>
                            <td>
                                <a href="/admin/edit/'.$row->id.'" class="btn btn-success btn-sm style="border-radius: 25px;"">
                                    <i class="fa fa-pencil-alt"></i>
                                    EDIT
                                </a>
                            </td>
                            <td>
                                <a href="/admin/delete/{{ '.$row->id.' }}" class="btn btn-danger btn-sm">
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
                    <td align="center" colspan="4">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                        No Users Found
                    </td>
                </tr>
            ';
            }

            return Response($output);
        }
        // if ($request->ajax()) {
        //     $output = '';
        //     $query = $request->get('search');

        //     $data = DB::table('users')
        //         ->where('name','LIKE','%'.$query."%")
        //         ->orWhere('user_type', 'LIKE', '%'.$query.'%')
        //         ->get();

        //     if ($data) {
        //         foreach ($data as $key => $row) {
        //             $output = '
        //                 <tr>
        //                     <td>'.$row->name.'</td>
        //                     <td>'.$row->user_type.'</td>
        //                     <td>
        //                         <a href="/admin/edit/{{ '.$row->id.' }}" class="btn btn-success">
        //                             <i class="fa fa-pencil-alt"></i>
        //                             EDIT
        //                         </a>
        //                     </td>
        //                     <td>
        //                         <a href="/admin/delete/{{ '.$row->id.' }}" class="btn btn-danger">
        //                             <i class="fa fa-trash"></i>
        //                             DELETE
        //                         </a>
        //                     </td>
        //                 </tr>
        //             ';
        //         }
        //     } else {
        //         $output = '
        //         <tr>
        //             <td align="center" colspan="4">
        //                 <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
        //                 No Users Found
        //             </td>
        //         </tr>
        //     ';
        //     }

            // if ($query != '') {
            //     $data = DB::table('users')
            //     ->where('name','LIKE','%'.$query."%")
            //     ->orWhere('user_type', 'LIKE', '%'.$query.'%')
            //     ->get();
            // } else {
            //     $data = User::paginate(5);
            // }

            // $results = $data->count();

            // if ($results > 0) {
            //     foreach ($data as $row) {
            //         $output .= '
            //             <tr>
            //                 <td>'.$row->name.'</td>
            //                 <td>'.$row->user_type.'</td>
            //                 <td>
            //                     <a href="/admin/edit/{{ '.$row->id.' }}" class="btn btn-success">
            //                         <i class="fa fa-pencil-alt"></i>
            //                         EDIT
            //                     </a>
            //                 </td>
            //                 <td>
            //                     <a href="/admin/delete/{{ '.$row->id.' }}" class="btn btn-danger">
            //                         <i class="fa fa-trash"></i>
            //                         DELETE
            //                     </a>
            //                 </td>
            //             </tr>
            //         ';
            //     }
            // } else {
            //     $output .= '
            //         <tr>
            //             <td align="center" colspan="4">
            //                 <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            //                 No Users Found
            //             </td>
            //         </tr>
            //     ';
            // }
            // return Response($output);
        }

    

    // Store Created Students In The Database
    public function createStudent(Request $request)
    {
        // Validating Form Input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,except,id',
            'password' => 'required|string|min:8|confirmed',
            'program' => 'required|string',
            'department' => 'required|string'
         ]);

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

        return redirect('/admin/create');
    }

    // Store Created Supervisors In The Database
    public function createSupervisor(Request $request)
    {
        // Validating Form Input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,except,id',
            'password' => 'required|string|min:8|confirmed',
            'office' => 'required|string',
            'phone' => 'required|regex:/^\+26461[0-9]{7}$/|min:13|max:13',
            'department' => 'required|string'
         ]);

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

        return redirect('/admin/create')->with('success', 'Supervisor Created Successfully.');
    }
}
