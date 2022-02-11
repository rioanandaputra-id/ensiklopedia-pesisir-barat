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
        'user_account_id',
        'document_id'
    ];

    public function user_account()
    {
        return $this->belongsTo(UserAccount::class, 'user_account_id', 'id');
    }

    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id', 'id');
    }

}
