<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::guard($guards)->check()) {
            $role = Auth::user()->user_type;
            switch ($role) {
                case 'Student':
                    return redirect('/student/home');
                    break;
                case 'Supervisor':
                    return redirect('/supervisor/home');
                    break;
                case 'HOD':
                    return redirect('/hod/home');
                    break;

                default:
                    return redirect('/fhdc/home');
                    break;
            }
        }
        return $next($request);
    }
}
