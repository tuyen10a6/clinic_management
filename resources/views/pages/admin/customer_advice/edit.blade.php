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
                <label>Ghi chú khách hàng</label>
                <input type="text" name="note" class="form-control" value="{{ $advice->note }}">
            </div>

            <div class="mb-3">
                <label>Trạng thái</label>
                <select name="status" class="form-select">
                    <option value="pending" {{ $advice->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                    <option value="called" {{ $advice->status == 'called' ? 'selected' : '' }}>Đã gọi</option>
                    <option value="done" {{ $advice->status == 'done' ? 'selected' : '' }}>Hoàn thành</option>
                    <option value="canceled" {{ $advice->status == 'canceled' ? 'selected' : '' }}>Huỷ</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Bác sĩ mong muốn khám</label>
                <select name="doctor_id" class="form-select">
                    <option value="">-- Để trống --</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ $advice->doctor_id == $doctor->id ? 'selected' : '' }}>
                            {{ $doctor->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Ghi chú dành cho bác sĩ</label>
                <input type="text" name="note_doctor" class="form-control" value="{{ $advice->note_doctor }}">
            </div>

            <div class="mb-3">
                <label>Ngày dự kiến khám</label>
                <input type="date" name="date" class="form-control" value="{{ $advice->date }}">
            </div>
            <button class="btn btn-success">Cập nhật</button>
        </form>
    </div>
@endsection
