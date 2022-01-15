<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleDocument extends Model
{
    use HasFactory;
    protected $table = 'article_documents';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'path',
        'type',
        'uploded'
    ];
}
