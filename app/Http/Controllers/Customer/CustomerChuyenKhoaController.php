<?php

namespace App\Http\Controllers\Customer;

use App\Models\ChuyenKhoa;

class CustomerChuyenKhoaController
{
    public function index($id)
    {
        $chuyenKhoa = ChuyenKhoa::query()->get();

        $chuyenKhoaFrist = ChuyenKhoa::query()->with('profileDoctor.userDoctor')->where('id', $id)->first();

        return view('pages/customer/chuyen_khoa/index', compact('chuyenKhoa', 'chuyenKhoaFrist'));
    }
}
