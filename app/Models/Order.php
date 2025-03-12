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
        'username',        
        'shipping_fee',
        'discount',
        'total_price',
        'status',
        'payment_status',
    ];

    public function detailOrder()
    {
        return $this->belongsTo(DetailOrder::class, 'detail_order_id');
    }
}
