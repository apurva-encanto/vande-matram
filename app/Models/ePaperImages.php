<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ePaperImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'paper_id', 'image', 'is_delete'
    ];
}
