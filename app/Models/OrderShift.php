<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderShift extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'shift_id'
    ];

    protected $table = 'order_shifts';
}
