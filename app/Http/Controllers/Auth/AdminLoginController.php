<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admins')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if( Auth::guard('admins')->attempt(['account'=>$request->account, 'password'=>$request->password]) ){
            return redirect()->intended(route('admin.index'));
        }

        return redirect()->back()->withInput($request->only('account'));

    }

    public function logout()
    {
        Auth::guard('admins')->logout();
        return redirect(route('admin.login.form'));
    }


}
