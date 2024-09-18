<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class delete_controller extends Controller
{
    //
    public function usuario_eliminar($id){
        $user = User::find($id);

    if ($user) {
        $user->delete();
        return redirect()->route('usuario')->with('success', 'Usuario eliminado exitosamente!');
    }

    return redirect()->route('usuario')->with('error', 'Usuario no encontrado.');
    }
}
