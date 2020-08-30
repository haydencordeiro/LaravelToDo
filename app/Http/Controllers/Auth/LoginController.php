<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    public function redirectTo(){
        
        // User role
        // $role = Auth::user()->role->name; 
        
        // // Check user role
        // switch ($role) {
        //     case 'Manager':
        //             return '/dashboard';
        //         break;
        //     case 'Employee':
        //             return '/projects';
        //         break; 
        //     default:
        //             return '/login'; 
        //         break;
        // }
        return '/list';
    }
    protected function loggedOut(Request $request) {
        return redirect('/register');
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
