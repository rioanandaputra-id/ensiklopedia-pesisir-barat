<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Cviebrock\EloquentSluggable\Sluggable;

class ArticlePost extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    use Sluggable;
    protected $table = 'article_posts';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'article_category_id',
        'article_index_id',
        'user_id',
        'article_image',
        'slug',
        'title',
        'body',
        'views',
        'publish'
    ];

    function sluggable () : array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function article_category()
    {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id', 'id');
    }
    public function article_index()
    {
        return $this->belongsTo(ArticleIndex::class, 'article_index_id', 'id');
    }
}
