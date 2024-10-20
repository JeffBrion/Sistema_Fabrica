<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\areas;
use App\Models\worker;
use App\Models\product;
use App\Models\productions;

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
    public function producto_eliminar($id){
        $product = product::find($id);
        if($product){
            $product->delete();
            return redirect()->route('product')->with('success', 'Producto Eliminado Exitosamente');
        }
        return redirect()->route('product')->with('error', 'No se pudo eliminar');
    }
    public function produccion_eliminar($id){
        $production = productions::find($id);
        if($production){
            $production->delete();
            return redirect()->route('production')->with('success', 'Producción Eliminada Exitosamente');
        }
        return redirect()->route('production')->with('error', 'No se pudo eliminar');
    }
}

