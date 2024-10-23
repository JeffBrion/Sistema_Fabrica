<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\areas;
use App\Models\productions;

class worker extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'middle_name',
        'last_name',
        'middle_last_name',
        'email',
        'numbre_phone',
        'areas_id',
    ];
    public function area()
    {
        return $this->belongsTo(areas::class, 'areas_id');
    }
    public function productions()
    {
        return $this->hasMany(productions::class, 'id_workers');
    }
}
