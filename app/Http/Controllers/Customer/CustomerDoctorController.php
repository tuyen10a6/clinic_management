<?php

namespace App\Http\Controllers\Customer;

use App\Models\ChuyenKhoa;
use App\Models\User;

class CustomerDoctorController
{
    public function index($id)
    {
        $chuyenKhoa = ChuyenKhoa::query()->get();

        $data = User::query()->with('profileDoctor.chuyenKhoa')->findOrFail($id);

        return view('pages/customer/doctor/index', compact('data', 'chuyenKhoa'));
    }

    public function customerSchedule()
    {
        $chuyenKhoa = ChuyenKhoa::query()->get();

        return view('pages/customer/schedule/index', compact('chuyenKhoa'));
    }
}
