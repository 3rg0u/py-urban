<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;


    protected $fillable = [
        'name',
        'id',
        'email'
    ];
}
