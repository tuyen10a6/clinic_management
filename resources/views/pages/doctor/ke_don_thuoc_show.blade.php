@extends('layouts.doctor.master')

@section('content')
    <div class="container">
        <h2 class="mb-4">Chi tiết đơn thuốc</h2>

        <div class="mb-3">
            <a href="{{ route('doctor.ke-don-thuoc.index') }}" class="btn btn-secondary">← Quay lại danh sách</a>
        </div>

        {{-- Thông tin đơn thuốc --}}
        <table class="table table-bordered">
            <tr>
                <th>Bệnh nhân</th>
                <td>{{ $prescription->patient->full_name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Bác sĩ</th>
                <td>{{ $prescription->doctor->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Ngày tạo</th>
                <td>{{ $prescription->created_at->format('d/m/Y H:i') }}</td>
            </tr>
        </table>

        {{-- Danh sách thuốc --}}
        <h4 class="mt-4">Thuốc kê đơn</h4>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên thuốc</th>
                <th>Liều dùng</th>
                <th>Thời gian</th>
                <th>Ghi chú</th>
            </tr>
            </thead>
            <tbody>
            @forelse($prescription->medicines as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->medicine->name ?? 'Thuốc đã xóa' }}</td>
                    <td>{{ $item->dosage }}</td>
                    <td>{{ $item->duration }}</td>
                    <td>{{ $item->instructions ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Không có thuốc nào trong đơn này.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
