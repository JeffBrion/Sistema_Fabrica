<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\worker;

class asignate_controller extends Controller
{
    //
    public function producto_asignar(Request $request, $id){
        if($id){   
        $worker = worker::findOrFail($id); 
        return view('production/index', compact('worker'));
        }else {
            return redirect()->route('production')->with('error', 'Trabajador No Existe');
        }

    }
}
