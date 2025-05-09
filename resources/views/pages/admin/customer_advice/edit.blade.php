@extends('layouts.admin.master')

@section('content')
    <div class="container mt-4">
        <h4>Cập nhật yêu cầu tư vấn</h4>

        <form action="{{ route('admin.customer-advice.update', $advice->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Tên</label>
                <input type="text" name="name" class="form-control" value="{{ $advice->name }}" required>
            </div>
            <div class="mb-3">
                <label>SĐT</label>
                <input type="text" name="phone" class="form-control" value="{{ $advice->phone }}" required>
            </div>
            <div class="mb-3">
                <label>Ghi chú</label>
                <input type="text" name="note" class="form-control" value="{{ $advice->note }}">
            </div>
            <div class="mb-3">
                <label>Trạng thái</label>
                <select name="status" class="form-select">
                    <option value="pending" {{ $advice->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                    <option value="called" {{ $advice->status == 'called' ? 'selected' : '' }}>Đã gọi</option>
                    <option value="done" {{ $advice->status == 'done' ? 'selected' : '' }}>Hoàn thành</option>
                </select>
            </div>
            <button class="btn btn-success">Cập nhật</button>
        </form>
    </div>
@endsection
