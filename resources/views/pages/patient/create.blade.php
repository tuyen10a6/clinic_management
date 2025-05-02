@extends('layouts/doctor/master')
@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inxner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <h3 class="nk-block-title page-title">Thêm bệnh nhân mới</h3>
                            <div class="nk-block-controls">
                                <a href="{{ route('patient.index') }}" class="btn btn-outline-light btn-sm">
                                    <em class="icon ni ni-arrow-left"></em>
                                    <span>Quay lại danh sách</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- Thông báo success --}}
                    @if(session('success'))
                        <div class="alert alert-pro alert-success">
                            <em class="icon ni ni-check-circle"></em>
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif

                    {{-- Hiển thị lỗi validation --}}
                    @if($errors->any())
                        <div class="alert alert-pro alert-danger">
                            <em class="icon ni ni-cross-circle"></em>
                            <ul class="mt-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <form method="POST" action="{{route('patient.store')}}">
                                        @csrf
                                        <input type="hidden" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" name="doctor_id"/>
                                        <div class="row gy-4">
                                            {{-- Họ và tên --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Họ và tên <span
                                                            class="text-danger">*</span></label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="full_name"
                                                               value="{{ old('full_name') }}"
                                                               class="form-control"
                                                               placeholder="Nhập họ và tên" required>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Giới tính --}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Giới tính</label>
                                                    <div class="form-control-wrap">
                                                        <select name="gender" class="form-select js-select2"
                                                                data-ui="sm">
                                                            <option value="">-- Chọn --</option>
                                                            <option
                                                                value="male" {{ old('gender')=='male' ? 'selected':'' }}>
                                                                Nam
                                                            </option>
                                                            <option
                                                                value="female" {{ old('gender')=='female' ? 'selected':'' }}>
                                                                Nữ
                                                            </option>
                                                            <option
                                                                value="other" {{ old('gender')=='other' ? 'selected':'' }}>
                                                                Khác
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Ngày sinh --}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Ngày sinh</label>
                                                    <div class="form-control-wrap">
                                                        <input type="date" name="birth_date"
                                                               value="{{ old('birth_date') }}"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- SĐT --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Điện thoại</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="phone"
                                                               value="{{ old('phone') }}"
                                                               class="form-control"
                                                               placeholder="Nhập số điện thoại">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Email --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <div class="form-control-wrap">
                                                        <input type="email" name="email"
                                                               value="{{ old('email') }}"
                                                               class="form-control"
                                                               placeholder="Nhập email (nếu có)">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Địa chỉ --}}
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Địa chỉ</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="address"
                                                               value="{{ old('address') }}"
                                                               class="form-control"
                                                               placeholder="Nhập địa chỉ">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Tiền sử bệnh --}}
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Tiền sử bệnh</label>
                                                    <div class="form-control-wrap">
                                                    <textarea name="medical_history"
                                                              class="form-control"
                                                              rows="4"
                                                              placeholder="Ghi chú tiền sử bệnh">{{ old('medical_history') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Ghi chú ( nếu có)</label>
                                                    <div class="form-control-wrap">
                                                    <textarea name="note"
                                                              class="form-control"
                                                              rows="4"
                                                              placeholder="Ghi chú">{{ old('note') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Trạng thái <span class="text-danger">*</span></label>
                                                    <div class="form-control-wrap">
                                                        <select name="status" class="form-select js-select2" required>
                                                            <option value="pending"    {{ old('status')=='pending' ? 'selected':'' }}>Chờ khám</option>
                                                            <option value="in_progress"{{ old('status')=='in_progress' ? 'selected':'' }}>Đang khám</option>
                                                            <option value="completed"  {{ old('status')=='completed' ? 'selected':'' }}>Đã hoàn thành</option>
                                                            <option value="cancelled"  {{ old('status')=='cancelled' ? 'selected':'' }}>Đã huỷ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4">
                                            <button type="submit" class="btn btn-lg btn-primary">
                                                <em class="icon ni ni-save"></em>
                                                <span>Lưu bệnh nhân</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .nk-block -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
