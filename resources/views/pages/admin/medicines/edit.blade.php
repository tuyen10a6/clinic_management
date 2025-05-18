@extends('layouts.doctor.master')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Sửa thuốc: {{ $medicine->name }}</h3>
                            </div>
                            <div class="nk-block-head-content">
                                <a href="{{ route('medicines.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                                    <em class="icon ni ni-arrow-left"></em><span>Trở lại</span>
                                </a>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->

                    <div class="card">
                        <div class="card-inner">
                            <form action="{{route('medicines.update', $medicine->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="name">Tên thuốc</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $medicine->name) }}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="unit">Đơn vị</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="unit" id="unit" class="form-control" value="{{ old('unit', $medicine->unit) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="dosage_form">Dạng thuốc</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="dosage_form" id="dosage_form" class="form-control" value="{{ old('dosage_form', $medicine->dosage_form) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="strength">Hàm lượng</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="strength" id="strength" class="form-control" value="{{ old('strength', $medicine->strength) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="usage">Cách dùng</label>
                                    <div class="form-control-wrap">
                                        <textarea name="usage" id="usage" rows="3" class="form-control">{{ old('usage', $medicine->usage) }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        <em class="icon ni ni-save"></em> <span>Lưu thay đổi</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div><!-- .card -->

                </div>
            </div>
        </div>
    </div>
@endsection
