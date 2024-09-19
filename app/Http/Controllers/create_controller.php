<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\areas;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

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
        return redirect()->route('user');
    }

    public function create_area(Request $request)
    {

        areas::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        // Redirigir a una página de éxito o a otra página
        return redirect()->route('area');
    }
}
