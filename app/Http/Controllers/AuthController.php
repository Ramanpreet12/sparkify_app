<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use DB;

class AuthController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function loginView()
    // {

    //     return view('login.main', [
    //         'layout' => 'login'
    //     ]);
    // }

    /**
     * Authenticate login user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {



            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('admin/dashboard')->with('success_msg' , 'Login Successfully');
            } else {
                return redirect()->back()->with('error_msg' , 'Invalid Email or Password !');
            }

        } else {
            // dd(User::get());
            // dd(DB::connection()->getDatabaseName());
            return view('login.main', [
                        'layout' => 'login'
                    ]);
        }

        // if (!\Auth::attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ])) {
        //     throw new \Exception('Wrong email or password.');
        // }



        // if (Auth::attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ])) {
        //     throw new \Exception('Wrong email or password.');
        // }

    }

    /**
     * Logout user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        \Auth::logout();
        return redirect('admin/login');
    }
}
