<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class ArticleIndex extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'article_indexs';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'indexx'
    ];
    public function article_post()
    {
    	return $this->hasMany(ArticlePost::class);
    }
}
