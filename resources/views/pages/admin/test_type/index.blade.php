@extends('layouts.admin.master')

@section('content')
    <div class="container mt-4">

        {{-- Tiêu đề & Thêm mới --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Danh sách loại xét nghiệm</h4>
        </div>

        {{-- Thông báo --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row gy-4">
            {{-- Form thêm mới --}}
            <div class="col-md-4">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <h5 class="card-title">Thêm loại xét nghiệm</h5>
                        <form action="{{ route('admin.test-types.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label">Tên loại <span class="text-danger">*</span></label>
                                <input type="text" name="name"
                                       value="{{ old('name') }}"
                                       class="form-control"
                                       placeholder="VD: Xét nghiệm máu" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Giá tiền (VNĐ) <span class="text-danger">*</span></label>
                                <input type="number" name="price" step="0.01"
                                       value="{{ old('price') }}"
                                       class="form-control"
                                       placeholder="VD: 150000" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <em class="icon ni ni-plus"></em> Thêm mới
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Bảng danh sách --}}
            <div class="col-md-8">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên loại</th>
                                <th>Giá tiền (VNĐ)</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $type)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $type->name }}</td>
                                    <td>{{ number_format($type->price, 0, ',', '.') }}</td>
                                    <td class="text-nowrap">
                                        <a href="{{route('test-type.edit', $type->id)}}" class="btn btn-sm btn-info">
                                            Sửa
                                        </a>
                                        <form action="{{route('admin.test-types.destroy', $type->id)}}" method="POST" style="display:inline" onsubmit="return confirm('Xác nhận xoá loại xét nghiệm này?')">
                                            @csrf
                                            <button class="btn btn-sm btn-danger">Xoá</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($data->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Chưa có loại xét nghiệm nào.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
