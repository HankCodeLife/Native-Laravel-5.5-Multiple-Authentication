<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * 如果重導的路徑需要運用特定的程式邏輯
     * 只要定義 redirectTo 這個方法來取代 redirectTo 這個屬性即可
     */
    protected function redirectTo()
    {
        $url = '/home';
        return $url;
    }

    public function username()
    {
        return 'name';
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect('login');
    }
}
