<?php

namespace App\Http\Controllers\Doctor;

use App\Models\ChuyenKhoa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function index()
    {
        $chuyenKhoa = ChuyenKhoa::query()->get();
        $doctors = User::query()->with('profileDoctor.chuyenKhoa')->where('permission', 'doctor')->get();
        return view('pages/doctor/login', compact('doctors', 'chuyenKhoa'));
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($credentials)) {
            if (Auth::user()->permission == 'doctor') {
                return redirect()->route('doctor-dashboard');
            } else {
                return redirect()->route('test-type.index');
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
