<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Cambia Model por Authenticatable
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * El campo que debe ser ocultado en las respuestas JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}