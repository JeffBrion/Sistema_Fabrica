<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
}
