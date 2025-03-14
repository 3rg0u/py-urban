<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaidBill extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'bill_id',
        'apart_id',
        'paid_date',
        'state',
    ];
}
