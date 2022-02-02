<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArticlePost;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'role_id',
        'fullname',
        'username',
        'email',
        'password',
        'active'
    ];
    // protected $hidden = [
    //     'created_at',
    //     'updated_at'
    // ];
    public function article_post()
    {
    	return $this->hasMany(ArticlePost::class);
    }
}
