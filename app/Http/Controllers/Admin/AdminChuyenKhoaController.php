<?php

namespace App\Http\Controllers\Admin;

use App\Models\ChuyenKhoa;
use Illuminate\Http\Request;

class AdminChuyenKhoaController
{
    public function index(Request $request)
    {
        $data = ChuyenKhoa::query()->get();
        return view('pages/admin/chuyen_khoa/index', compact('data'));
    }
}
