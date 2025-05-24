@extends('layouts.doctor.master')

@section('content')
    <div class="container">
        <h3 class="mb-4">Danh sách kê đơn</h3>
        <div class="container mb-3">
            <form method="GET" action="{{ route('doctor.ke-don-thuoc.index') }}" class="row g-3">
                <div class="col-auto">
                    <input type="text" name="search" class="form-control" placeholder="Tìm tên bệnh nhân..." value="{{ $search ?? '' }}">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">🔍 Tìm kiếm</button>
                </div>
                <div class="col-auto">
                    <a href="{{ route('doctor.ke-don-thuoc.index') }}" class="btn btn-secondary">🔄 Đặt lại</a>
                </div>
            </form>
        </div>


        {{-- Nút chức năng --}}
        <div class="mb-3 d-flex justify-content-between">
            <div>
                <a href="{{ route('doctor.ke-don-thuoc.create') }}" class="btn btn-primary">
                    + Thêm đơn thuốc
                </a>
            </div>
        </div>

        {{-- Thông báo thành công --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Bảng đơn thuốc --}}
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Bệnh nhân</th>
                <th>Bác sĩ</th>
                <th>Ngày tạo</th>
                <th>Chi tiết thuốc</th>
                <th>Chức năng</th>
            </tr>
            </thead>
            <tbody>
            @forelse($prescriptions as $prescription)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $prescription->patient->full_name ?? 'N/A' }}</td>
                    <td>{{ $prescription->doctor->name ?? 'N/A' }}</td>
                    <td>{{ $prescription->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <ul>
                            @foreach($prescription->medicines as $item)
                                <li>
                                    <strong>{{ $item->medicine->name ?? 'Thuốc đã xóa' }}</strong>
                                    - Liều: {{ $item->dosage }}
                                    - Thời gian: {{ $item->duration }}
                                    @if($item->instructions)
                                        - Ghi chú: {{ $item->instructions }}
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{route('doctor.ke-don-thuoc.show', $prescription->id)}}" class="btn btn-info btn-sm">Xem</a>
                        <a target="_blank" href="{{route('doctor.ke-don-thuoc.print', $prescription->id)}}"
                           class="btn btn-warning btn-sm">In</a>
    {{--                        <form class="mt-1" action="" method="POST" style="display:inline-block;"--}}
    {{--                              onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn thuốc này?');">--}}
    {{--                            @csrf--}}
    {{--                            @method('DELETE')--}}
    {{--                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>--}}
    {{--                        </form>--}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Không có đơn thuốc nào.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
