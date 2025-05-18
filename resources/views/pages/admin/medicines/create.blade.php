@extends('layouts.doctor.master')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Thêm thuốc mới</h3>
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
                            <form action="{{ route('medicines.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label class="form-label" for="name">Tên thuốc</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="unit">Đơn vị</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="unit" id="unit" class="form-control">
                                        <small class="text-muted">VD: viên, ống, lọ...</small>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="dosage_form">Dạng thuốc</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="dosage_form" id="dosage_form" class="form-control">
                                        <small class="text-muted">VD: viên nén, dung dịch...</small>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="strength">Hàm lượng</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="strength" id="strength" class="form-control">
                                        <small class="text-muted">VD: 500mg, 5mg/ml...</small>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="usage">Cách dùng</label>
                                    <div class="form-control-wrap">
                                        <textarea name="usage" id="usage" rows="3" class="form-control"></textarea>
                                        <small class="text-muted">VD: Uống sau ăn, 2 lần/ngày...</small>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        <em class="icon ni ni-save"></em> <span>Lưu thuốc</span>
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
