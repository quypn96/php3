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
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function login(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        $rem = $request->remember ==1 ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password],$rem)) {
            return redirect(route('dashboard'));
            
        }

        return redirect(route('login'))->withErrors(['msg' => 'Email hoặc mật khẩu k chính xác']);
        
    }

    public function logout(){
        Auth::logout();
        return redirect(route('homepage'));
    }
}
