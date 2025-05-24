@extends('layouts.admin.master')

@section('content')
    <div class="container">
        <h2>Hồ sơ bệnh án: {{ $patient->full_name }}</h2>

        <hr>
        <h4>Thông tin cá nhân</h4>
        <ul>
            <li><strong>Họ tên:</strong> {{ $patient->full_name }}</li>
            <li><strong>Giới tính:</strong> {{ $patient->gender }}</li>
            <li><strong>Ngày sinh:</strong> {{ $patient->birth_date }}</li>
            <li><strong>Số điện thoại:</strong> {{ $patient->phone }}</li>
            <li><strong>Email:</strong> {{ $patient->email }}</li>
            <li><strong>Địa chỉ:</strong> {{ $patient->address }}</li>
            <li><strong>Tiền sử bệnh:</strong> {{ $patient->medical_history }}</li>
            <li><strong>Ghi chú:</strong> {{ $patient->note }}</li>
            <li><strong>Bác sĩ phụ trách:</strong> {{ $patient->doctor->name ?? 'Chưa có' }}</li>
        </ul>

        <hr>
        <h4>Thủ thuật đã thực hiện</h4>
        @php $tongThuThuat = 0; @endphp

        @if($patient->testOrders->isNotEmpty())
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Ngày</th>
                    <th>Loại thủ thuật</th>
                    <th>Giá</th>
                    <th>Ghi chú</th>
                </tr>
                </thead>
                <tbody>
                @foreach($patient->testOrders as $order)
                    @if($order->status === 'completed')
                        <tr>
                            <td>{{ $order->ordered_at }}</td>
                            <td>{{ $order->testType->name ?? 'N/A' }}</td>
                            <td>{{ number_format($order->testType->price ?? 0, 0, ',', '.') }} đ</td>
                            <td>{{ $order->notes }}</td>
                        </tr>
                        @php $tongThuThuat += $order->testType->price ?? 0; @endphp
                    @endif
                @endforeach
                </tbody>
            </table>
        @else
            <p>Chưa có thủ thuật nào được hoàn thành.</p>
        @endif

        <hr>
        <h4>Đơn thuốc</h4>

        @if($patient->prescriptions)
            @foreach($patient->prescriptions as $prescription)
                <div class="card mb-3">
                    <div class="card-header">
                        <strong>Ngày kê:</strong> {{ $prescription->date }} |
                        <strong>Bác sĩ:</strong> {{ $prescription->doctor->name ?? 'Chưa rõ' }}
                    </div>
                    <div class="card-body">
                        <p><strong>Ghi chú:</strong> {{ $prescription->note }}</p>
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Tên thuốc</th>
                                <th>Liều dùng</th>
                                <th>Thời gian</th>
                                <th>Hướng dẫn</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($prescription->medicines as $item)
                                <tr>
                                    <td>{{ $item->medicine->name ?? 'Không rõ' }}</td>
                                    <td>{{ $item->dosage }}</td>
                                    <td>{{ $item->duration }}</td>
                                    <td>{{ $item->instructions }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        @else
            <p>Chưa có đơn thuốc nào.</p>
        @endif

        <hr>
        <h4>Tổng chi phí</h4>
        @php
            $phiKham = 500000;
            $tong = $phiKham + $tongThuThuat;
        @endphp
        <ul>
            <li>Phí khám: {{ number_format($phiKham, 0, ',', '.') }} đ</li>
            <li>Phí thủ thuật: {{ number_format($tongThuThuat, 0, ',', '.') }} đ</li>
            <li><strong>Tổng cộng: {{ number_format($tong, 0, ',', '.') }} đ</strong></li>
        </ul>
        <a href="{{ route('admin.ho-so-benh-an.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
    </div>
@endsection
