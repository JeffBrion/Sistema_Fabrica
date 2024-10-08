<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\worker;
use App\Models\product;

class productions extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment',
        'id_workers',
        'id_products',
        'start_date',
        'end_date', 
        'status',
    ];

    public function worker()
    {
        return $this->belongsTo(worker::class, 'id_workers');
    }

    public function product()
    {
        return $this->belongsTo(product::class, 'id_products');
    }
}
