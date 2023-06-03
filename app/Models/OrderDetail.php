<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'quantity',
    ];

    public function item(): HasOne
    {
        return $this->hasOne(Item::class);
    }
}
