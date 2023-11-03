<?php

namespace App\Traits;

use DB;
use App\Models\Article;
use App\Models\Category;

trait ArticleTrait
{
    public function getPublishedArticlesCountByCategory()
    {
        return  Category::leftJoin('articles', function ($join) {
            $join->on('categories.id', '=', 'articles.category_id')
                ->where(['articles.is_approved' => '1', 'articles.status' => 'active', 'articles.is_delete' => '0', 'articles.publish' => '1']);
        })
            ->select('categories.name as category_name', 'slug', DB::raw('COALESCE(SUM(articles.publish), 0) as number_of_articles'))
            ->groupBy('categories.id', 'categories.name', 'slug')
            ->orderBy('categories.id')
            ->get();
        // Your logic here
    }

    public function getPopularArticlesByCategory($category = null)
    {

        $where['articles.is_approved'] = '1';
        $where['articles.status'] = 'active';
        $where['articles.is_delete'] = '0';
        $where['articles.publish'] = '1';
        if (!empty($category)) {
            $where['articles.category_slug'] = $category;
        }
        $items =  Article::leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->select('articles.*', 'users.name as user_name', 'categories.name as category_name')
            ->where($where)->orderBy('articles.views', 'desc')->take(4)->get();

        return $items;
    }

    public function getLatestArticlesByCategory($category = null)
    {

        $where['articles.is_approved'] = '1';
        $where['articles.status'] = 'active';
        $where['articles.is_delete'] = '0';
        $where['articles.publish'] = '1';
        if (!empty($category)) {
            $where['articles.category_slug'] = $category;
        }
        $items =  Article::leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->select('articles.*', 'users.name as user_name', 'categories.name as category_name')
            ->where($where)->orderBy('articles.created_at', 'desc')->take(4)->get();

        return $items;
    }

    public function getSimilarArticlesByCategory($category = null)
    {

        $where['articles.is_approved'] = '1';
        $where['articles.status'] = 'active';
        $where['articles.is_delete'] = '0';
        $where['articles.publish'] = '1';
        $where['articles.category_slug'] = $category;

        $items =  Article::leftJoin('users', 'users.id', '=', 'articles.user_id')
        ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
        ->select('articles.*', 'users.name as user_name', 'categories.name as category_name')
        ->where($where)->orderBy('articles.created_at', 'desc')->take(4)->get();

        return $items;



    }

}