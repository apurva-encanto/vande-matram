<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\JournalistDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function index()
    {

        $data['categories'] = Category::where(['is_delete' => '0', 'status' => 'active'])->get();
        return view('welcome', $data);
    }

    public function getSingleArticle(Request $request)
    {
        return view('single-article');
    }
    public function getArticleByCategory(Request $request, $id)
    {
        $data['categories'] = Category::where(['is_delete' => '0', 'status' => 'active'])->get();

        $data['category'] = Category::where(['slug' => $id])->first();

        return view('category-article', $data);
    }
}
