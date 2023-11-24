<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ePaperDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'date', 'place', 'is_download', 'is_premium', 'status', 'is_delete'
    ];
}
