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
                                    <h4 class="title mb-4">Cập nhật ca làm việc</h4>
                                    <form action="{{route('doctor-schedule-store')}}" method="POST">
                                        @csrf
                                        <input name="doctor_id" type="hidden"
                                               value="{{\Illuminate\Support\Facades\Auth::user()->id}}"/>
                                        <div class="row g-4">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Ngày trong tuần</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select js-select2" name="day_of_week"
                                                                required>
                                                            <option value="">-- Chọn ngày --</option>
                                                            <option value="Monday">Thứ 2</option>
                                                            <option value="Tuesday">Thứ 3</option>
                                                            <option value="Wednesday">Thứ 4</option>
                                                            <option value="Thursday">Thứ 5</option>
                                                            <option value="Friday">Thứ 6</option>
                                                            <option value="Saturday">Thứ 7</option>
                                                            <option value="Sunday">Chủ nhật</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Giờ bắt đầu</label>
                                                    <div class="form-control-wrap">
                                                        <input type="time" name="start_time" class="form-control"
                                                               required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Giờ kết thúc</label>
                                                    <div class="form-control-wrap">
                                                        <input type="time" name="end_time" class="form-control"
                                                               required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mt-4">
                                            <button type="submit" class="btn btn-primary">
                                                <em class="icon ni ni-save"></em>
                                                <span>Lưu lịch làm việc</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .nk-block -->

                    </div>
                    <hr class="my-4">

                    <h5 class="mb-3">Danh sách ca làm việc đã đăng ký</h5>
                    @if($schedules->isEmpty())
                        <p class="text-muted">Chưa có ca làm việc nào.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-light">
                                <tr>
                                    <th>Thứ</th>
                                    <th>Giờ bắt đầu</th>
                                    <th>Giờ kết thúc</th>
                                    <th>Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($schedules as $schedule)
                                    <tr>
                                        <td>{{ __($schedule->day_of_week) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}</td>
                                        <td class="d-flex align-center justify-around">
                                            @if($schedule->status === 'active')
                                                <span class="badge bg-success">Hoạt động</span>
                                            @else
                                                <span class="badge bg-secondary">Tạm ngưng</span>
                                            @endif
                                            <a href="{{route('doctor-schedule-update-view', $schedule->doctor_id)}}">
                                                <span class="badge bg-blue">Cập nhật</span>
                                            </a>
                                                <form action="{{ route('doctor-schedule-delete', $schedule->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc muốn xoá ca làm việc này?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="badge bg-blue">Xoá</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection
