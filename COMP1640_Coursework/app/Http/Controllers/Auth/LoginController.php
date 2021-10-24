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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $validate = $request->all();

        $this->validate($request,[
            'email'=> 'required|email',
            'password'=>'required',
        ]);

        if(auth()->attempt(array('email' => $validate['email'], 'password' => $validate['password']))) {
//            switch (auth()->user()->user_role_id) {
//
//                case 1:
//                    return redirect()->route('home');
//
//                case 2:
//                    return redirect()->route('home');
//
//                case 3:
//                    return redirect()->route('home');
//
//                case 4:
//                    return redirect()->route('staff.home');
//
//                default:
//                    return redirect()->route('home');
//            }
            return redirect()->route('home');

        }

        else
        {
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }

    }
}
