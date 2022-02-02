<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ArticleDocument extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
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
