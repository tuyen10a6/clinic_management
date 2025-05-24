@extends('layouts.doctor.master')

@section('content')
    <div class="container mt-4">
        <h4 class="mb-4">🩺 Cập nhật trạng thái khám bệnh</h4>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('doctor.lich-kham-du-bao.update', $advice->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Tên khách hàng:</label>
                        <div class="form-control-plaintext">{{ $advice->name }}</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Trạng thái khám:</label>
                        <select name="doctor_status" class="form-control">
                            <option value="arrived" {{ $advice->doctor_status == 'arrived' ? 'selected' : '' }}>Đã đến</option>
                            <option value="not_come" {{ $advice->doctor_status == 'not_come' ? 'selected' : '' }}>Chưa đến</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ghi chú bác sĩ:</label>
                        <textarea name="note_doctor" class="form-control" rows="3">{{ old('note_doctor', $advice->note_doctor) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">💾 Cập nhật</button>
                    <a href="{{ route('doctor.lich-kham-du-bao.index') }}" class="btn btn-secondary ms-2">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
@endsection
