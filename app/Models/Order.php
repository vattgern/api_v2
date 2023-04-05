<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'table',
        'number_of_person',
        'status',
        'price',
    ];

    public function shifts(): BelongsToMany
    {
        return $this->belongsToMany(Shift::class);
    }

}
