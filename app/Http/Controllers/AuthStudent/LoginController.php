<?php

namespace App\Http\Controllers\AuthStudent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
Use App\student;
use Alert;
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:student')->except('logout');
    }
    public function showLoginForm()
    {
        return view('authStudent.login');
    }

    protected $redirectTo = '/ppdb';

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Attempt to log the user in
        if (Auth::guard('student')->attempt($credential, $request->member)){
            // If login succesful, then redirect to their intended location
            Alert::success('Berhasil Login','Sukses')->persistent('Ok');
            return redirect()->intended(route('user.profile'));
        }
        Alert::warning('Periksa kembali email dan kata sandi Anda','Gagal Login')->persistent('Ok');
        // If Unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('student')->logout();

//        $request->session()->invalidate();

        return redirect('/');
    }
}
