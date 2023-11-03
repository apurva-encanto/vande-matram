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
}
