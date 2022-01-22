<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
  use HasFactory;
    protected $table = 'article_categorys';
    protected $primaryKey = 'article_category_id';
    public $incrementing = false;
    protected $fillable = [
    	'article_category_id',
		'name'
    ];
    public function article_post()
    {
    	return $this->hasMany(ArticlePost::class);
    }
}
