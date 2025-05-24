@extends('layouts.admin.master')
@section('content')
    <div class="container mt-4">
        <h4 class="mb-4">📊 Báo cáo tổng hợp phòng khám</h4>

        {{-- Thống kê nhanh --}}
        <div class="row mb-4">
            <div class="col-md-3"><div class="card p-3">👥 Bệnh nhân: <strong>{{ $totalPatients }}</strong></div></div>
            <div class="col-md-3"><div class="card p-3">👨‍⚕️ Bác sĩ: <strong>{{ $totalDoctors }}</strong></div></div>
            <div class="col-md-3"><div class="card p-3">📆 Tư vấn hôm nay: <strong>{{ $todayConsults }}</strong></div></div>
            <div class="col-md-3"><div class="card p-3">⚙️ Thủ thuật:
                    @foreach($procedureStats as $status => $count)
                        <span class="d-block">{{ ucfirst($status) }}: {{ $count }}</span>
                    @endforeach
                </div></div>
        </div>
        <div class="container mt-5">
            <h4>📊 Biểu đồ doanh thu bệnh nhân</h4>
            <canvas id="revenueChart" height="120"></canvas>
        </div>

        {{-- Biểu đồ --}}
        <div class="row mb-4">
            <div class="col-md-6">
                <canvas id="chartGender"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="chartDaily"></canvas>
            </div>
        </div>

{{--        --}}{{-- Bảng thủ thuật mới nhất --}}
{{--        <h5>📋 Danh sách thủ thuật gần đây</h5>--}}
{{--        <table class="table table-bordered">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>#</th><th>Bệnh nhân</th><th>Bác sĩ</th><th>Ngày</th><th>Trạng thái</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($latestProcedures as $procedure)--}}
{{--                <tr>--}}
{{--                    <td>{{ $loop->iteration }}</td>--}}
{{--                    <td>{{ $procedure->patient_name }}</td>--}}
{{--                    <td>{{ $procedure->doctor_name }}</td>--}}
{{--                    <td>{{ \Carbon\Carbon::parse($procedure->ordered_at)->format('d/m/Y') }}</td>--}}
{{--                    <td>{{ ucfirst($procedure->status) }}</td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const genderData = {!! json_encode($genderChart) !!};
        new Chart(document.getElementById('chartGender'), {
            type: 'pie',
            data: {
                labels: Object.keys(genderData),
                datasets: [{
                    data: Object.values(genderData),
                    backgroundColor: ['#36A2EB', '#FF6384'],
                }]
            }
        });

        const dailyData = {!! json_encode($dailyPatients) !!};
        new Chart(document.getElementById('chartDaily'), {
            type: 'line',
            data: {
                labels: Object.keys(dailyData),
                datasets: [{
                    label: 'Bệnh nhân',
                    data: Object.values(dailyData),
                    borderColor: '#4BC0C0',
                    fill: false
                }]
            }
        });

        const labels = @json($doanhThu->pluck('full_name'));
        const dataClinic = @json($doanhThu->pluck('phi_kham'));
        const dataProcedure = @json($doanhThu->pluck('tong_phi_thu_thuat'));
        const dataTotal = @json($doanhThu->pluck('tong_doanh_thu'));

        const ctx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Phí khám (500.000đ)',
                        data: dataClinic,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    },
                    {
                        label: 'Phí thủ thuật',
                        data: dataProcedure,
                        backgroundColor: 'rgba(255, 206, 86, 0.6)',
                    },
                    {
                        label: 'Tổng doanh thu',
                        data: dataTotal,
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        type: 'line',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        fill: false,
                        tension: 0.3
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString('vi-VN') + ' đ';
                            }
                        }
                    }
                }
            }
        });
    </script>

@endsection
