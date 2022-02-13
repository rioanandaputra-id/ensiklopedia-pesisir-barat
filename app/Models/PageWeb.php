<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PageWeb extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'page_web';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'title',
        'body',
        'created_at',
        'updated_at'
    ];
}
