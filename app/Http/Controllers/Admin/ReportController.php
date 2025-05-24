<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;

class ReportController
{
    public function index()
    {
        $totalPatients = DB::table('patients')->count();
        $totalDoctors = DB::table('users')->where('permission', 'doctor')->count();
        $todayConsults = DB::table('customer_advice')->whereDate('created_at', now())->count();
        $procedureStats = DB::table('test_orders')
                            ->selectRaw("status, COUNT(*) as count")
                            ->groupBy('status')
                            ->pluck('count', 'status');

        $genderChart = DB::table('patients')
                         ->selectRaw("gender, COUNT(*) as count")
                         ->groupBy('gender')
                         ->pluck('count', 'gender');

        $dailyPatients = DB::table('patients')
                           ->selectRaw("DATE(created_at) as day, COUNT(*) as count")
                           ->whereDate('created_at', '>=', now()->subDays(6))
                           ->groupBy('day')
                           ->orderBy('day')
                           ->pluck('count', 'day');

        $latestProcedures = DB::table('test_orders')
                              ->leftJoin('patients', 'test_orders.patient_id', '=', 'patients.id')
                              ->leftJoin('users', 'test_orders.doctor_id', '=', 'users.id')
                              ->select('test_orders.*', 'patients.full_name as patient_name', 'users.name as doctor_name')
                              ->orderByDesc('test_orders.created_at')
                              ->limit(10)
                              ->get();

        $doanhThu = DB::table('patients')
                      ->leftJoin('test_orders', function ($join) {
                          $join->on('patients.id', '=', 'test_orders.patient_id')
                               ->where('test_orders.status', '=', 'completed');
                      })
                      ->leftJoin('test_types', 'test_orders.test_type_id', '=', 'test_types.id')
                      ->select(
                          'patients.id',
                          'patients.full_name',
                          'patients.phone',
                          DB::raw('500000 as phi_kham'),
                          DB::raw('IFNULL(SUM(test_types.price), 0) as tong_phi_thu_thuat'),
                          DB::raw('(500000 + IFNULL(SUM(test_types.price), 0)) as tong_doanh_thu'),
                          DB::raw('COUNT(test_orders.id) as so_thu_thuat')
                      )
                      ->groupBy('patients.id', 'patients.full_name', 'patients.phone')
                      ->get();

        return view('pages/admin/report/index', compact(
            'totalPatients', 'totalDoctors', 'todayConsults',
            'procedureStats', 'genderChart', 'dailyPatients', 'latestProcedures',
            'doanhThu'
        ));
    }

}
