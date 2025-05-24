@extends('layouts.admin.master')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Danh sách bệnh nhân</h2>

        <form method="GET" action="{{ route('admin.quan-ly-lich-kham.index') }}" class="row g-3 mb-4">
            <div class="col-md-3">
                <input type="text" name="name" class="form-control" placeholder="Tìm theo tên"
                       value="{{ request('name') }}">
            </div>
            <div class="col-md-3">
                <input type="date" name="birth_date" class="form-control"
                       value="{{ request('birth_date') }}">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">-- Tất cả trạng thái --</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Chờ khám</option>
                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>Đang khám</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Đã huỷ</option>
                    <option value="no_show" {{ request('status') == 'no_show' ? 'selected' : '' }}>Không đến</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary">Tìm kiếm</button>
                <a href="{{ route('admin.quan-ly-lich-kham.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>

    @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover">
            <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>SĐT</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($patients as $patient)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $patient->full_name }}</td>
                    <td>{{ ucfirst($patient->gender ?? '-') }}</td>
                    <td>{{ $patient->birth_date ? \Carbon\Carbon::parse($patient->birth_date)->format('d/m/Y') : '-' }}</td>
                    <td>{{ $patient->phone ?? '-' }}</td>
                    <td>{{ $patient->email ?? '-' }}</td>
                    <td>{{ $patient->address ?? '-' }}</td>
                    <td>
                        @switch($patient->status)
                            @case('pending') Chờ xử lý @break
                            @case('in_progress') Đang xử lý @break
                            @case('completed') Hoàn thành @break
                            @case('cancelled') Đã hủy @break
                            @case('no_show') Không đến @break
                            @default -
                        @endswitch
                    </td>
                    <td>
                        <a href="{{route('admin.quan-ly-lich-kham.show', $patient->id)}}" class="btn btn-sm btn-info">Xem</a>
                        <a href="" class="btn btn-sm btn-warning">Sửa</a>
{{--                        <form action="{{ route('doctor.patients.destroy', $patient->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn chắc chắn muốn xoá?')">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <button class="btn btn-sm btn-danger">Xoá</button>--}}
{{--                        </form>--}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11" class="text-center">Không có bệnh nhân nào.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
