<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserDocument extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'user_documents';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'user_id',
        'document_id'
    ];
}
