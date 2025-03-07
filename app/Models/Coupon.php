<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupon';

    protected $fillable = [
        'code',
        'count',
        'promotion',
        'describe',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'coupon_id');
    }
}
