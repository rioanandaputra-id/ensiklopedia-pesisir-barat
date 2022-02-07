<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class GalleryDocument extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'gallery_documents';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'gallery_album_id',
        'document_id'
    ];

    public function gallery_album ()
    {
        return $this->belongsTo(GalleryAlbum::class, 'gallery_album_id', 'id');
    }

    public function document ()
    {
        return $this->belongsTo(Document::class, 'document_id', 'id');
    }
}
