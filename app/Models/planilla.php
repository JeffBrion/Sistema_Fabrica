<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planilla extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_date',
        'end_date',
        'description',
        'workers_id',
    ];

    public function worker()
{
    return $this->belongsTo(Worker::class, 'workers_id');
}
}
