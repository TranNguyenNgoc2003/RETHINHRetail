<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $table = 'order';

    protected $fillable = [
        'shipping_fee',
        'discount',
        'total_price',
        'status',
        'detail_order_id',
        'payment_id',
        'payment_status',
    ];

    public function detailOrder()
    {
        return $this->belongsTo(DetailOrder::class, 'detail_order_id');
    }
}
