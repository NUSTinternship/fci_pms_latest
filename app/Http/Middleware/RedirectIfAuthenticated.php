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
                    return redirect('/student');
                    break;
                case 'Supervisor':
                    return redirect('/supervisor');
                    break;
                case 'HOD':
                    return redirect('/hod');
                    break;

                default:
                    return redirect('/fhdc');
                    break;
            }
        }
        return $next($request);
    }
}
