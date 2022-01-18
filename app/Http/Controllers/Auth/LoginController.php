<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;
use RealRashid\SweetAlert\Toaster;



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
    protected $redirectTo = RouteServiceProvider::HOME;

    private $toaster;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    protected function authenticated(Request $request, $user)
    {

        $credentials = $request->only('email', 'password');

        $this->validate($request,[

             'email'=>['unique:users'],
              'password'=>['min:8']
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->flash('name', Auth::user()->firstname);
            return redirect()->intended('/dashboard/home');
        }

            return redirect()->back('302');

    }

    protected function loggedOut(Request $request)
    {
        $request->session()->flash('flash', 'Logged out successfully');
        return redirect()->route('login');
    }
}
