<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'name_product',
        'price',
        'option_cpu',
        'option_gpu',
        'option_ram',
        'option_hard',
        'rating',
        'discount',
        'total_product',
        'description',
        'category',
        'Screen_size',
        'Panel_material',
        'Screen_resolution',
        'Screen_features',
        'Screen_ratio',
        'Rear_camera',
        'Video_recording',
        'Front_camera',
        'CPU',
        'GPU',
        'RAM_capacity',
        'Hard_capacity',
        'Operating_system',
        'Size',
        'Weight',
        'Material',
        'Tech_Utilities' ,
        'Sound_tech',
        'Charging_tech',
        'WiFi' ,
        'Bluetooth' ,
        'Pin',
        'Release_date',
        'Producer',
    ];
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
