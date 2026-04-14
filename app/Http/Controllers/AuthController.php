<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    
    $user = User::where('email', $request->email)->first();
    
    dd($credentials, $user); // Muestra ambos
}
}
