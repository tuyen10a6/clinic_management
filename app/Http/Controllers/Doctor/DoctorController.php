<?php

namespace App\Http\Controllers\Doctor;

use App\Models\ChuyenKhoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController
{
    public function index()
    {
        return view('pages/doctor/dashboard');
    }

    public function update()
    {
        $chuyenKhoa = ChuyenKhoa::query()->get();
        return view('pages/doctor/update_profile', compact('chuyenKhoa'));
    }

    public function updateProfile(Request $request)
    {
        dd($request->all());
        $auth = Auth::user();
    }
}
