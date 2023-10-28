<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function addArticle()
    {
        $data['categories'] = Category::where(['is_delete' => '0', 'status' => 'active'])->get();


        return view("admin.article.add", $data);
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    public function storeArticle(Request $request)
    {



        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:articles',
            'category_id' => 'required',
            'content' => 'required',
            'popular' => 'required',
            'top_new' => 'required',
            'publish_date' => 'required|date|after_or_equal:today',
            'file' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'publish_date.after_or_equal' => 'The publish date must be greater than or equal to the current date.',
        ]);
        // Generate a dynamic folder name based on user ID or any unique identifier
        $dynamicFolderName = 'article_' . auth()->user()->id; // Example: 'user_1'

        // Check if the folder exists, create it if not
        if (!Storage::disk('public')->exists('uploads/' . $dynamicFolderName)) {
            Storage::disk('public')->makeDirectory('uploads/' . $dynamicFolderName);
        }

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('uploads/' . $dynamicFolderName, $fileName, 'public'); // The uploaded file will be stored in storage/app/public/uploads

        $category = Category::find($request->category_id);

        $article = new Article();
        $article->user_id = auth()->user()->id;
        $article->title = $request->title;
        $article->title_slug = $this->createSlug($request->title);
        $article->content = $this->dataready($request->editor1);
        $article->image = $fileName;
        $article->category_id =  $request->category_id;
        $article->category_slug = $category->slug;
        $article->publish_date = $request->publish_date;
        $article->views = 0;
        $article->popular = $request->popular;
        $article->top_new = $request->top_new;
        $article->publish = $request->publish;
        $article->is_show = 1;
        $article->save();

        return redirect()->route('admin.article.list')->with('success', 'Article Save successfully!');
    }


    function dataready($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function createSlug($string)
    {
        // Generate slug using Str::slug() method
        $teluguToEnglishMapping = [
            'అ' => 'a', 'ఆ' => 'aa', 'ఇ' => 'i', 'ఈ' => 'ii', 'ఉ' => 'u',
            'ఊ' => 'uu', 'ఋ' => 'ru', 'ౠ' => 'rū', 'ఎ' => 'e', 'ఏ' => 'ee',
            'ఐ' => 'ai', 'ఒ' => 'o', 'ఓ' => 'oo', 'ఔ' => 'au', 'ం' => 'm',
            'ః' => 'h', 'క' => 'ka', 'ఖ' => 'kha', 'గ' => 'ga', 'ఘ' => 'gha',
            'ఙ' => 'ṅa', 'చ' => 'ca', 'ఛ' => 'cha', 'జ' => 'ja', 'ఝ' => 'jha',
            'ఞ' => 'ña', 'ట' => 'ṭa', 'ఠ' => 'ṭha', 'డ' => 'ḍa', 'ఢ' => 'ḍha',
            'ణ' => 'ṇa', 'త' => 'ta', 'థ' => 'tha', 'ద' => 'da', 'ధ' => 'dha',
            'న' => 'na', 'ప' => 'pa', 'ఫ' => 'pha', 'బ' => 'ba', 'భ' => 'bha',
            'మ' => 'ma', 'య' => 'ya', 'ర' => 'ra', 'ఱ' => 'ṟa', 'ల' => 'la',
            'ళ' => 'ḷa', 'వ' => 'va', 'శ' => 'śa', 'ష' => 'ṣa', 'స' => 'sa',
            'హ' => 'ha', '్' => '', 'ొ' => 'o', 'ో' => 'oo', 'ౌ' => 'au'
        ];

        // Transliterate Telugu text to English using the mapping
        $englishText = strtr($string, $teluguToEnglishMapping);

        // Create a URL-friendly slug
        $slug = Str::slug($englishText, '-');

        return $slug;
    }

    public function listArticle()
    {

        $data['articles'] = Article::where('is_delete', '0')->get();
        return view("admin.article.list", $data);
    }

    public function editArticle($id)
    {
        $data['categories'] = Category::where(['is_delete' => '0', 'status' => 'active'])->get();

        $data["article"] = Article::find($id);
        return view("admin.article.edit", $data);
    }

    public function updateArticle($id, Request $request)
    {

        $category = Category::find($request->category_id);

        $article = Article::find($id);
        $article->title = $request->title;
        $article->title_slug = $this->createSlug($request->title);
        $article->content = $this->dataready($request->editor1);
        if (!empty($request->file('file'))) {
            // Generate a dynamic folder name based on user ID or any unique identifier
            $dynamicFolderName = 'article_' . auth()->user()->id; // Example: 'user_1'

            // Check if the folder exists, create it if not
            if (!Storage::disk('public')->exists('uploads/' . $dynamicFolderName)) {
                Storage::disk('public')->makeDirectory('uploads/' . $dynamicFolderName);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads/' . $dynamicFolderName, $fileName, 'public'); // The uploaded file will be stored in storage/app/public/uploads
            $article->image = $fileName;
        }
        $article->category_id =  $request->category_id;
        $article->category_slug = $category->slug;
        $article->publish_date = $request->publish_date;
        $article->views = 0;
        $article->popular = $request->popular;
        $article->top_new = $request->top_new;
        $article->publish = $request->publish;
        $article->save();

        return redirect()->route('admin.article.list')->with('success', 'Article Updated Successfuly');
    }

    public function deleteArticle($id)
    {
        $article = Article::find($id);
        $article->is_delete = '1';
        $article->save();

        return redirect()->route('admin.article.list')->with('success', 'Article Deleted Successfuly');
    }
}
