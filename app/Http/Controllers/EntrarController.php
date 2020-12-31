<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(
               'Email inválido'
            );
        }

        return redirect()->route('listar_series');
    }

}
