<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';
    
    protected $fillable = [
        'path_img',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
