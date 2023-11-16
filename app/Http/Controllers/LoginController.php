<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request,$user=null)
    {
        $data['user']= $user;
        if (Auth::check()) {
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.home');
            } else if (auth()->user()->role == 'manager') {
                return redirect()->route('manager.home');
            } else {
                return redirect()->route('home');
            }
        }
        return view('admin.login',$data);
    }

    public function logincheck(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {

            if (auth()->user()->is_approved == '1' && auth()->user()->is_delete == '0' && auth()->user()->status == 'active') {
                if (auth()->user()->role == 'admin') {
                    return redirect()->route('admin.home');
                } else if (auth()->user()->role == 'manager') {
                    return redirect()->route('manager.home');
                } else {
                    return redirect()->route('home');
                }
            } else {

                if (auth()->user()->is_approved == '0') {
                    Auth::logout();
                    return redirect()->route('admin.login')->with('error', 'Your account has not been approved yet.')->withInput();
                }
                if (auth()->user()->is_delete == '1') {
                    Auth::logout();
                    return redirect()->route('admin.login')->with('error', 'Your account has been deleted by Authorite.')->withInput();
                }

                if (auth()->user()->status == 'inactive') {
                    Auth::logout();
                    return redirect()->route('admin.login')->with('error', 'Your account is inactive.')->withInput();
                }
            }
        } else {
            return redirect()->route('admin.login')
                ->with('error', 'Email-Address And Password Are Wrong.')->withInput();
        }
    }


    public function logout(Request $request)
    {

        $url= url('/') . '/'.auth()->user()->role.'-login';
        Auth::logout();
        return redirect($url)->with('success', 'You have been logged out successfully.');
    }
}
