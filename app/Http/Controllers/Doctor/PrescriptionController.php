<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Medicines;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\PrescriptionMedicine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrescriptionController
{
    public function create(Request $request)
    {
        $doctors = User::query()->where('permission', 'doctor')->get();

        $patients = Patient::query()->get();

        $medicines = Medicines::query()->get();

        return view('pages/doctor/ke_don_thuoc', compact('doctors', 'patients', 'medicines'));
    }

    public function store(Request $request)
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
                    'instructions'     => $medicine['instructions'],
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

}
