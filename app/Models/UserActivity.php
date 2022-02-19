<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserActivity extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'user_activitys';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'ip_address',
        'user_created',
        'activity',
        'created_at',
        'user_target'
    ];

    public function user_created()
    {
        return $this->hasMany(User::class, 'id', 'user_created')->select('id', 'username');
    }

    public function user_target()
    {
        return $this->hasMany(User::class, 'id', 'user_target')->select('id', 'username');
    }
}
