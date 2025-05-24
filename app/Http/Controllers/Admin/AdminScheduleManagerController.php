<?php

namespace App\Http\Controllers\Admin;

use App\Models\Patient;
use Illuminate\Http\Request;

class AdminScheduleManagerController
{
    public function index(Request $request)
    {
        $query = Patient::query();

        if ($request->filled('name')) {
            $query->where('full_name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('birth_date')) {
            $query->whereDate('birth_date', $request->birth_date);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $patients = $query->latest()->get();

        return view('pages/admin/quan_ly_lich_kham/index', compact('patients'));
    }

    public function show($id)
    {
        $patient = Patient::with(['prescriptions.medicines'])->findOrFail($id);

        return view('pages/admin/quan_ly_lich_kham/show', compact('patient'));
    }
}
