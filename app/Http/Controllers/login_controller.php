<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class login_controller extends Controller
{
    //
    public function validation(Request $request){
    $password = $request->input('password');
    $user = $request->input('user');
        $userval = User::where('name', $user)->first();
        $passval = User::where('password',  $password)->first();
        if($passval and $userval){
            return view('home');
        }else{
            return redirect()->route('login')->with('error', 'Datos No Coinciden');
        }
    }
}
