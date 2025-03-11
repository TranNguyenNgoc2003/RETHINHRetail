<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';
    
    protected $fillable = [
        'method',
        'description',
        'path_logo',
    ];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
