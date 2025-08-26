<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return Inertia::render("Auth/Login");
    }
    
    public function storelogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => ['required','string','email'],
            "password" => ['required','string']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = [
            'email'=> $request->email,
            'password'=> $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'email'=> 'Invalid username / password.'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function signup()
    {
        return Inertia::render("Auth/Signup");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storesignup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => ['required','string','max:255'],
            "login" => ['required','string','max:255'],
            "email" => ['required','string','email','unique:users,email,except,id'],
            "password" => ['required','string','min:8','confirmed'],
            "password_confirmation" => ['required'],
        ]);

        //dd($validator->fails(), $validator->errors(), $request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'login'=> $request->login,
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
        ]);

        //dd($user);

        return redirect()->route('login')->with('success','');
    }

    public function logout(Request $request) {
        
        Auth::logout();
        $request->session()->invalidate();

        return redirect()->route('home')->with('success','');  
    }
}
