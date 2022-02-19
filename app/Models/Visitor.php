<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Visitor extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'visitors';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'ip_address',
        'category',
        'url',
        'created_at'
    ];
}
