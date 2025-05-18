<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Patient;
use App\Models\TestOrder;
use App\Models\TestType;
use Illuminate\Http\Request;
use PHPUnit\Util\Test;

class ChiDinhController
{
    public function index($id)
    {
        $chiDinh = TestType::query()->get();
        $patient = Patient::query()->findOrFail($id);
        $listTestOrder = TestOrder::query()
                                  ->with(['patient', 'doctor', 'testType'])
                                  ->where('patient_id', $id)->get();

        return view('pages/doctor/cac_chi_dinh', compact('chiDinh', 'patient', 'listTestOrder'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();
        if (empty($data['tests'])) {
            return redirect()->back()->with('error', 'Vui lòng chọn 1 chỉ định');
        } else {
            foreach ($data['tests'] as $key => $test) {
                TestOrder::query()->create([
                    'doctor_id'    => $data['doctor_id'],
                    'patient_id'   => $data['patient_id'],
                    'test_type_id' => $test,
                    'notes'        => $data['notes'][$key],
                ]);
            }
            return redirect()->back()->with('success', 'Thêm chỉnh định thành công');
        }
    }

    public function updateStatus(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'status' => 'required|in:ordered,completed,cancelled',
        ]);

        $order = TestOrder::query()->findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Cập nhật trạng thái thành công.');
    }

    public function showPrint($id)
    {
        $chiDinh = TestType::query()->get();
        $patient = Patient::query()->findOrFail($id);
        $listTestOrder = TestOrder::query()
                                  ->with(['patient', 'doctor', 'testType'])
                                  ->where('patient_id', $id)->get();

        return view('pages/print/chi_dinh', compact('chiDinh', 'patient', 'listTestOrder'));
    }
}
