<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function create()
    {
        return view('passwords.create');
    }
    
    public function edit($id)
    {
        $password = Password::find($id);
        return view('passwords.edit', compact('password'));
    }
    
}
