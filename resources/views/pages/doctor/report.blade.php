@extends('layouts.doctor.master')

@section('content')
    <div class="container">
        <h2 class="mb-4">📊 Báo cáo Bác sĩ</h2>

        <div class="mb-4">
            <p><strong>Tổng số bệnh nhân đã khám:</strong> {{ $doctorPatientCount }}</p>
            <p><strong>Tổng doanh thu:</strong> {{ number_format($doctorTotalRevenue, 0, ',', '.') }} VND</p>
        </div>

        <div class="card p-4">
            <h5 class="mb-3">Số bệnh nhân mỗi ngày trong 7 ngày qua</h5>
            <canvas id="doctorDailyChart" height="100"></canvas>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('doctorDailyChart').getContext('2d');

        const doctorDailyChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_keys($doctorDailyPatients->toArray())) !!},
                datasets: [{
                    label: 'Bệnh nhân mỗi ngày',
                    data: {!! json_encode(array_values($doctorDailyPatients->toArray())) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Số bệnh nhân'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Ngày'
                        }
                    }
                }
            }
        });
    </script>
@endsection


