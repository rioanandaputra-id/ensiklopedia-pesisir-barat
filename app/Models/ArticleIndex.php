<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleIndex extends Model
{
    use HasFactory;
    protected $table = 'article_indexs';
    protected $primaryKey = 'article_index_id';
    public $incrementing = false;
    protected $fillable = [
        'article_index_id',
        'name'
    ];
    public function article_post()
    {
    	return $this->hasOne(ArticlePost::class);
    }
}
