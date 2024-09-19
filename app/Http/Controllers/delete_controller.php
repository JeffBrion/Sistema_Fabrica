<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\areas;
use App\Models\worker;

class delete_controller extends Controller
{
    //
    public function usuario_eliminar($id){
        $user = User::find($id);

    if ($user) {
        $user->delete();
        return redirect()->route('user')->with('success', 'Usuario eliminado exitosamente!');
    }

    return redirect()->route('user')->with('error', 'Usuario no encontrado.');
    }

    public function area_eliminar($id){
        $area = areas::find($id);
        if($area){
            $area->delete();
            return redirect()->route('area')->with('success', 'Área eliminado exitosamente!');
        }
         return redirect()->route('area')->with('error', 'Área no encontrado.');
    }
    public function worker_delete($id){
        $worker = worker::find($id);
        if($worker){
            $worker->delete();
            return redirect()->route('worked')->with('success', 'Trabajador eliminado exitosamente!');
        }
         return redirect()->route('worked')->with('error', 'Trabajador no encontrado.');
    }
}

