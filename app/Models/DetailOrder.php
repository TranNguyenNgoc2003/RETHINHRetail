<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $table = 'detail_orders';

    protected $fillable = [
        'name_product',
        'count',
        'total_price',
        'coupon_id',
        'deliveries_id',
        'cart_id',
    ];

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'deliveries_id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
