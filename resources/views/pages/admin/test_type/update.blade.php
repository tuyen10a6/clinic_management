@extends('layouts/admin/master')

@section('content')
    <div class="container mt-4">
        <h4 class="mb-3">Cập nhật loại xét nghiệm</h4>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.test-types.update', $data->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên xét nghiệm</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $data->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá tiền (VNĐ)</label>
                <input type="number" step="0.001" name="price" class="form-control" value="{{ old('price', $data->price) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('test-type.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
