<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class edit_controller extends Controller
{
    //
    public function editar_usuario(Request $request, $id){
         // Encontrar el usuario por su ID
    $user = User::findOrFail($id);

    // Actualizar los campos del usuario
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->role = $request->input('role');
    $user->password = $request->input('password');
    
   

    // Guardar los cambios en la base de datos
    $user->save();

    // Redirigir a una página de éxito o a otra página
    return redirect()->route('usuario')->with('success', 'Usuario actualizado exitosamente!');
    }
}
