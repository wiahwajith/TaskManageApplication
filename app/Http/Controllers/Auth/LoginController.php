<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::HOME;


    public function redirectTo() 
    {
    $role = Auth::user()->role; 
        switch ($role) {
            case 'Super-Admin':
            case 'Admin':
                return '/admin'; //admin dashboard
            break;
            case 'Client':
                return '/client'; //client dashboard
            break; 
            case 'Project Manager':
            case 'Senior Engineer':
            case 'Business Analyst':
            case 'Developer':
            case 'Accountant':
            case 'HR Manager':
            case 'Data Engineer':
            case 'QA Engineer':
                return '/employee'; //employee dashboard
            break; 

            default:
                return '/home'; //to home 
            break;
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
}
