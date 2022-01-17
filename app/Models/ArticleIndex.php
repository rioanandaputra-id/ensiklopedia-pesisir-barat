<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleIndex extends Model
{
    use HasFactory;
    protected $table = 'article_indexs';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'name'
    ];
    public function article_post()
    {
    	return $this->hasOne(ArticlePost::class,'index_id','id');
    }
}
