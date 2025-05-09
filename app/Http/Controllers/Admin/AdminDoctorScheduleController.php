<?php

namespace App\Http\Controllers\Admin;

use App\Models\ChuyenKhoa;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class AdminDoctorScheduleController
{
    public function index(Request $request)
    {
        $query = DoctorSchedule::with(['doctor.profileDoctor.chuyenKhoa']);

        // Lọc theo tên bác sĩ
        if ($request->filled('name')) {
            $query->whereHas('doctor', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            });
        }

        // Lọc theo chuyên khoa
        if ($request->filled('chuyen_khoa')) {
            $query->whereHas('doctor.profileDoctor', function ($q) use ($request) {
                $q->where('chuyen_khoa_id', $request->chuyen_khoa);
            });
        }

        if ($request->filled('date')) {
            $query->whereDate('start_time', $request->date);
        }

        // Lọc theo thứ
        if ($request->filled('day_of_week')) {
            $query->where('day_of_week', $request->day_of_week);
        }

        $data = $query->get();
        $chuyenKhoaList = ChuyenKhoa::all();

        return view('pages.admin.doctor_schedule.index', compact('data', 'chuyenKhoaList'));
    }

    public function toggleStatus($id): \Illuminate\Http\RedirectResponse
    {
        $schedule = DoctorSchedule::query()->findOrFail($id);
        $schedule->status = $schedule->status === 'active' ? 'inactive' : 'active';
        $schedule->save();

        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công!');
    }
}
