<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function create(){
        return view('auth.register');

    }
    public function store(Request $request){
        $fields= $request->validate([
            'name'=>'required|string|min:3',
            'email'=>'required|email|string|unique:Users,email',
            'password'=> 'required|confirmed|string|min:6'
        ]);
        $user=User::create([
        'name'=>$fields['name'],
        'email'=>$fields['email'],
        'password'=>bcrypt($fields['password']),

    ]);
        auth()->login($user);
        return redirect('/')->with('success', "User Created And Logged In.");
    }

    public function login(){
        return view('auth.login');
    }
    public function authenticate(Request $request){
        $fields= $request->validate([
            'email'=>'required|email',
            'password'=> 'required'
        ]);
        if(auth()->attempt($fields)){
            $request->session()->regenerate();
            return redirect('/')->with('message', 'logged in!');
        }
        else
            return back()->with('message','invalid email or password');
    }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/')->with('message','logged out!');
    }
}
