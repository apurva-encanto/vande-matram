<?php

namespace App\Http\Controllers;

use Hash;
use Validator;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\JournalistDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
class AdminController extends Controller
{
    //

    public function adminHome()
    {
        $data['pending_articles'] = Article::where(['is_approved' => 0, 'is_delete' => '0'])->get();
        $data['pending_users'] = User::where(['is_approved' => 0, 'is_delete' => '0'])->get();
        $data['total_articles'] = Article::where(['is_delete' => '0'])->get();
        $data['total_users'] = User::where(['is_delete' => '0'])->get();
        return view('admin.dashboard', $data);

    }

    public function adminAccount()
    {

        return view('admin.account');

    }

    public function adminAccountEdit(Request $request){

        $id= auth()->user()->id;
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
            'phone' => ['required', Rule::unique('users')->ignore($id)],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


       $user= User::find(auth()->user()->id);

       $user->name=$request->name;
       $user->email=$request->email;
        $user->phone = $request->phone;

        if (!empty($request->password)) {

            $user->password= Hash::make($request->password);
        }

        if (!empty($request->file('file'))) {

            $coverfile = $request->file('file');
            $request->validate([
                'file' => 'required|mimes:jpeg,png,jpg,webp|max:2048', // Validate file type and size
            ]);
            // Generate a dynamic folder name based on user ID or any unique identifier
            $dynamicFolderName = 'user_' . $user->id; // Example: 'user_1'
            $coverpath = public_path('uploads/' . $dynamicFolderName);
            // Ensure the directory exists, create it if not
            if (!file_exists($coverpath)) {
                mkdir($coverpath, 0755, true);
            }
            // Generate a unique file name
            $fileName = '/' . time() . '_' . Str::random(10) . '_' . $coverfile->getClientOriginalName();
            // Move the uploaded file to the destination directory
            $coverfile->move($coverpath, $fileName);

            $user->image = $fileName;
       }
        $user->save();

        return redirect()->route('admin.account')->with('success', 'Admin Details Updated successfully!');


    }
}
