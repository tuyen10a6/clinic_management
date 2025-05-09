@extends('layouts.admin.master')

@section('content')
    <div class="container mt-4">
        <h4>Thêm chuyên khoa</h4>

        <form method="POST" action="{{ route('admin.chuyen-khoa.store') }}">
            @csrf
            <div class="mb-3">
                <label for="ten_chuyen_khoa" class="form-label">Tên chuyên khoa</label>
                <input type="text" name="ten_chuyen_khoa" class="form-control" value="{{ old('ten_chuyen_khoa') }}" required>
            </div>
            <button class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
