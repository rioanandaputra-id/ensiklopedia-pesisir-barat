<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    public $incrementing = false;
    // public $timestamps = false;
    protected $fillable = [
        'id',
        'document_id',
        'role',
        'name',
        'username',
        'email',
        'password',
        'active'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function article_post()
    {
    	return $this->hasMany(ArticlePost::class, 'user_id', 'id');
    }

    public function gallery_album()
    {
    	return $this->hasMany(GalleryAlbum::class, 'user_id', 'id');
    }

    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id', 'id');
    }
}
