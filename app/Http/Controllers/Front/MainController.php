<?php

namespace App\Http\Controllers\Front;

use DB;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Traits\ArticleTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\JournalistDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public $data;
    use ArticleTrait;

    public function __construct()
    {
    }

    public function index()
    {
        $data['top_news'] = Article::leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->select('articles.*', 'users.name as user_name', 'categories.name as category_name')
            ->where(['articles.is_approved' => '1', 'articles.status' => 'active', 'articles.is_delete' => '0', 'articles.publish' => '1', 'top_new' => '1'])
            ->orderBy('articles.id', 'desc')->take(3)->get();
        // echo "<pre>";
        // print_r($data);
        // exit;
        $data['categories'] = Category::where(['is_delete' => '0', 'status' => 'active'])->orderBy('is_main', 'desc')->get();
        $items =  Article::leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->select('articles.*', 'users.name as user_name', 'categories.name as category_name')
            ->where(['articles.is_approved' => '1', 'articles.status' => 'active', 'articles.is_delete' => '0', 'articles.publish' => '1'])->orderBy('articles.id', 'desc')->get();

        $groupedItems = array();
        // Iterate through the original array and group items by category_slug
        foreach ($items as $item) {
            $categorySlug = $item['category_slug'];
            // If the category_slug is not yet a key in $groupedItems, create an empty array
            if (!isset($groupedItems[$categorySlug])) {
                $groupedItems[$categorySlug] = array();
            }
            // Add the item to the corresponding category_slug group
            $groupedItems[$categorySlug][] = $item;
        }

        $data['tags'] = $this->getPublishedArticlesCountByCategory();

        $data['items'] = $items;
        $data['articles'] = $groupedItems;
        return view('welcome', $data);
    }

    public function getSingleArticle(Request $request, $category, $title)
    {

        $article = Article::where('title_slug', $title)->increment('views');;

        $data['categories'] = Category::where(['is_delete' => '0', 'status' => 'active'])->get();

        $data['article'] = Article::leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->leftJoin('journalist_details', 'journalist_details.id', '=', 'articles.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->select('articles.*', 'users.name as user_name', 'journalist_details.photo as photo', 'categories.name as category_name')

            ->where([
                'articles.is_approved' => '1', 'articles.status' => 'active',
                'articles.is_delete' => '0', 'articles.publish' => '1',
                'articles.category_slug' => $category, 'title_slug' => $title
            ])->first();

        if (empty($data['article'])) {
            return redirect()->route('main');
        }
        // echo "<pre>";
        // print_r($data['article']);
        // exit;
        $data['tags'] = $this->getPublishedArticlesCountByCategory();


        return view('single-article', $data);
    }
    public function getArticleByCategory(Request $request, $id)
    {
        $data['categories'] = Category::where(['is_delete' => '0', 'status' => 'active'])->get();
        $data['category'] = Category::where(['slug' => $id])->first();
        $data['tags'] = $this->getPublishedArticlesCountByCategory();
        $data['items'] =  Article::leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->select('articles.*', 'users.name as user_name', 'categories.name as category_name')
            ->where([
                'articles.is_approved' => '1', 'articles.status' => 'active',
                'articles.is_delete' => '0', 'articles.publish' => '1', 'category_slug' => $id
            ])->orderBy('articles.id', 'desc')->get();

        return view('category-article', $data);
    }
}
