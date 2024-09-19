<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\areas;
use App\Models\worker;
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
        return redirect()->route('user')->with('success', 'Usuario Creado');
    }

    public function create_area(Request $request)
    {

        areas::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        // Redirigir a una página de éxito o a otra página
        return redirect()->route('area')->with('success', 'Area Creada Exitosamente');
    }

    public function create_worker(Request $request){
         $area = $request->input('area');
        if ($area == 0){
            return redirect()->route('worked')->with('error', 'Seleccione Un Área');
        }else {
            worker::create([
                'name'=>$request->input('name'),
                'middle_name'=>$request->input('middle_name'),
                'middle_last_name'=>$request->input('middle_last_name'),
                'last_name'=>$request->input('last_name'),
                'email'=>$request->input('email'),
                'numbre_phone'=>$request->input('numbre_phone'),
                'areas_id'=>$request->input('area'),
            ]);
        }
        return redirect()->route('worked')->with('success', 'Trabajador Agregado');

    }
}
