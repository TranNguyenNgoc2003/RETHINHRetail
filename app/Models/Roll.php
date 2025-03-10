<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roll extends Model
{
    use HasFactory;

    protected $table = 'roll';

    protected $fillable = [
        'roll_name',
    ];

    public function supportWorkers()
    {
        return $this->hasMany(SupportWorker::class, 'roll_id');
    }
}
