<?php

namespace App\Http\Controllers\Auth\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    public function showLoginForm()
    {
        return view('auth.pengajar.login');
    }
    protected function guard()
    {
        return Auth::guard('web_user');
    }
    public function logout(Request $request)
    {
        $this->guard('web_user')->logout();

        $request->session()->invalidate();

        return redirect('/diskusi');
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    private $redirectTo = '/diskusi';

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
