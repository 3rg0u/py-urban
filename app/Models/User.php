<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;
    public $incrementing = false;


    const TYPE_ADMIN = 'manager';
    const TYPE_RES = 'resident';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'role',
        'apart_id'
    ];



    public function isAdmin()
    {
        return $this->role == self::TYPE_ADMIN;
    }

    public function isResident()
    {
        return $this->role == self::TYPE_RES;
    }

}
