@extends('layouts.doctor.master')

@section('content')
    <div class="container mt-4">
        <h3 class="mb-4">Quản lý lịch khám</h3>
        <form method="GET" action="{{ route('doctor.lich-kham-du-bao.index') }}" class=" form-inline mb-4">
            <div class="form-group mr-2">
                <label for="date" class="mr-2">Chọn ngày:</label>
                <input type="date" id="date" name="date" value="{{ request('date') }}" class="form-control form-control-sm me-2" style="width: 150px;">
            </div>
            <div class="form-group mr-2">
                <label for="doctor_status" class="mr-2">Chọn trạng thái:</label>
                <select id="doctor_status" name="doctor_status" class="form-control form-control-sm me-2" style="width: 150px;">
                    <option value="">-- Tất cả --</option>
                    <option value="arrived" {{ request('doctor_status') == 'arrived' ? 'selected' : '' }}>Đã đến</option>
                    <option value="not_come" {{ request('doctor_status') == 'not_come' ? 'selected' : '' }}>Chưa đến</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success btn-sm mr-2">Tìm kiếm</button>

            <a href="{{ route('doctor.lich-kham-du-bao.index') }}" class="ms-3 btn btn-outline-secondary btn-sm">Làm mới</a>
        </form>

    @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>SĐT</th>
                <th>Ghi chú khách</th>
                <th>Ghi chú bác sĩ</th>
                <th>Ngày hẹn</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @forelse($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td >{{ $item->note }}</td>
                    <td class="w-200px"> {{ $item->note_doctor ?? '-'  }}</td>
                    <td>
                        {{ $item->date ? \Carbon\Carbon::parse($item->date)->format('d/m/Y') : '-' }}
                    </td>
                    <td>
                        @if ($item->doctor_status === 'not_come')
                            <span class="badge badge-dot bg-dark">Chưa đến</span>
                        @else
                            <span class="badge badge-dot bg-success">Đã đến</span>
                        @endif
                    </td>
                    <td>
                       <a href="{{route('doctor.lich-kham-du-bao.edit', $item->id)}}" class="btn btn-primary">Sửa</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Không có lịch khám nào.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
