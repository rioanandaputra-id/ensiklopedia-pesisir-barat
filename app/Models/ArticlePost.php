<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;

class ArticlePost extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'article_posts';
    protected $primaryKey = 'article_post_id';
    public $incrementing = false;
    protected $fillable = [
        'article_post_id',
        'article_category_id',
        'article_index_id',
        'user_id',
        'slug',
        'title',
        'content',
        'views',
        'publish'
    ];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function article_index()
    {
    	return $this->belongsTo(ArticleIndex::class, 'article_index_id');
    }
    public function article_category()
    {
    	return $this->belongsTo(ArticleCategory::class, 'article_category_id');
    }
    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
