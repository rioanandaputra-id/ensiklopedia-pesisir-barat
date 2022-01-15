<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
  use HasFactory;
    protected $table = 'article_categorys';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'id',
		'name'
    ];
}
