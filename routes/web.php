<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\create_controller; 
use App\Http\Controllers\delete_controller;
use App\Http\Controllers\edit_controller;
use App\Http\Controllers\index_controller;
use Illuminate\Support\Facades\Route;




//Index
Route::get('/Home', [index_controller::class, 'home'])->name('home');
Route::get('/user', [index_controller::class, 'user'])->name('user');
Route::get('/worked',[index_controller::class, 'worked'])-> name('worked');
Route::get('/area',[index_controller::class, 'area'])->name('area');


//Create
Route::post('register', [create_controller::class, 'register'])->name('register');
Route::post('create_area', [create_controller::class, 'create_area'])->name('create_area');

//Eliminar
Route::delete('user/{id}', [delete_controller::class, 'usuario_eliminar'])->name('usuario_eliminar');
Route::delete('area/{id}', [delete_controller::class, 'area_eliminar'])->name('area_eliminar');

//Editar
Route::put('user/{id}', [edit_controller::class, 'editar_usuario'])->name('editar_usuario');
Route::put('area/{id}', [edit_controller::class, 'editar_area'])->name('editar_area');