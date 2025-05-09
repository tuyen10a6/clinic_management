@extends('layouts.admin.master')

@section('content')
    <div class="container mt-4">
        <h4 class="mb-3">Lịch làm việc bác sĩ</h4>

        <form method="GET" class="row g-3 mb-4">
            <div class="col-md-2">
                <input type="text" name="name" class="form-control" placeholder="Tìm tên bác sĩ" value="{{ request('name') }}">
            </div>
            <div class="col-md-3">
                <select name="chuyen_khoa" class="form-select">
                    <option value="">-- Chuyên khoa --</option>
                    @foreach($chuyenKhoaList as $ck)
                        <option value="{{ $ck->id }}" {{ request('chuyen_khoa') == $ck->id ? 'selected' : '' }}>
                            {{ $ck->ten_chuyen_khoa }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <input type="date" name="date" class="form-control" value="{{ request('date') }}">
            </div>
            <div class="col-md-2">
                <select name="day_of_week" class="form-select">
                    <option value="">-- Thứ --</option>
                    @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                        <option value="{{ $day }}" {{ request('day_of_week') == $day ? 'selected' : '' }}>
                            {{ $day }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary">Tìm</button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('admin.doctor.schedule.index') }}" class="btn btn-secondary">Làm mới</a>
            </div>
        </form>

        <table class="table table-bordered">
            <thead class="table-light">
            <tr>
                <th>Bác sĩ</th>
                <th>Chuyên khoa</th>
                <th>Thứ</th>
                <th>Ngày</th>
                <th>Giờ bắt đầu</th>
                <th>Giờ kết thúc</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @forelse($data as $item)
                <tr>
                    <td>{{ $item->doctor->name ?? '---' }}</td>
                    <td>{{ $item->doctor->profileDoctor->chuyenKhoa->ten_chuyen_khoa ?? '---' }}</td>
                    <td>{{ $item->day_of_week }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->start_time)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->start_time)->format('H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->end_time)->format('H:i') }}</td>
                    <td>
                        @if($item->status === 'active')
                            <span class="badge bg-success">Hoạt động</span>
                        @else
                            <span class="badge bg-secondary">Ngưng</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('admin.doctor_schedule.toggleStatus', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm {{ $item->status === 'active' ? 'btn-warning' : 'btn-success' }}">
                                {{ $item->status === 'active' ? 'OFF' : 'ON' }}
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Không có dữ liệu phù hợp</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
