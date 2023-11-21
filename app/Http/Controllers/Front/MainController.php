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
        $data['top_news'] =  $this->getTopNewsArticles();

        $data['categories'] = Category::where(['is_delete' => '0', 'status' => 'active'])->orderBy('is_main', 'desc')->get();



        $items = Article::leftJoin('users', 'users.id', '=', 'articles.user_id')
        ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
        ->select('articles.*', 'users.name as user_name', 'categories.name as category_name')
        ->where(['articles.is_approved' => '1', 'articles.status' => 'active', 'articles.is_delete' => '0', 'articles.publish' => '1'])
        ->whereRaw('(SELECT COUNT(*) FROM articles AS sub_articles WHERE sub_articles.category_id = articles.category_id AND sub_articles.id >= articles.id) <= 10')
        ->orderBy('articles.category_id')
        ->orderBy('articles.id', 'desc')
        ->get();


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
        $data['popular_posts'] = $this->getPopularArticlesByCategory();
        $data['latest_posts'] = $this->getLatestArticlesByCategory();
        $data['active_category']='home';

        $data['items'] = $items;
        $data['articles'] = $groupedItems;

        // echo "<pre>";
        // print_r($groupedItems);
        // exit;

        return view('welcome', $data);
    }

    public function getSingleArticle(Request $request, $category, $title)
    {

        $data['categories'] = Category::where(['is_delete' => '0', 'status' => 'active'])->get();

        $data['article'] = Article::leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->leftJoin('journalist_details', 'journalist_details.user_id', '=', 'articles.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->select('articles.*', 'users.name as user_name', 'journalist_details.photo as photo', 'categories.name as category_name')
            ->where([
                'articles.is_approved' => '1', 'articles.status' => 'active',
                'articles.is_delete' => '0', 'articles.publish' => '1',
                'articles.category_slug' => $category, 'title_slug' => $title
            ])->first();
         if(empty($data['article']))
         {
           return redirect()->back()->with('error', 'Publish Article to View');
           exit;
         }
            
       
        $data['active_category'] = $category;

        Article::where('title_slug', $title)->increment('views');
        if (empty($data['article'])) {
            return redirect()->route('main');
        }

        $data['top_news'] =  $this->getTopNewsArticles();
        $data['tags'] = $this->getPublishedArticlesCountByCategory();
        $data['popular_posts'] = $this->getPopularArticlesByCategory($category,$title);
        $data['latest_posts'] = $this->getLatestArticlesByCategory($category,$title);
        $data['similar_posts'] = $this->getSimilarArticlesByCategory($category,$title);
        $data['next_article'] = $this->getNextArticle()->toArray();

        // Your original array of 8 items
           return view('single-article', $data);
    }



    public function getArticleByCategory(Request $request, $id)
    {
        $data['active_category'] = 'home';
        
        
        $where['articles.is_approved'] = '1';
        $where['articles.status'] = 'active';
        $where['articles.is_delete'] = '0';
        $where['articles.publish'] = '1';
        if($id !='latest'){
            
            $data['active_category'] =  $id;
            $where['articles.category_slug'] = $id;
        }

        $data['categories'] = Category::where(['is_delete' => '0', 'status' => 'active'])->get();
        $data['category'] = Category::where(['slug' => $id])->first();
        $data['tags'] = $this->getPublishedArticlesCountByCategory();
        $data['items'] =  Article::leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->select('articles.*', 'users.name as user_name', 'categories.name as category_name')
            ->inRandomOrder()
            ->where($where)->orderBy('articles.id', 'desc')->paginate(9);

        $data['popular_posts'] = $this->getPopularArticlesByCategory($id);
        $data['latest_posts'] = $this->getLatestArticlesByCategory($id);
        $data['top_news'] =  $this->getTopNewsArticles();
        return view('category-article', $data);
    }

    public function contact_us()
    {
        $data['active_category'] = 'home';

        $data['top_news'] =  $this->getTopNewsArticles();
        $data['categories'] = Category::where(['is_delete' => '0', 'status' => 'active'])->get();
        return view('contact-us', $data);
    }

      public function about_us()
    {
        $data['active_category'] = 'home';

        $data['top_news'] =  $this->getTopNewsArticles();
        $data['categories'] = Category::where(['is_delete' => '0', 'status' => 'active'])->get();
        return view('about-us', $data);
    }



}
