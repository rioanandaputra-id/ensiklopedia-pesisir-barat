<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArticlePost;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class UserAccount extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'user_accounts';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id',
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

    public function gallery_album()
    {
    	return $this->hasMany(GalleryAlbum::class);
    }
}
