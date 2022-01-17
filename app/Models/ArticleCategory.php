<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
  use HasFactory;
    protected $table = 'article_categorys';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
    	'id',
		'name'
    ];
    public function article_post()
    {
    	return $this->hasMany(ArticlePost::class,'category_id','id');
    }
}
