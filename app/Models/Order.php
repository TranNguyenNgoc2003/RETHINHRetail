<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'user_id',
        'fullname',
        'address',
        'phone',
        'price',
        'shipping_fee',
        'discount',
        'total_price',
        'status',
        'payment_status',
        'is_completed',
        'shipping_status'
    ];

    public function detailOrders()
    {
        return $this->hasMany(DetailOrder::class, 'order_id');
    }
}
