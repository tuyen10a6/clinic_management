@extends('layouts.admin.master')

@section('content')
    <div class="container mt-4">
        <h4>Chỉnh sửa chuyên khoa</h4>

        <form method="POST" action="{{ route('admin.chuyen-khoa.update', $chuyenKhoa->id) }}">
            @csrf
            <div class="mb-3">
                <label for="ten_chuyen_khoa" class="form-label">Tên chuyên khoa</label>
                <input type="text" name="ten_chuyen_khoa" class="form-control" value="{{ old('ten_chuyen_khoa', $chuyenKhoa->ten_chuyen_khoa) }}" required>
            </div>
            <div class="mb-3">
                <label for="gioi_thieu_chung" class="form-label">Giới thiệu chung</label>
                <textarea class="editor" type="text" name="gioi_thieu_chung"> {{  old('gioi_thieu_chung', $chuyenKhoa->gioi_thieu_chung)  }} </textarea>
            </div>
            <button class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection
