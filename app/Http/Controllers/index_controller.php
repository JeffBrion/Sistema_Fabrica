<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\areas;
use App\Models\planilla;
use App\Models\product;
use App\Models\worker;
use App\Models\productions;
use Illuminate\Http\Request;

class index_controller extends Controller
{
    public function login(){
        return view('login');
    }
    public function home(){
        return view('home');
    }
    public function user(){
        $users = User::paginate(5);
        return  view('User/index', compact('users'));
    }
    public function worked(){
        $areas = areas::all();
        $workers = worker::paginate(5);
        return view('worked/index', compact('areas', 'workers'));
    }
    public function area(){
        $areas = areas::paginate(5);
        return view('area/index', compact('areas'));
    }
    public function product(){
        $products = product::paginate(5);
        return view('product/index', compact('products'));
    }
    public function production(){
        $trabajador = worker::all();
        $products = product::all();
        $productions = productions::all();
        return view('production.index',compact('trabajador', 'products', 'productions'));
    }
    public function planilla()
    {
        $trabajador = worker::all();
        $planillas = planilla::all();
        return view('planilla/index', compact('trabajador', 'planillas')); 
    } 

    public function planilladetalle(Request $request, $id) {
        $pagination = $request->query('pagination', 5); // Usar 5 como valor predeterminado si no se proporciona
        
        $planilla = Planilla::findOrFail($id);
    
        $workerId = $planilla->workers_id;
        $worker = $planilla->worker;
    
        $productions = productions::where('id_workers', $workerId)
            ->whereBetween('date', [$planilla->start_date, $planilla->end_date])
            ->paginate($pagination);
    
        $payment = 0;
        $IR = 0;
        $INSS = 0;
    
        foreach ($productions as $production) {
            $payment += $production->payment;
        }
    
        $IR = $payment * 0.07;
        $INSS = $payment * 0.15;
    
        $pago_net = $payment - ($IR + $INSS);
    
        // Enviar datos a la vista
        return view('planilla.show', [
            'planilla' => $planilla,
            'productions' => $productions,
            'worker' => $worker,
            'payment' => $payment,
            'pago_net' => $pago_net,
            'INSS' => $INSS,
            'IR' => $IR,
        ]);
    }
    
}