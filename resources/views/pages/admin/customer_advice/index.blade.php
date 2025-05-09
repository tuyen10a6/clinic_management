@extends('layouts.admin.master')

@section('content')
    <div class="container mt-4">
        <h4>Danh sách tư vấn khách hàng</h4>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

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
                        @else
                            <span class="badge bg-success">Hoàn thành</span>
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
