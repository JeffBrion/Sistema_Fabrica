<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\areas;
use App\Models\worker;
use App\Models\product;
use App\Models\productions;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class create_controller extends Controller
{
    public function register(Request $request)
    {
        $validation = User::where('name', $request->input('name'))->orWhere('email', $request->input('email'))->first();
        if ($validation) {
            return redirect()->route('user')->with('error', 'Nombre de Usuario ya existe');
        }else {
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => $request->input('role'),
                'password' => Hash::make($request->input('password')),
            ]);
            return redirect()->route('user')->with('success', 'Usuario Creado');
        }
    }

    public function create_area(Request $request)
    {
        $existe = areas::where('name', $request->input('name'))->exists();
        if (!$existe) {
            areas::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ]);
    
            return redirect()->route('area')->with('success', 'Area Creada Exitosamente');
        }else{
            return redirect()->route('area')->with('error', 'Area ya Existente'); 
        }
      
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
    public function create_product(Request $request){
        $existe = product::where('name', $request->input('name'))->exists();
        if (!$existe) 
        {
            if ($request->input('price')<=0 or $request->input('large')<= 0 or $request->input('diameter') <=0) {
                return redirect()->route('product')->with('error', 'Valor Invalido');
            }else{
                product::create([
                    'name'=>$request->input('name'),
                    'description'=>$request->input('description'),
                    'price'=>$request->input('price'),
                    'large'=>$request->input('large'),
                    'diameter'=>$request->input('diameter'),
                ]);
                return redirect()->route('product')->with('success', 'Producto Agregado');
            }

        }else{
            return redirect()->route('product')->with('error', 'Producto ya Existe'); 
        }


    }

    public function create_production(Request $request){
        if ($request->input('total_product') <= 0) {
            return redirect()->route('production')->with('error', 'Valor Invalido');
        }
            productions::create([
                'date'=>$request->input('date'),
                'id_workers'=>$request->input('id_workers'),
                'id_products'=>$request->input('id_products'),
                'total_product'=>$request->input('total_product'),
                'payment'=>$request->input('total_product') * $request->input('price'),
            
            ]);
            return redirect()->route('production')->with('success', 'Producción Agregada');

    }
}
