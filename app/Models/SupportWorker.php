<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportWorker extends Model
{
    use HasFactory;

    protected $table = 'support_worker';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'roll_id',
    ];

    public function roll()
    {
        return $this->belongsTo(Roll::class, 'roll_id');
    }
}
