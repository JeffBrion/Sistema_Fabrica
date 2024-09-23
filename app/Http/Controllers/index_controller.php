<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\areas;
use App\Models\product;
use App\Models\worker;
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
        $area = areas::all();
        return view('production.index',compact('trabajador', 'area'));
    }



    
}
