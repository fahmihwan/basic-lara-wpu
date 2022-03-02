<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'name' => 'required|max:255',                                    // versi menggunakna pipe 
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],   // versi array 
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            // 'password' => ['required', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);     //versi pakai bycript
        $validatedData['password'] = Hash::make($validatedData['password']);    //versi dokumentas

        User::create($validatedData);

        // $request->session()->flash('status', 'Task was successful!');                         //session sama saja
        return redirect('/login')->with('success', 'Registeration successfull! Please login');    //session sama saja
    }
}
