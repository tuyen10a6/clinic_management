@extends('layouts/doctor/master')
@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <h4 class="title mb-4">Chỉnh sửa ca làm việc</h4>
                                    <form action="{{ route('doctor-schedule-update-post', $schedule->id) }}" method="POST">
                                        @csrf
                                        <input name="doctor_id" type="hidden" value="{{ $schedule->doctor_id }}"/>

                                        <div class="row g-4">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Ngày trong tuần</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select js-select2" name="day_of_week" required>
                                                            @foreach(['Monday' => 'Thứ 2', 'Tuesday' => 'Thứ 3', 'Wednesday' => 'Thứ 4', 'Thursday' => 'Thứ 5', 'Friday' => 'Thứ 6', 'Saturday' => 'Thứ 7', 'Sunday' => 'Chủ nhật'] as $day => $label)
                                                                <option value="{{ $day }}" @if($schedule->day_of_week == $day) selected @endif>{{ $label }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Giờ bắt đầu</label>
                                                    <div class="form-control-wrap">
                                                        <input type="time" name="start_time" class="form-control"
                                                               value="{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Giờ kết thúc</label>
                                                    <div class="form-control-wrap">
                                                        <input type="time" name="end_time" class="form-control"
                                                               value="{{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Trạng thái</label>
                                                    <div class="form-control-wrap">
                                                        <select name="status" class="form-select">
                                                            <option value="active" {{ $schedule->status == 'active' ? 'selected' : '' }}>Hoạt động</option>
                                                            <option value="inactive" {{ $schedule->status == 'inactive' ? 'selected' : '' }}>Tạm ngưng</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mt-4">
                                            <button type="submit" class="btn btn-warning">
                                                <em class="icon ni ni-edit-fill"></em>
                                                <span>Cập nhật</span>
                                            </button>
                                            <a href="{{ route('doctor-schedule-view') }}" class="btn btn-light ms-2">Quay lại</a>
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

