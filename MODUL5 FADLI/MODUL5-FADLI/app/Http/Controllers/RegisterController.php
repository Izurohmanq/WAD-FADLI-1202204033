<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('layout.register', [
            'title' => 'register'
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'email'=> 'required|max:255',
            'name'=> 'required|min:3|max:255',
            'no_hp'=> 'required|max:255',
            'password'=> 'required|min:5|max:255'
        ]);
        // dd('registrasi berhasil');
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);

        $request->session()->flash('success', 'Registrasi beres, Langsung gas dah login');

        return redirect('/login');
    }
}