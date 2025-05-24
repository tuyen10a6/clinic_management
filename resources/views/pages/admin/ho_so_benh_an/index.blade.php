@extends('layouts.admin.master')

@section('content')
    <div class="container mt-2">
        <h2 class=" mb-4">Danh sách bệnh nhân</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>SĐT</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($patients as $patient)
                <tr>
                    <td>{{ $patient->full_name }}</td>
                    <td>{{ $patient->gender }}</td>
                    <td>{{ $patient->birth_date }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $patient->status)) }}</td>
                    <td>
                        <a href="{{ route('admin.ho-so-benh-an.show', $patient->id) }}" class="btn btn-sm btn-primary">
                            Chi tiết
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

{{--        {{ $patients->links() }} --}}{{-- Hiển thị phân trang --}}
    </div>
@endsection
