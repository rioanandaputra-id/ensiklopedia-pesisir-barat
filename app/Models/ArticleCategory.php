<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class ArticleCategory extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'article_categorys';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id',
		'categoryy'
    ];
    public function article_post()
    {
    	return $this->hasMany(ArticlePost::class);
    }
}
