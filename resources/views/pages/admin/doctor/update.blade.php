@extends('layouts/admin/master')

@section('content')
    <div class="container mt-4">
        <h4>Sửa thông tin bác sĩ</h4>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.doctor.update', $doctor->id) }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-6">
                    <label for="name" class="form-label">Họ tên</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $doctor->name) }}" required>
                </div>

                <div class="col-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $doctor->email) }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $doctor->profileDoctor->phone) }}">
                </div>

                <div class="col-6">
                    <label for="chuyen_khoa" class="form-label">Chuyên khoa</label>
                    <select name="chuyen_khoa" class="form-select" required>
                        <option value="">-- Chọn chuyên khoa --</option>
                        @foreach($chuyenKhoa as $ck)
                            <option value="{{ $ck->id }}" {{ old('chuyen_khoa', $doctor->profileDoctor->chuyen_khoa_id) == $ck->id ? 'selected' : '' }}>
                                {{ $ck->ten_chuyen_khoa }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select name="status" class="form-select" required>
                        <option value="active" {{ old('status', $doctor->profileDoctor->status) == 'active' ? 'selected' : '' }}>Hoạt động</option>
                        <option value="inactive" {{ old('status', $doctor->profileDoctor->status) == 'inactive' ? 'selected' : '' }}>Không hoạt động</option>
                    </select>
                </div>
            </div>


            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.doctor.index') }}" class="btn btn-secondary">Quay lại</a>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </div>
@endsection
