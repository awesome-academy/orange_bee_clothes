<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'address',
        'phone',
        'email',
        'status',
        'total',
        'payment',
        'payment_info',
        'note',

    ];

    function user() {

        return $this->belongsTo('App\Models\User');
    }

    function products() {

        return $this->belongsToMany('App\Models\Product', 'order_products', 'order_id', 'product_id')->withPivot('quantity', 'price');
    }
}
