<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\create_controller; 
use App\Http\Controllers\delete_controller;
use App\Http\Controllers\edit_controller;
use App\Http\Controllers\index_controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('usuario', [index_controller::class, 'usuario'])->name('usuario');



Route::post('register', [create_controller::class, 'register'])->name('register');

//Eliminar
Route::delete('/usuario/{id}', [delete_controller::class, 'usuario_eliminar'])->name('usuario_eliminar');

//Editar
Route::put('usuario/{id}', [edit_controller::class, 'editar_usuario'])->name('editar_usuario');