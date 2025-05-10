<?php

namespace App\Http\Controllers\Customer;

use App\Models\ChuyenKhoa;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        $chuyenKhoa = ChuyenKhoa::query()->get();

        $qu = '';
        $doctors = User::query()
                       ->with('profileDoctor.chuyenKhoa')
                       ->where('permission', 'doctor')
                       ->whereHas('profileDoctor', function ($query) use ($qu) {
                           $query->where('status', 'active');

                           if ($qu instanceof \Closure) {
                               $qu($query);
                           }
                       })
                       ->get();
        return view('pages/customer/home', compact('chuyenKhoa', 'doctors'));
    }
}
