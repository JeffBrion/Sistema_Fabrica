<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\areas;
use App\Models\worker;
use Illuminate\Http\Request;

class edit_controller extends Controller
{
    //
    public function editar_usuario(Request $request, $id){
         // Encontrar el usuario por su ID
    $user = User::findOrFail($id);

    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->role = $request->input('role');
    $user->password = $request->input('password');
    
    $user->save();

    return redirect()->route('user')->with('success', 'Usuario actualizado exitosamente!');
    }

    public function editar_area(Request $request, $id){
        $area = areas::findOrFail($id);

        $area->name = $request->input('name');
        $area->description = $request->input('description');

        $area->save();

        return redirect()-> route('area')->with('succes', 'Area Actualziada');
    }
    public function edit_worker(Request $request, $id){
        $worker = worker::findOrFail($id);

        $worker->name = $request->input('name');
        $worker->middle_name = $request->input('middle_name');
        $worker->last_name = $request->input('last_name');
        $worker->middle_last_name = $request->input('middle_last_name');
        $worker->email = $request->input('email');
        $worker->numbre_phone = $request->input('numbre_phone');
        $worker->areas_id = $request->input('area');

        $worker->save();

        return redirect()->route('worked')->with('success', 'Trabajador Actualizado Exitosamente');
    }
}
