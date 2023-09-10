<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

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
            'name' => 'required|max:255 ',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:8|max:255'
        ]);

        User::create($validated);

        // $request->session()->flash('success', 'Registration successful! Please log in.');

        // dd('duarr');

        return redirect('/login');
        
    }    
}
