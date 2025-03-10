<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupon';

    protected $fillable = [
        'title',
        'code',
        'count',
        'start_date',
        'end_date',
        'promotion',
        'describe',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'coupon_id');
    }

    public function getFormattedStartDateAttribute()
    {
        return Carbon::parse($this->start_date)->format('d/m/Y');
    }

    public function getFormattedEndDateAttribute()
    {
        return Carbon::parse($this->end_date)->format('d/m/Y');
    }
}
