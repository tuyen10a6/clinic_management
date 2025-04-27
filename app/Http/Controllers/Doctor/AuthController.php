<?php

namespace App\Http\Controllers\Doctor;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function index()
    {
        return view('pages/doctor/login');
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($credentials)) {
            if (Auth::user()->permission == 'doctor') {
                return redirect()->route('doctor-dashboard');
            } else {
                return redirect()->route('doctor-dashboard');
            }

        }
        return redirect()->route('login');
    }

    public function logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        Auth::guard()->logout();
        $request->session()->flush();
        return redirect()->route('login');
    }
}
