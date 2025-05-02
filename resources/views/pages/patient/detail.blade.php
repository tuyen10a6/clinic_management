@extends('layouts/doctor/master')

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <h3 class="nk-block-title page-title">Chi tiết bệnh nhân</h3>
                            <div class="nk-block-controls">
                                <a href="{{ route('patient.index') }}" class="btn btn-outline-light btn-sm">
                                    <em class="icon ni ni-arrow-left"></em>
                                    <span>Quay lại</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="components-preview wide-md mx-auto">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <dl class="row gy-3">
                                    <dt class="col-sm-3">Họ và tên</dt>
                                    <dd class="col-sm-9">{{ $patient->full_name }}</dd>

                                    <dt class="col-sm-3">Giới tính</dt>
                                    <dd class="col-sm-9">{{ $patient->gender ? ucfirst($patient->gender) : '—' }}</dd>

                                    <dt class="col-sm-3">Ngày sinh</dt>
                                    <dd class="col-sm-9">
                                        {{ $patient->birth_date ? \Carbon\Carbon::parse($patient->birth_date)->format('d/m/Y') : '—' }}
                                    </dd>

                                    <dt class="col-sm-3">Điện thoại</dt>
                                    <dd class="col-sm-9">{{ $patient->phone ?? '—' }}</dd>

                                    <dt class="col-sm-3">Email</dt>
                                    <dd class="col-sm-9">{{ $patient->email ?? '—' }}</dd>

                                    <dt class="col-sm-3">Địa chỉ</dt>
                                    <dd class="col-sm-9">{{ $patient->address ?? '—' }}</dd>

                                    <dt class="col-sm-3">Tiền sử bệnh</dt>
                                    <dd class="col-sm-9">{!! nl2br(e($patient->medical_history)) ?? '—' !!}</dd>

                                    <dt class="col-sm-3">Ghi chú</dt>
                                    <dd class="col-sm-9">{!! nl2br(e($patient->notes)) ?? '—' !!}</dd>

                                    <dt class="col-sm-3">Bác sĩ khám</dt>
                                    <dd class="col-sm-9">{{ $patient->doctor->name ?? '—' }}</dd>

                                    <dt class="col-sm-3">Trạng thái</dt>
                                    <dd class="col-sm-9">{{ ucfirst(str_replace('_', ' ', $patient->status)) }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
