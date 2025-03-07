<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'total_price',
        'shipping_fee',
        'status',
        'pay',
        'coupon_id',
        'deliveries_id',
        'payment_id',
    ];

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'deliveries_id');
    }

    // public function payment()
    // {
    //     return $this->belongsTo(Payment::class, 'payment_id');
    // }
}
