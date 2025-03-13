<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;
    
    protected $table = 'detail_orders';

    protected $fillable = [
        'product_id',
        'name_product',
        'option_cpu',
        'option_gpu',
        'option_ram',
        'option_hard',
        'count',
        'total_price',
        'coupon_id',
        'deliveries_id',
        'cart_id',
        'payment_id',
        'order_id',
        'created_at',
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
        return $this->belongsTo(Order::class, 'order_id');
    }
    
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
}
