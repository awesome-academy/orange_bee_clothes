<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'status',
    ];

    public function orders() {
        return $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }

    public function products() {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
