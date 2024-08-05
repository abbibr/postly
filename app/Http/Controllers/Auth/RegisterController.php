<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }
    public function index(){
        return view('auth.register');
    }

    public function store(Request $req){
        $data = $this->validate($req, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'photo' => 'mimes:jpg,png,jpeg,gif'
        ]);

        if($req->hasFile('photo')){
            $name = $req->file('photo')->getClientOriginalName();
            $path = $req->file('photo')->storeAs('images', $name);   
        }

        User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $req->email,
            'password' => Hash::make($req->get('password')),
            'photo' => $path ?? null
        ]); 

        Auth::attempt([
            'email' => $data['email'],
            'password' => $req->password,
        ]);

        // dd($req->only('email', 'username', 'password'));

        return redirect()->route('dashboard');
    }
}
