<?php

namespace App\Http\Controllers\Admin;

use App\Models\Patient;
use Illuminate\Http\Request;

class AdminPatientController
{
    public function index()
    {
        $patients = Patient::with([
            'doctor'
        ])->get();


        return view('pages/admin/ho_so_benh_an/index', compact('patients'));
    }
    public function show($id)
    {
        $patient = Patient::with([
            'doctor',
            'testOrders.testType',
            'prescriptions.medicines.medicine',
            'prescriptions.doctor',
        ])->findOrFail($id);

        return view('pages/admin/ho_so_benh_an/show', compact('patient'));
    }
}
