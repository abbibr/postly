<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $req)
    {
        $req->authenticate();

        $check = Auth::attempt(
            [
                'email' => $req->email,
                'password' => $req->password
            ],
            $req->remember
        );

        if (!$check) {
            RateLimiter::hit('limit');

            throw ValidationException::withMessages([
                'error_login' => 'Invalid login details!',
            ]);
        }

        RateLimiter::clear('limit');
        return redirect()->route('dashboard');
    }
}
