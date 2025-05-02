@extends('layouts/doctor/master')
@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <h4>Danh sách bệnh nhân</h4>
            <a href="{{route('patient.create')}}" class="btn btn-primary">+ Thêm bệnh nhân</a>
        </div>
        <form method="GET" action="{{ route('patient.index') }}" class="row g-2 mb-4">
            <div class="col-md-5">
                <input type="text" name="full_name"
                       value="{{ request('full_name') }}"
                       class="form-control"
                       placeholder="Tìm theo họ tên">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">-- Chọn trạng thái --</option>
                    <option value="pending"     {{ request('status')=='pending'     ? 'selected':'' }}>Chờ khám</option>
                    <option value="in_progress" {{ request('status')=='in_progress' ? 'selected':'' }}>Đang khám</option>
                    <option value="completed"   {{ request('status')=='completed'   ? 'selected':'' }}>Hoàn thành</option>
                    <option value="cancelled"   {{ request('status')=='cancelled'   ? 'selected':'' }}>Huỷ</option>
                    <option value="no_show"     {{ request('status')=='no_show'     ? 'selected':'' }}>Không đến</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-secondary w-100">Lọc</button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('patient.index') }}" class="btn btn-light w-100">Reset</a>
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Thời gian</th>
                <th>Trạng thái</th>
                <th>Chức năng</th>
            </tr>
            </thead>
            <tbody>
            @foreach($patients as $patient)
                <tr>
                    <td>{{ $patient->full_name }}</td>
                    <td>{{ $patient->gender }}</td>
                    <td>{{ $patient->birth_date }}</td>
                    <td>{{ $patient->created_at }}</td>
                    <td class="text-primary">{{ $patient->status }}</td>
                    <td class="text-nowrap">
                        <a href="{{route('patient.detail', $patient->id)}}" class="btn btn-sm btn-secondary">
                            Chi tiết
                        </a>
                        <a href="{{route('patient.edit', $patient->id)}}" class="btn btn-sm btn-info">
                            Sửa
                        </a>
                        <form action="{{route('patient.destroy.post', $patient->id)}}" method="POST"
                              style="display:inline" onsubmit="return confirm('Xác nhận xoá?')">
                            @csrf
                            <button class="btn btn-sm btn-danger">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $patients->links() }}
    </div>
@endsection
