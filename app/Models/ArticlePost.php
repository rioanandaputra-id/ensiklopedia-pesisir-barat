<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlePost extends Model
{
    use HasFactory;
    protected $table = 'article_posts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'article_id',
        'category_id',
        'index_id',
        'user_id',
        'name',
        'slug',
        'title',
        'content',
        'views',
        'publish'
    ];

    public function user(){
        return $this->hasMany(User::class, 'user_id', 'id');
    }
}
