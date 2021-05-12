<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('student')) {
            return redirect('/student');
        }

        if ($user->hasRole('supervisor')) {
            return redirect('/supervisor');
        }

        if ($user->hasRole('hod')) {
            return redirect('/hod');
        }

        if ($user->hasRole('fhdc')) {
            return redirect('/fhdc');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        $role = Auth::user()->user_type;
        switch ($role) {
            case 'Student':
                return '/student';
                break;
            case 'Supervisor':
                return '/supervisor';
                break;
            case 'HOD':
                return '/hod';
                break;

            default:
                return '/fhdc';
                break;
        }
    }
}
