<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerService extends Model
{
    use HasFactory;

    protected $table = 'customer_service';

    protected $fillable = [
        'service_name',
        'service_type',
        'username',
        'phone',
        'email',
        'start_time',
        'end_time',
        'note',
        'spworker_id',
    ];

    public function supportWorker()
    {
        return $this->belongsTo(SupportWorker::class, 'spworker_id');
    }
}
