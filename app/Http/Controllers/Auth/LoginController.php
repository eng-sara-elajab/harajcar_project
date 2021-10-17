<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){
        $website_data = Setting::find(1);

        if($website_data->language == 0)
            return view('auth.arabic.login', compact('website_data'));
        else
            return view('auth.english.login', compact('website_data'));
    }

    public function login(Request $request){
        $email = $request->email;
        $credentials = $request->only('email', 'password');
        $website_data = Setting::find(1);

        // if success login
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        // if failed login
        if($website_data->language == 0)
            return view('auth.arabic.login')->with('email', $email)->with('website_data', $website_data)->withErrors(['These credentials do not match our records.']);
        else
            return view('auth.english.login')->with('email', $email)->with('website_data', $website_data)->withErrors(['These credentials do not match our records.']);
    }

    public function showAdminLoginForm(){
        $website_data = Setting::find(1);

        return view('auth.admin_login', compact('website_data'));
    }

    public function adminLogin(Request $request){
        $email=$request->email;
        $credentials = $request->only('email', 'password');

        // if success login
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('/admin/home');
        }

        // if failed login
        return view('auth.admin_login')->with('email', $email)->withErrors(['These credentials do not match our records.']);
    }
}
