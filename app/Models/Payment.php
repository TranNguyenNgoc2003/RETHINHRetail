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

    public function detailOrder()
    {
        return $this->hasOne(detailOrder::class);
    }
}
