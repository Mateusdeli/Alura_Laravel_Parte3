<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrarController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $user = $request->only(['name','email','password']);
        $user['password'] = Hash::make($user['password']);
        $user = User::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => $user['password'],
        ]);

        Auth::login($user);

        return redirect()->route('listar_series');
    }
}
