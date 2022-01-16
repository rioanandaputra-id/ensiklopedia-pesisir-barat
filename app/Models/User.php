<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'role_id',
        'fullname',
        'username',
        'email',
        'password',
        'active'
    ];
    public function article_post(){
        return $this->belongsTo(ArticlePost::class,'user_id','id');
    }
}
