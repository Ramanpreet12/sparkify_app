<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Illuminate\Support\Facades\Validator;

class AdminSettingController extends Controller
{

    public function profile(Request $request)
    {

        if ($request->isMethod('post')) {
        }
        else{
            return view('backend.admin_setting.admin_profile');
        }
    }

    public function password()
    {

        return view('backend.admin_setting.admin_password');
    }

    public function updatePassword(Request $request)
    {

        $validate = Validator::make($request->all(),[
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ] ,
        [
            'current_password.required' => 'Current Password is required',
            'new_password.required' => 'New Password is  required',
            'confirm_password.required' => 'Confirm Password is  required',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        } else {

            $input = $request->all();
            if (!(Hash::check($request->current_password ,Auth::user()->password))) {
                return redirect()->back()->with('message_error' , 'Current password is incorrect');
            }
            if (($request->current_password === $request->new_password)) {
               return redirect()->back()->with('message_error' , 'New Password cannot be same as your current password');
            }
            User::where('id' , Auth::user()->id)->update(['password' => bcrypt($request->new_password)]);
            return redirect()->back()->with('success' , 'Password updated successfully');
        }

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
