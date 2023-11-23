<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
        $userExists = User::where('email', $request->email)
            ->first();
        if ($userExists) {

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
                    return redirect()->route('login')->with('error', 'Your account has not been approved yet.')->withInput();
                }
                if (auth()->user()->is_delete == '1') {
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Your account has been deleted by Authorite.')->withInput();
                }

                if (auth()->user()->status == 'inactive') {
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Your account is inactive.')->withInput();
                }
            }
        } else {

            $errors['password'] = 'Password is Incorrect !';

            return redirect()->route('login')->withInput()->withErrors($errors);
        }
       }else{
            $errors['email']='User not Found';
            return redirect()->route('login')->withInput()->withErrors($errors);

       }
    }

    public function forgot_password(Request $request)
    {
        return view('admin.forgot');
    }
    public function forgotcheck(Request $request)
    {
       $user=  User::where('email',$request->email)->first();
       if(!empty($user))
       {
            $randomNumber = rand(100000, 999999);
            // Encryption
            $encryptedData = base64_encode($randomNumber);

            User::where('email', $request->email)->update(['otp'=> $randomNumber]);

            $data=['username'=> $user->name,'email'=> $request->email,'token'=> $encryptedData];
            //see use statement
            Mail::send('emails.forgot-password', $data, function ($message) {
                $message->to('apurva.dixit@encantotek.in', 'abc')->subject('Password Reset Request');
            });

            return redirect()->back()->with('success', 'We have sent you an email. Please check your inbox.');




       }else{

            return redirect()->back()->with('error', 'User not Exists');
       }
    }


    public function logout(Request $request)
    {

        $url= url('/') . '/'.auth()->user()->role.'-login';
        Auth::logout();
        return redirect($url)->with('success', 'You have been logged out successfully.');
    }

    public function reset_password(Request $request)
    {

        $user = User::where(['email' => $request->email])->first();
        $decryptedData = base64_decode($request->token);
        if($user->otp == $decryptedData){
            return view('admin.new-password');

        }else{

            return redirect()->route('login')->with('error', 'You`re no authorized to access this url.');
        }
exit;

    }

    public function passwordChange(Request $request)
    {

        $user = User::where(['email' => $request->email])->first();
        if(!empty($user))
        {
            User::where(['email' => $request->email])->update(['password'=>Hash::make($request->password)]);
            return redirect()->route('login')->with('success', 'Password change successfully.Please Login.');
        }else{
            return redirect()->route('login')->with('error', 'You`re no authorized to access this url.');

        }
    }
}
