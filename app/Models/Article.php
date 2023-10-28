<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'title_slug', 'image',
        'category_id', 'category_slug', 'content', 'publish_date', 'views', 'meta_title', 'meta_description',
        'popular', 'top_new', 'publish', 'status', 'is_delete', 'is_show'
    ];
}
