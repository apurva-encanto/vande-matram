<?php

namespace App\Traits;

use DB;
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
}
