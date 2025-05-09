@extends('layouts.admin.master')

@section('content')
    <div class="container mt-4">
        <h4>Danh sách chuyên khoa</h4>

        <a href="{{ route('admin.chuyen-khoa.create') }}" class="btn btn-primary mb-3">+ Thêm chuyên khoa</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên chuyên khoa</th>
                <th>Chức năng</th>
            </tr>
            </thead>
            <tbody>
            @foreach($chuyenKhoa as $ck)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ck->ten_chuyen_khoa }}</td>
                    <td>
                        <a href="{{ route('admin.chuyen-khoa.edit', $ck->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                        <form method="POST" action="{{route('admin.chuyen-khoa.destroy', $ck->id)}}" style="display:inline-block">
                            @csrf
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
