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
            'editor1' => 'required',
            'popular' => 'required',
            'top_new' => 'required',
            'publish_date' => 'required|date|after_or_equal:today',
        ], [
            'publish_date.after_or_equal' => 'The publish date must be greater than or equal to the current date.',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
     
        

            
                    $coverfile = $request->file('file');
            
                    // $request->validate([
                    //   'file' => 'required|mimes:jpeg,png,jpg,webp|max:2048', // Validate file type and size
                    // ]);
            
                    $dynamicFolderName = 'article_' . auth()->user()->id;
                    $coverpath = public_path('uploads/' . $dynamicFolderName);
            
                   // Ensure the directory exists, create it if not
                    if (!file_exists($coverpath)) {
                        mkdir($coverpath, 0755, true);
                    }
            
                    // Generate a unique file name
                    $fileName = '/' . time() . '_' . Str::random(10) . '_' . $coverfile->getClientOriginalName();
            
                   // Move the uploaded file to the destination directory
                   $coverfile->move($coverpath, $fileName);
      

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
        $article->created_by = 1;
        $article->is_approved = 1;
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

        $data['articles'] = Article::where('is_delete', '0')
            ->where('is_approved', '1')
            ->orderBy('id', 'desc')
            ->get();
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
            
                $coverfile = $request->file('file');
            
                    // $request->validate([
                    //   'file' => 'required|mimes:jpeg,png,jpg,webp|max:2048', // Validate file type and size
                    // ]);
            
                    $dynamicFolderName = 'article_' . $article->user_id;
                    $coverpath = public_path('uploads/' . $dynamicFolderName);
            
                   // Ensure the directory exists, create it if not
                    if (!file_exists($coverpath)) {
                        mkdir($coverpath, 0755, true);
                    }
            
                    // Generate a unique file name
                    $coverimg_name = '/' . time() . '_' . Str::random(10) . '_' . $coverfile->getClientOriginalName();
            
                   // Move the uploaded file to the destination directory
                   $coverfile->move($coverpath, $coverimg_name);
                   $article->image = $coverimg_name;
        }
        $article->category_id =  $request->category_id;
        $article->category_slug = $category->slug;
        $article->publish_date = $request->publish_date;
        $article->views = 0;
        $article->popular = $request->popular;
        $article->top_new = $request->top_new;
        $article->publish = $request->publish;
        $article->is_approved = $request->is_approved;
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

    public function addManagerArticle()
    {
        $data['categories'] = Category::where(['is_delete' => '0', 'status' => 'active'])->get();
        return view('manager.article.add', $data);
    }

    public function listManagerArticle()
    {
        $data['articles'] = Article::where('is_delete', '0')->where('created_by', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->get();
        return view('manager.article.list', $data);
    }

    public function StoreManagerArticle(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:articles',
            'category_id' => 'required',
            'editor1' => 'required',
            'popular' => 'required',
            'top_new' => 'required',
            'publish_date' => 'required|date|after_or_equal:today',
        ], [
            'publish_date.after_or_equal' => 'The publish date must be greater than or equal to the current date.',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

                    $coverfile = $request->file('file');
            
                    // $request->validate([
                    //   'file' => 'required|mimes:jpeg,png,jpg,webp|max:2048', // Validate file type and size
                    // ]);
            
                    $dynamicFolderName = 'article_' . auth()->user()->id;
                    $coverpath = public_path('uploads/' . $dynamicFolderName);
            
                   // Ensure the directory exists, create it if not
                    if (!file_exists($coverpath)) {
                        mkdir($coverpath, 0755, true);
                    }
            
                    // Generate a unique file name
                    $fileName = '/' . time() . '_' . Str::random(10) . '_' . $coverfile->getClientOriginalName();
            
                   // Move the uploaded file to the destination directory
                   $coverfile->move($coverpath, $fileName);
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
        $article->created_by = auth()->user()->id;
        $article->is_approved = 0;
        $article->save();

        return redirect()->route('manager.article.list')->with('success', 'Article Save successfully!');
    }


    public function pendingArticle(Request $request)
    {
        $data['articles'] = Article::where('is_delete', '0')
            ->where('is_approved', 0)
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.article.pending', $data);
    }

    public function editManagerArticle(Request $request, $id)
    {

        $data['categories'] = Category::where(['is_delete' => '0', 'status' => 'active'])->get();
        $data["article"] = Article::find($id);
        return view('manager.article.edit', $data);
    }


    public function updateManagerArticle(Request $request, $id)
    {
        $category = Category::find($request->category_id);

        $article = Article::find($id);
        $article->title = $request->title;
        $article->title_slug = $this->createSlug($request->title);
        $article->content = $this->dataready($request->editor1);
       if (!empty($request->file('file'))) {
            
                $coverfile = $request->file('file');
            
                    // $request->validate([
                    //   'file' => 'required|mimes:jpeg,png,jpg,webp|max:2048', // Validate file type and size
                    // ]);
            
                    $dynamicFolderName = 'article_' . $article->user_id;
                    $coverpath = public_path('uploads/' . $dynamicFolderName);
            
                   // Ensure the directory exists, create it if not
                    if (!file_exists($coverpath)) {
                        mkdir($coverpath, 0755, true);
                    }
            
                    // Generate a unique file name
                    $coverimg_name = '/' . time() . '_' . Str::random(10) . '_' . $coverfile->getClientOriginalName();
            
                   // Move the uploaded file to the destination directory
                   $coverfile->move($coverpath, $coverimg_name);
                   $article->image = $coverimg_name;
        }
        $article->category_id =  $request->category_id;
        $article->category_slug = $category->slug;
        $article->publish_date = $request->publish_date;
        $article->views = 0;
        $article->popular = $request->popular;
        $article->top_new = $request->top_new;
        $article->publish = $request->publish;
        $article->is_approved = $request->is_approved;
        $article->save();

        return redirect()->route('manager.article.list')->with('success', 'Article Updated Successfuly');
    }


    public function addAgentArticle()
    {
        $data['categories'] = Category::where(['is_delete' => '0', 'status' => 'active'])->get();
        return view('agent.article.add', $data);
    }

    public function listAgentArticle()
    {
        $data['articles'] = Article::where('is_delete', '0')->where('created_by', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->get();
        return view('agent.article.list', $data);
    }

    public function StoreAgentArticle(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:articles',
            'category_id' => 'required',
            'editor1' => 'required',
            'popular' => 'required',
            'top_new' => 'required',
            'publish_date' => 'required|date|after_or_equal:today',
        ], [
            'publish_date.after_or_equal' => 'The publish date must be greater than or equal to the current date.',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

                   $coverfile = $request->file('file');
            
                    // $request->validate([
                    //   'file' => 'required|mimes:jpeg,png,jpg,webp|max:2048', // Validate file type and size
                    // ]);
            
                    $dynamicFolderName = 'article_' . auth()->user()->id;
                    $coverpath = public_path('uploads/' . $dynamicFolderName);
            
                   // Ensure the directory exists, create it if not
                    if (!file_exists($coverpath)) {
                        mkdir($coverpath, 0755, true);
                    }
            
                    // Generate a unique file name
                    $fileName = '/' . time() . '_' . Str::random(10) . '_' . $coverfile->getClientOriginalName();
            
                   // Move the uploaded file to the destination directory
                   $coverfile->move($coverpath, $fileName);
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
        $article->created_by = auth()->user()->id;
        $article->is_approved = 2;
        $article->save();

        return redirect()->route('agent.article.list')->with('success', 'Article Save successfully!');
    }




    public function editAgentArticle(Request $request, $id)
    {

        $data['categories'] = Category::where(['is_delete' => '0', 'status' => 'active'])->get();
        $data["article"] = Article::find($id);
        return view('agent.article.edit', $data);
    }


    public function updateAgentArticle(Request $request, $id)
    {
        $category = Category::find($request->category_id);

        $article = Article::find($id);
        $article->title = $request->title;
        $article->title_slug = $this->createSlug($request->title);
        $article->content = $this->dataready($request->editor1);
        if (!empty($request->file('file'))) {
            
                $coverfile = $request->file('file');
            
                    // $request->validate([
                    //   'file' => 'required|mimes:jpeg,png,jpg,webp|max:2048', // Validate file type and size
                    // ]);
            
                    $dynamicFolderName = 'article_' . $article->user_id;
                    $coverpath = public_path('uploads/' . $dynamicFolderName);
            
                   // Ensure the directory exists, create it if not
                    if (!file_exists($coverpath)) {
                        mkdir($coverpath, 0755, true);
                    }
            
                    // Generate a unique file name
                    $coverimg_name = '/' . time() . '_' . Str::random(10) . '_' . $coverfile->getClientOriginalName();
            
                   // Move the uploaded file to the destination directory
                   $coverfile->move($coverpath, $coverimg_name);
                   $article->image = $coverimg_name;
        }
        $article->category_id =  $request->category_id;
        $article->category_slug = $category->slug;
        $article->publish_date = $request->publish_date;
        $article->views = 0;
        $article->popular = $request->popular;
        $article->top_new = $request->top_new;
        $article->publish = $request->publish;
        $article->save();

        return redirect()->route('agent.article.list')->with('success', 'Article Updated Successfuly');
    }

    public function pendingManagerArticle()
    {
        $data['articles'] = Article::leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->select('articles.*', 'users.is_assign as is_assign')
            ->where('articles.is_approved', 2)
            ->where('users.is_assign', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->get();
        return view('manager.article.pending', $data);
    }
}
