<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DoctorReportController
{
    public function index()
    {
        $doctorId = Auth::id();


        $doctorPatientCount = DB::table('patients')
                                ->where('doctor_id', $doctorId)
                                ->count();

        $doctorTotalRevenue = $doctorPatientCount * 500000;

// Số bệnh nhân mỗi ngày trong 7 ngày gần nhất của bác sĩ này
        $doctorDailyPatients = DB::table('patients')
                                 ->selectRaw('DATE(created_at) as day, COUNT(*) as count')
                                 ->where('doctor_id', $doctorId)
                                 ->whereDate('created_at', '>=', now()->subDays(6))
                                 ->groupBy('day')
                                 ->orderBy('day')
                                 ->pluck('count', 'day');

        return view('pages/doctor/report', compact(
            'doctorPatientCount', 'doctorTotalRevenue', 'doctorDailyPatients'
        ));

    }
}
