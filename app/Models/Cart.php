<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $fillable = [
        'id',
        'name_product',
        'option_cpu',
        'option_gpu',
        'option_ram',
        'option_hard',
        'price_product',
        'count',
        'user_id',
        'product_id',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function detailOrders()
    {
        return $this->hasMany(DetailOrder::class, 'cart_id');
    }
}
