@extends('layouts.admin.master')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Danh sách thuốc</h3>
                                <div class="nk-block-des text-soft">
                                    <p>Quản lý các loại thuốc kê đơn.</p>
                                </div>
                            </div>

                            <div class="nk-block-head-content">
                                <a href="{{ route('medicines.create') }}" class="btn btn-primary">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Thêm thuốc mới</span>
                                </a>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <form action="{{ route('medicines.index') }}" method="GET"
                          class="form-inline mb-3 d-flex align-center">
                        <div class="form-group m-0">
                            <input type="text" name="search" class="form-control" placeholder="Tìm theo tên thuốc"
                                   value="{{ request('search') }}">
                        </div>
                        <button type="submit" class="btn btn-outline-primary ms-5">Tìm kiếm</button>
                    </form>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <table class="datatable-init table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên thuốc</th>
                                    <th>Đơn vị</th>
                                    <th>Dạng bào chế</th>
                                    <th>Hàm lượng</th>
                                    <th>Hướng dẫn</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($medicines as $medicine)
                                    <tr>
                                        <td>{{ $medicine->id }}</td>
                                        <td>{{ $medicine->name }}</td>
                                        <td>{{ $medicine->unit }}</td>
                                        <td>{{ $medicine->dosage_form }}</td>
                                        <td>{{ $medicine->strength }}</td>
                                        <td>{{ $medicine->usage }}</td>
                                        <td>
                                            <a href="{{ route('medicines.edit', $medicine->id) }}"
                                               class="btn btn-sm btn-warning">
                                                <em class="icon ni ni-edit"></em>
                                            </a>
                                            <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST"
                                                  style="display:inline-block;">
                                                @csrf
                                                <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                                                    <em class="icon ni ni-trash"></em>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($medicines->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-center">Không có thuốc nào.</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div><!-- .card -->

                </div>
            </div>
        </div>
    </div>
@endsection
