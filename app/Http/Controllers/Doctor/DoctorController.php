<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController
{
    public function index()
    {
        return view('pages/doctor/dashboard');
    }

    public function updateProfile(Request $request)
    {
        $auth = Auth::user();
    }
}
