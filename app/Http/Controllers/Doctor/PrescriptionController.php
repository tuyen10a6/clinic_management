<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Medicines;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\PrescriptionMedicine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrescriptionController
{
    public function create(Request $request)
    {
        $doctorId = Auth::id();
        $doctors = User::query()->where('permission', 'doctor')
                                ->where('id', $doctorId)->get();

        $patients = Patient::query()->get();

        $medicines = Medicines::query()->get();

        return view('pages/doctor/ke_don_thuoc', compact('doctors', 'patients', 'medicines'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();
        DB::beginTransaction();
        try {

            $prescription = Prescription::query()->create([
                'patient_id' => $request->patient_id, // nếu có
                'note'       => $request->note ?? null,
                'date'       => $request->prescribed_date ?? null,
                'doctor_id'  => $request->doctor_id
            ]);

            foreach ($data['medicines'] as $key => $medicine) {
                PrescriptionMedicine::query()->create([
                    'prescription_id' => $prescription['id'],
                    'medicine_id'     => $medicine['medicine_id'],
                    'dosage'          => $medicine['dosage'],
                    'duration'        => $medicine['duration'],
                    'instructions'    => $medicine['instructions'],
                ]);
            }

            DB::commit();

            return redirect()->route('doctor.ke-don-thuoc.create')
                             ->with('success', 'Lưu đơn thuốc thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('doctor.ke-don-thuoc.create')->with('error', $e->getMessage());
        }
    }

    public function index(Request $request)
    {
        $doctorId = Auth::id();
        $search = $request->input('search');

        $prescriptions = Prescription::with(['patient', 'doctor', 'medicines'])
                                     ->where('doctor_id', $doctorId)
                                     ->when($search, function ($query, $search) {
                                         $query->whereHas('patient', function ($q) use ($search) {
                                             $q->where('full_name', 'like', '%' . $search . '%');
                                         });
                                     })
                                     ->latest()
                                     ->get();

        return view('pages/doctor/ke_don_thuoc_index', compact('prescriptions', 'search'));
    }

    public function show($id)
    {
        $prescription = Prescription::with(['medicines.medicine', 'doctor', 'patient'])->findOrFail($id);

        return view('pages/doctor/ke_don_thuoc_show', compact('prescription'));
    }

    public function print($id)
    {
        $prescription = Prescription::with(['medicines', 'doctor', 'patient'])->findOrFail($id);

        return view('pages/print/don_thuoc', compact('prescription'));
    }

}
