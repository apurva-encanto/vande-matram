<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function getConvertedNameAttribute()
    {
        return ucfirst(strtolower($this->attributes['name']));
    }

    protected $fillable = [
        'name', 'slug', 'description', 'meta_title', 'meta_description', 'status', 'is_delete'
    ];
}
