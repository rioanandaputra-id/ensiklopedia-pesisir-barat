<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Document extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'documents';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'title',
        'path',
        'type',
        'uploded'
    ];

    public function gallery_document ()
    {
        return $this->hasMany(GalleryDocument::class, 'document_id', 'id');
    }

    public function user_document ()
    {
        return $this->hasMany(UserDocument::class, 'document_id', 'id');
    }
}
