<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\productions;

class planilladetalles extends Model
{
    use HasFactory;

    public function production()
{
    return $this->belongsTo(productions::class, 'production_id');
}
}
