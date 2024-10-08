<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\create_controller; 
use App\Http\Controllers\delete_controller;
use App\Http\Controllers\edit_controller;
use App\Http\Controllers\index_controller;
use App\Http\Controllers\login_controller;
use App\Http\Controllers\asignate_controller;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;



//Login
Route::post('/validation', [login_controller::class, 'validation'])->name('validation');
Route::post('/logout', [login_controller::class, 'logout'])->name('logout');



//Index
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [index_controller::class, 'home'])->name('home');
    Route::get('/user', [index_controller::class, 'user'])->name('user');
    Route::get('/worked', [index_controller::class, 'worked'])->name('worked');
    Route::get('/area', [index_controller::class, 'area'])->name('area');
    Route::get('/product', [index_controller::class, 'product'])->name('product');
    Route::get('/production', [index_controller::class, 'production'])->name('production');
});

// Ruta de login (sin protección)
Route::get('/', [index_controller::class, 'login'])->name('login');


//Create
Route::post('register', [create_controller::class, 'register'])->name('register');
Route::post('create_area', [create_controller::class, 'create_area'])->name('create_area');
Route::post('create_worker', [create_controller::class, 'create_worker'])->name('create_worker');
Route::post('create_product',[create_controller::class, 'create_product'])->name('create_product');
Route::post('create_production', [create_controller::class, 'create_production'])->name('create_production');

//Eliminar
Route::delete('user/{id}', [delete_controller::class, 'usuario_eliminar'])->name('usuario_eliminar');
Route::delete('area/{id}', [delete_controller::class, 'area_eliminar'])->name('area_eliminar');
Route::delete('worker/{id}', [delete_controller::class, 'worker_delete'])->name('worker_delete');
Route::delete('producto_eliminar/{id}',[delete_controller::class, 'producto_eliminar'])->name('producto_eliminar');

//Editar
Route::put('user/{id}', [edit_controller::class, 'editar_usuario'])->name('editar_usuario');
Route::put('area/{id}', [edit_controller::class, 'editar_area'])->name('editar_area');
Route::put('worker/{id}',[edit_controller::class, 'edit_worker'])-> name('edit_worker');
Route::put('producto_editar/{id}', [edit_controller::class, 'producto_editar'])->name('producto_editar');

