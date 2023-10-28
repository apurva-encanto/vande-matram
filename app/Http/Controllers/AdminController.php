<?php

namespace App\Http\Controllers;

use Hash;
use Validator;
use App\Models\User;
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
        return view('admin.dashboard');
    }
}
