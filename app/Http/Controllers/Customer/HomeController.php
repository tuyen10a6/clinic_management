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

    public function searchDoctor(Request $request): \Illuminate\Http\JsonResponse
    {
        $name = $request->get('name');
        $doctors = User::query()->where('permission', 'doctor')
                       ->where('name', 'like', '%' . $name . '%')->get();

        return response()->json($doctors);
    }

    public function chinhSachBaoHiem()
    {
        $chuyenKhoa = ChuyenKhoa::query()->get();

        return view('pages/customer/chinh_sach_bao_hiem/index', compact('chuyenKhoa'));
    }
    public function chinhSachKhachHang()
    {
        $chuyenKhoa = ChuyenKhoa::query()->get();

        return view('pages/customer/chinh_sach_khach_hang/index', compact('chuyenKhoa'));
    }
}
