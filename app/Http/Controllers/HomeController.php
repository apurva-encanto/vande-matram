<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Hash;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data['pending_articles'] = Article::where(['is_approved' => 0, 'is_delete' => '0', 'created_by' => auth()->user()->id])->get();
        $data['pending_users'] = User::where(['is_approved' => 0, 'is_delete' => '0', 'is_assign' => auth()->user()->id])->get();
        $data['total_articles'] = Article::where(['is_delete' => '0', 'created_by' => auth()->user()->id])->get();
        $data['total_users'] = User::where(['is_delete' => '0', 'is_assign' => auth()->user()->id])->get();

        return view('agent.dashboard',$data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        $data['pending_articles'] = Article::where(['is_approved' => 0, 'is_delete' => '0', 'created_by' => auth()->user()->id])->get();

        $data['pending_users'] = User::where(['is_approved' => 0, 'is_delete' => '0', 'is_assign' => auth()->user()->id])->get();
        $data['total_articles'] = Article::where(['is_delete' => '0', 'created_by' => auth()->user()->id])->get();
        $data['total_users'] = User::where(['is_delete' => '0', 'is_assign' => auth()->user()->id])->get();

        return view('manager.dashboard', $data);
    }

    public function managerAccount()
    {
        return view('manager.account');

    }

    public function agentAccount()
    {
        return view('agent.account');
    }

    public function managerAccountEdit(Request $request)
    {

        $id = auth()->user()->id;
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
            'phone' => ['required', Rule::unique('users')->ignore($id)],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $user = User::find(auth()->user()->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if (!empty($request->password)) {

            $user->password = Hash::make($request->password);
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

        return redirect()->route('manager.account')->with('success', 'Details Updated successfully!');


    }


    public function agentAccountEdit(Request $request)
    {

        $id = auth()->user()->id;
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
            'phone' => ['required', Rule::unique('users')->ignore($id)],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $user = User::find(auth()->user()->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if (!empty($request->password)) {

            $user->password = Hash::make($request->password);
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

        return redirect()->route('agent.account')->with('success', 'Details Updated successfully!');
    }
}
