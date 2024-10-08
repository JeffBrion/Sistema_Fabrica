<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class login_controller extends Controller
{
    //
    public function validation(Request $request)
    {
        // Validación de los campos del formulario
    $request->validate([
        'user' => 'required|string',
        'password' => 'required|string',
    ]);

    $userInput = $request->input('user');
    $passwordInput = $request->input('password');

    $user = User::where('name', $userInput)->first();

    if ($user && Hash::check($passwordInput, $user->password)) {
        // Autenticar al usuario
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Inicio de sesión exitoso');
    } else {
        return redirect()->route('login')->with('error', 'Datos no coinciden');
    }
    }

    public function logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Has cerrado sesión exitosamente');
    }
}
