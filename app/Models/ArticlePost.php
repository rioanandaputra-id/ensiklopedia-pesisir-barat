<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ArticlePost extends Model
{
    use HasFactory;
    protected $table = 'article_posts';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'category_id',
        'index_id',
        'user_id',
        'slug',
        'title',
        'content',
        'views',
        'publish'
    ];


    public function article_index()
    {
    	return $this->belongsTo(ArticleIndex::class, 'index_id', 'id');
    }
    public function article_category()
    {
    	return $this->belongsTo(ArticleCategory::class, 'category_id', 'id');
    }
    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
