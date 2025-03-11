<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'fullname',
        'address',
        'phone',
        'user_id',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailOrders()
    {
        return $this->hasMany(DetailOrder::class, 'deliveries_id');
    }
}
