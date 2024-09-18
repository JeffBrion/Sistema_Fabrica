<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class index_controller extends Controller
{
    public function usuario(){
        $users = User::paginate(5);
        return  view('User/index', compact('users'));
    }
}
