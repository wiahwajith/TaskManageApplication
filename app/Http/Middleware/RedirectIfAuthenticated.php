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
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {

            if (Auth::guard($guard)->check()) {
                //add different page for different roles
                $role =Auth::user()->roleName;
                
                switch ($role) {
                    case 'Super-Admin':
                    case 'Admin':
                        return redirect()->route('admin.dashboard'); //admin dashboard
                    break;
                    case 'Client':
                        return redirect()->route('client.dashboard');//client dashboard
                    break; 
                    case 'Project Manager':
                    case 'Senior Engineer':
                    case 'Business Analyst':
                    case 'Developer':
                    case 'Accountant':
                    case 'HR Manager':
                    case 'Data Engineer':
                    case 'QA Engineer':
                        return redirect()->route('emp.dashboard'); //employee dashboard
                    break; 
                    default:
                        return '/home'; //to home 
                    break;
                }
            }
        }

        return $next($request);
    }
}
