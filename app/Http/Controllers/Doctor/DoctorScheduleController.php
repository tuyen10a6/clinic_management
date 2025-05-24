<?php

namespace App\Http\Controllers\Doctor;

use App\Models\CustomerAdvice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorScheduleController
{
    public function index(Request $request)
    {
        $doctorId = Auth::id();
        $query = CustomerAdvice::query()->where('doctor_id', $doctorId);

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date); // date format: YYYY-MM-DD
        }
        if ($request->filled('doctor_status')) {
            $query->where('doctor_status', $request->doctor_status); // date format: YYYY-MM-DD
        }

        $data = $query->latest()->get();

        return view('pages/doctor/quan_ly_lich_kham_index', compact('data'));
    }

    public function edit($id)
    {
        $advice = CustomerAdvice::query()->findOrFail($id);
        return view('pages/doctor/quan_ly_lich_kham_update', compact('advice'));
    }
    public function updateDoctorStatus(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'doctor_status' => 'required|in:arrived,not_come',
        ]);

        $item = CustomerAdvice::query()->findOrFail($id);
        $item->doctor_status = $request->doctor_status;
        $item->save();

        return redirect()->route('doctor.lich-kham-du-bao.index')->with('success', 'Cập nhật trạng thái bác sĩ thành công.');
    }
}
