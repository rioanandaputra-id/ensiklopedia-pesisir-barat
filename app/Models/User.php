<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArticlePost;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $fillable = [
        'user_id',
        'role_id',
        'fullname',
        'username',
        'email',
        'password',
        'active'
    ];
    public function article_post()
    {
    	return $this->hasMany(ArticlePost::class);
    }
}
