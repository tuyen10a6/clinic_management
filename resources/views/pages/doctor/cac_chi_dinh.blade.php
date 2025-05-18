@extends('layouts.doctor.master')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="card">
                        <div class="card-header border-bottom d-flex justify-between align-center">
                            <h4 class="card-title">Chỉ định cho bệnh nhân</h4>
                            <a href="{{ url('/chi-dinh/show-print/' . $patient->id) }}" target="_blank">
                                <em  class="icon ni ni-printer fs-3"></em>
                            </a>
                        </div>
                        <div class="card-body">
                            {{-- Thông tin bệnh nhân --}}
                            <div class="mb-4">
                                <h5>Thông tin bệnh nhân</h5>
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>Họ tên:</strong> {{ $patient->full_name }}</li>
                                    <li class="list-group-item">
                                        <strong>Ngày
                                            sinh:</strong> {{ \Carbon\Carbon::parse($patient->birth_date)->format('d/m/Y') }}
                                    </li>
                                    <li class="list-group-item"><strong>Giới tính:</strong> {{ $patient->gender }}</li>
                                    <li class="list-group-item"><strong>Trạng thái:</strong>
                                        @switch($patient->status)
                                            @case('pending') Chờ khám @break
                                            @case('in_progress') Đang khám @break
                                            @case('completed') Hoàn thành @break
                                            @case('cancelled') Huỷ @break
                                            @case('no_show') Không đến @break
                                            @default Không rõ
                                        @endswitch
                                    </li>
                                </ul>
                            </div>

                            {{-- Danh sách các chỉ định đã lưu --}}
                            <div class="mb-4">
                                <h5>Chỉ định đã lưu</h5>

                                @if($listTestOrder->isEmpty())
                                    <p>Chưa có chỉ định nào.</p>
                                @else
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Tên chỉ định</th>
                                            <th>Bác sĩ chỉ định</th>
                                            <th>Giá tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Ghi chú</th>
                                            <th>Ngày tạo</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($listTestOrder as $order)
                                            <tr>
                                                <td>{{ $order->testType->name ?? 'Không rõ' }}</td>
                                                <td>{{ $order->doctor->name ?? 'Không rõ' }}</td>
                                                <td>{{ isset($order->testType->price) ? number_format($order->testType->price, 0, ',', '.') . ' VNĐ' : 'Không rõ' }}</td>
                                                <td>
                                                    <form
                                                        action="{{route('doctor.chi-dinh.update', $order->id)}}"
                                                        method="POST">
                                                        @csrf
                                                        <select name="status" class="form-select form-select-sm w-120px"
                                                                onchange="this.form.submit()">
                                                            <option
                                                                value="ordered" {{ $order->status === 'ordered' ? 'selected' : '' }}>
                                                                Chờ
                                                            </option>
                                                            <option
                                                                value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>
                                                                Xong
                                                            </option>
                                                            <option
                                                                value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>
                                                                Huỷ
                                                            </option>
                                                        </select>
                                                    </form>
                                                </td>
                                                <td>{{ $order->notes ?? '-' }}</td>
                                                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                            {{-- Form thêm chỉ định mới --}}
                            <form action="{{ route('doctor.chi-dinh.store') }}" method="POST">
                                @csrf
                                <input name="doctor_id" type="hidden" value="{{ $patient->doctor_id }}"/>
                                <input name="patient_id" type="hidden" value="{{ $patient->id }}"/>
                                <h5 class="mb-3">Chọn chỉ định mới</h5>
                                <div class="row">
                                    @foreach($chiDinh as $test)
                                        <div class="col-md-6 mb-3">
                                            <div class="form-check p-3 border rounded">
                                                <input type="checkbox" name="tests[]" value="{{ $test->id }}"
                                                       class="form-check-input" id="test_{{ $test->id }}">
                                                <label class="form-check-label d-block" for="test_{{ $test->id }}">
                                                    <strong>{{ $test->name }}</strong><br>
                                                    <small>Giá: {{ number_format($test->price, 0, ',', '.') }}
                                                        VNĐ</small>
                                                </label>
                                                <div class="mt-2">
                                                    <label for="note_{{ $test->id }}" class="form-label">Ghi
                                                        chú:</label>
                                                    <input type="text" name="notes[]" class="form-control"
                                                           id="note_{{ $test->id }}" placeholder="Nhập ghi chú nếu có">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="mt-4 d-flex justify-between">
                                    <div>
                                        <button type="submit" class="btn btn-primary">Lưu chỉ định</button>
                                        <a href="{{route('patient.index')}}" class="btn btn-light">Quay lại</a>
                                    </div>
                                    <div class="float-end">
                                        <button type="submit" class="btn btn-primary">Hoàn thành</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
