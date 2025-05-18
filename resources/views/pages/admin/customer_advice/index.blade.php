@extends('layouts.admin.master')

@section('content')
    <div class="container mt-4">
        <h4>Danh sách tư vấn khách hàng</h4>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="GET" class="row g-3 mb-4">
            <div class="col-md-3">
                <input type="text" name="name" class="form-control" placeholder="Tìm theo tên"
                       value="{{ request('name') }}">
            </div>
            <div class="col-md-2">
                <input type="text" name="phone" class="form-control" placeholder="Tìm theo SĐT"
                       value="{{ request('phone') }}">
            </div>
            <div class="col-md-2">
                <select name="status" class="form-select">
                    <option value="">-- Trạng thái --</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                    <option value="called" {{ request('status') == 'called' ? 'selected' : '' }}>Đã gọi</option>
                    <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Hoàn tất</option>
                    <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>Huỷ</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary">Tìm kiếm</button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('admin.customer-advice.index') }}" class="btn btn-secondary">Làm mới</a>
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Tên</th>
                <th>SĐT</th>
                <th>Ghi chú</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->note }}</td>
                    <td>
                        @if($item->status == 'pending')
                            <span class="badge bg-warning">Chờ xử lý</span>
                        @elseif($item->status == 'called')
                            <span class="badge bg-info">Đã gọi</span>
                        @elseif($item->status == 'done')
                            <span class="badge bg-success">Hoàn thành</span>
                        @else
                            <span class="badge bg-danger">H</span>
                        @endif
                    </td>
                    <td class="text-nowrap">
                        <a href="{{ route('admin.customer-advice.edit', $item->id) }}"
                           class="btn btn-sm btn-info">Sửa</a>
                        {{--                        <form action="{{ route('admin.customer-advice.destroy', $item->id) }}" method="POST"--}}
                        {{--                              style="display:inline-block">--}}
                        {{--                            @csrf--}}
                        {{--                            <button class="btn btn-sm btn-danger" onclick="return confirm('Xoá?')">Xoá</button>--}}
                        {{--                        </form>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
