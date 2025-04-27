<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;

class DoctorController
{
    public function index()
    {
        return view('pages/doctor/dashboard');
    }
}
