<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class create_controller extends Controller
{
    public function register(Request $request)
    {

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => $request->input('password'),
        ]);

        // Redirigir a una página de éxito o a otra página
        return redirect()->route('usuario');
    }
}
