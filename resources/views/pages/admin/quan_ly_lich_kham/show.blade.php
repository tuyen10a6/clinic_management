@extends('layouts.admin.master')

@section('content')
    <div class="container mt-4">
        <h4 class="mb-4">Chi tiết bệnh nhân</h4>

        <div class="card mb-4">
            <div class="card-header"><strong>Thông tin bệnh nhân</strong></div>
            <div class="card-body">
                <p><strong>Họ tên:</strong> {{ $patient->full_name }}</p>
                <p><strong>Giới tính:</strong> {{ ucfirst($patient->gender) ?? '-' }}</p>
                <p><strong>Ngày
                        sinh:</strong> {{ $patient->birth_date ? \Carbon\Carbon::parse($patient->birth_date)->format('d/m/Y') : '-' }}
                </p>
                <p><strong>Số điện thoại:</strong> {{ $patient->phone ?? '-' }}</p>
                <p><strong>Email:</strong> {{ $patient->email ?? '-' }}</p>
                <p><strong>Địa chỉ:</strong> {{ $patient->address ?? '-' }}</p>
                <p><strong>Tiền sử bệnh:</strong> {{ $patient->medical_history ?? '-' }}</p>
                <p><strong>Ghi chú:</strong> {{ $patient->note ?? '-' }}</p>
                <p><strong>Trạng thái:</strong> {{ ucfirst($patient->status) }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header"><strong>Đơn thuốc</strong></div>
            @if(isset($patient->prescriptions))
                <div class="card-body">
                    <div class="mb-4 border-bottom pb-3">
                        <p><strong>Ngày kê:</strong> {{$patient->prescriptions->created_at->format('d/m/Y') }}</p>
                        <table class="table table-sm table-bordered">
                            <thead>
                            <tr>
                                <th>Tên thuốc</th>
                                <th>Số lượng</th>
                                <th>Liều dùng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($prescription->medicines as $medicine)
                                <tr>
                                    <td>{{ $medicine->name }}</td>
                                    <td>{{ $medicine->pivot->quantity ?? '-' }}</td>
                                    <td>{{ $medicine->pivot->dosage ?? '-' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <p> Chưa có đơn thuốc nào</p>
            @endif
        </div>

        <a href="{{ route('admin.quan-ly-lich-kham.index') }}" class="btn btn-secondary mt-4">← Quay lại danh sách</a>
    </div>
@endsection
