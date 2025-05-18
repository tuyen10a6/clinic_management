<?php

namespace App\Http\Controllers\Customer;

use App\Models\ChuyenKhoa;
use App\Models\User;
use Illuminate\Http\Request;

class IntroductionController
{
    public function index()
    {
        $chuyenKhoa = ChuyenKhoa::query()->get();
        return view('pages/customer/introduction/index', compact('chuyenKhoa'));
    }
    public function thietBiYTe()
    {
        $chuyenKhoa = ChuyenKhoa::query()->get();
        return view('pages/customer/introduction/thiet_bi_y_te', compact('chuyenKhoa'));
    }
}
