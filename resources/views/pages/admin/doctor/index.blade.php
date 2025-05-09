@extends('layouts/admin/master')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <h4>Danh sách bác sĩ</h4>
            <a href="{{ route('admin.doctor.create') }}" class="btn btn-primary">+ Thêm bác sĩ</a>
        </div>


        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form method="GET" class="row g-3 mb-4">
            <div class="col-md-3">
                <input type="text" name="name" class="form-control" placeholder="Tìm theo tên bác sĩ"
                       value="{{ request('name') }}">
            </div>
            <div class="col-md-3">
                <select name="chuyen_khoa" class="form-select">
                    <option value="">-- Chọn chuyên khoa --</option>
                    @foreach($chuyenKhoaList as $ck)
                        <option value="{{ $ck->id }}" {{ request('chuyen_khoa') == $ck->id ? 'selected' : '' }}>
                            {{ $ck->ten_chuyen_khoa }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">-- Trạng thái --</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Đang hoạt động</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Ngưng hoạt động
                    </option>
                </select>
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary">Tìm</button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('admin.doctor.index') }}" class="btn btn-secondary">Làm mới</a>
            </div>
        </form>


        <table class="table table-bordered">
            <thead class="table-light">
            <tr>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Chuyên khoa</th>
                <th>Trạng thái</th>
                <th>Chức năng</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $doctor)
                <tr>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->email }}</td>
                    <td>{{ $doctor->profileDoctor->phone ?? '---' }}</td>
                    <td>{{ $doctor->profileDoctor->chuyenKhoa->ten_chuyen_khoa ?? '---' }}</td>
                    <td>
                        @if($doctor->profileDoctor->status == 'active')
                            <span class="badge bg-success">Đang hoạt động</span>
                        @else
                            <span class="badge bg-secondary">Ngưng hoạt động</span>
                        @endif
                    </td>
                    <td class="text-nowrap">
                        <a href="{{route('admin.doctor.show', $doctor->id)}}" class="btn btn-sm btn-secondary">Chi
                            tiết</a>
                        <a href="{{ route('admin.doctor.edit', $doctor->id) }}" class="btn btn-sm btn-info">Sửa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
