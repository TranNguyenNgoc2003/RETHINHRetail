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
        'rating',
        'discount',
        'total_product',
        'description',
        'category',
        'Screen_size',
        'Panel_material',
        'Display_tech',
        'Screen_resolution',
        'Screen_features',
        'Screen_ratio',
        'Rear_camera',
        'Video_recording',
        'Camera_features',
        'Front_camera',
        'Record_video_first',
        'CPU',
        'GPU',
        'NFC',
        'SIM_card',
        'Network_support',
        'GPS',
        'RAM_capacity',
        'RAM_Type',
        'RAM_slots',
        'Hard_drive',
        'Operating_system',
        'Case_type',
        'Size',
        'Weight',
        'Material',
        'Compatibility',
        'Resistance',
        'Tech_Utilities',
        'Other_utilities',
        'Sound_tech',
        'Charging_tech',
        'Charging_port',
        'Communication_port',
        'Power_consumption',
        'Types_sensors',
        'WiFi',
        'Bluetooth',
        'Pin',
        'Health_benefits',
        'Release_date',
        'Producer'
    ];
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
