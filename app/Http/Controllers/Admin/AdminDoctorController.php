<?php

namespace App\Http\Controllers\Admin;

use App\Models\ChuyenKhoa;
use App\Models\ProfileDoctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminDoctorController
{
    public function index(Request $request)
    {
        $chuyenKhoaList = ChuyenKhoa::all();

        $query = User::query()
                     ->with(['profileDoctor.chuyenKhoa'])
                     ->where('permission', 'doctor');

        if ($request->get('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->get('chuyen_khoa')) {
            $query->whereHas('profileDoctor', function ($q) use ($request) {
                $q->where('chuyen_khoa_id', $request->chuyen_khoa);
            });
        }

        if ($request->get('status')) {
            $query->whereHas('profileDoctor', function ($q) use ($request) {
                $q->where('status', $request->status);
            });
        }

        $data = $query->get();

        return view('pages/admin/doctor/index', compact('data', 'chuyenKhoaList'));
    }

    public function create()
    {
        $chuyenKhoa = ChuyenKhoa::all();
        return view('pages/admin/doctor/create', compact('chuyenKhoa'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email',
            'phone'       => 'nullable|string|max:20',
            'chuyen_khoa' => 'required|exists:chuyen_khoa,id',
        ]);
        DB::beginTransaction();
        try {
            User::query()->create([
                'name'       => $request->name,
                'email'      => $request->email,
                'permission' => 'doctor',
                'password'   => Hash::make('123123')
            ]);

            ProfileDoctor::query()->create([
                'user_id'        => User::query()->latest()->first()->id,
                'chuyen_khoa_id' => $request->get('chuyen_khoa'),
                'phone'          => $request->get('phone'),
                'status'         => $request->get('status')
            ]);
            DB::commit();

            return redirect()->route('admin.doctor.index')->with('success', 'Thêm bác sĩ thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.doctor.index')->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $doctor = User::query()->with(['profileDoctor'])->findOrFail($id);
        $chuyenKhoa = ChuyenKhoa::all();
        return view('pages.admin.doctor.update', compact('doctor', 'chuyenKhoa'));
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $doctor = User::query()->findOrFail($id);

            $validated = $request->validate([
                'name'        => 'required|string|max:255',
                'email'       => 'required|email|unique:users,email,' . $doctor->id,
                'phone'       => 'nullable|string|max:20',
                'chuyen_khoa' => 'required|exists:chuyen_khoa,id',
            ]);

            $doctor->update([
                'name'  => $validated['name'],
                'email' => $validated['email'],
            ]);

            $profileDoctor = ProfileDoctor::query()->where('user_id', $id)->first();

            $profileDoctor->update([
                'chuyen_khoa_id' => $validated['chuyen_khoa'],
                'phone'          => $validated['phone'],
                'status'         => $request->get('status')
            ]);

            return redirect()->route('admin.doctor.index')->with('success', 'Cập nhật bác sĩ thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.doctor.index')->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $doctor = User::with(['profileDoctor.chuyenKhoa'])->findOrFail($id);
        return view('pages.admin.doctor.detail', compact('doctor'));
    }
}
