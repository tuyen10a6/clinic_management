@extends('layouts/admin/master')

@section('content')
    <div class="container mt-4">
        <h4>Chi tiết bác sĩ</h4>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $doctor->name }}</h5>
                <p><strong>Email:</strong> {{ $doctor->email }}</p>
                <p><strong>Số điện thoại:</strong> {{ $doctor->profileDoctor->phone ?? '---' }}</p>
                <p><strong>Chuyên khoa:</strong> {{ $doctor->profileDoctor->chuyenKhoa->ten_chuyen_khoa ?? '---' }}</p>
                <p><strong>Trạng thái:</strong>
                    @if($doctor->profileDoctor->status === 'active')
                        <span class="badge bg-success">Đang hoạt động</span>
                    @else
                        <span class="badge bg-secondary">Ngưng hoạt động</span>
                    @endif
                </p>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('admin.doctor.index') }}" class="btn btn-secondary">Quay lại</a>
            <a href="{{ route('admin.doctor.edit', $doctor->id) }}" class="btn btn-primary">Sửa thông tin</a>
        </div>
    </div>
@endsection
