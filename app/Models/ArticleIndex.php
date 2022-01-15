<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleIndex extends Model
{
    use HasFactory;
    protected $table = 'article_indexs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name'
    ];
}
