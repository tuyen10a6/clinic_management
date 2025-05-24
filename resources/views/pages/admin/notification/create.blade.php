@extends('layouts.admin.master')

@section('content')
    <div class="container mt-4">
        <h4 class="mb-3">📢 Gửi thông báo đến bác sĩ</h4>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.notification.send') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="user_receiver" class="form-label">Chọn bác sĩ</label>
                <select name="user_receiver" id="user_receiver" class="form-select" required>
                    <option value="">-- Chọn bác sĩ --</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">
                            {{ $doctor->name }} ({{ $doctor->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Tiêu đề</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Nội dung</label>
                <textarea name="content" id="content" rows="4" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Gửi thông báo</button>
        </form>
    </div>
@endsection
