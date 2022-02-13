<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class GalleryAlbum extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'gallery_albums';
    protected $primaryKey = 'id';
    public $incrementing = false;
    // public $timestamps = false;
    protected $fillable = [
        'id',
        'user_id',
        'album',
        'type',
        'created_at',
        'updated_at'
    ];

    public function galery_document ()
    {
        return $this->hasMany(GalleryDocument::class, 'album_id', 'id');
    }

    public function user ()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
