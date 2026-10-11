<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function license()
    {
        return $this->belongsTo(License::class);
    }
}