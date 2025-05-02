<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController
{
    public function index(Request $request)
    {
        $query = Patient::with('doctor');

        if ($request->filled('full_name')) {
            $query->where('full_name', 'like', '%'.$request->full_name.'%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $patients = $query->orderBy('created_at', 'desc')
                          ->paginate(10)
                          ->appends($request->only(['full_name','status']));

        return view('pages.patient.index', compact('patients'));
    }

    public function create()
    {
        return view('pages/patient/create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'full_name'       => 'required|string|max:255',
            'gender'          => 'nullable|in:male,female,other',
            'birth_date'      => 'nullable|date',
            'phone'           => 'nullable|string|max:20',
            'email'           => 'nullable|email',
            'address'         => 'nullable|string|max:255',
            'medical_history' => 'nullable|string',
            'doctor_id'       => 'nullable|exists:users,id',
            'note'            => 'nullable|string',
        ]);

        // Tạo mới bản ghi
        Patient::query()->create([
            'doctor_id'       => Auth::id(),
            'full_name'       => $request->full_name,
            'gender'          => $request->gender,
            'birth_date'      => $request->birth_date,
            'phone'           => $request->phone,
            'email'           => $request->email,
            'address'         => $request->address,
            'medical_history' => $request->medical_history,
            'note'            => $request->note,
        ]);

        return redirect()->route('patient.index')
                         ->with('success', 'Đã thêm bệnh nhân thành công.');
    }

    public function showDetail($id)
    {
        $patient = Patient::query()->with('doctor')->findOrFail($id);
        return view('pages/patient/detail', compact('patient'));
    }

    public function edit($id)
    {
        $patient = Patient::query()->with('doctor')->findOrFail($id);
        return view('pages/patient/update', compact('patient'));
    }

    public function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $patient = Patient::query()->findOrFail($id);

        $request->validate([
            'full_name'       => 'required|string|max:255',
            'gender'          => 'nullable|in:male,female,other',
            'birth_date'      => 'nullable|date',
            'phone'           => 'nullable|string|max:20',
            'email'           => 'nullable|email',
            'address'         => 'nullable|string|max:255',
            'medical_history' => 'nullable|string',
            'note'            => 'nullable|string',
            'status'          => 'required|in:pending,in_progress,completed,cancelled,no_show',
            'doctor_id'       => 'nullable|exists:users,id',
        ]);

        $patient->update($request->only([
            'doctor_id', 'full_name', 'gender', 'birth_date',
            'phone', 'email', 'address', 'medical_history',
            'note', 'status'
        ]));

        return redirect()->route('patient.index')
                         ->with('success', 'Cập nhật hồ sơ bệnh nhân thành công.');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {

        $patient = Patient::query()->findOrFail($id);

        if ($patient) {
            $patient->delete();
        }

        return redirect()->route('patient.index')
                         ->with('success', 'Đã xoá hồ sơ bệnh nhân thành công.');
    }
}
