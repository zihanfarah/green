<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request) {
        // return $request->all();
        $validated = $request->validate([
            'name' => 'required | max:255 ',
            'email' => 'required | unique:users | email',
            'password' => 'required | confirmed | min:8 | max:255'
        ]);

        dd('registrasi aman');
    }    
}
