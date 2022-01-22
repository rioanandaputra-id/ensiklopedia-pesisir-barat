<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleDocument extends Model
{
    use HasFactory;
    protected $table = 'article_documents';
    protected $primaryKey = 'article_document_id';
    protected $fillable = [
        'article_document_id',
        'name',
        'path',
        'type',
        'uploded'
    ];
}
