@extends('layouts.customer.master')

@section('content')
    <div class="nk-content">
        <div class="container w-100">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="row">
                                        <!-- Avatar + Tên + Chuyên khoa -->
                                        <div class="col-md-4 text-center">
                                            <div>
                                                <img src="{{ asset('storage/' . $data->image) }}"
                                                     alt="Avatar"
                                                     class="rounded-circle"
                                                     style="max-width: 180px; height: 180px; object-fit: cover; border: 4px solid #e5e9f2;">
                                            </div>
                                            <span class="badge badge-dim badge-outline-info">
                                            {{ $data->profileDoctor->chuyenKhoa->ten_chuyen_khoa ?? 'Chưa có chuyên khoa' }}
                                        </span>
                                        </div>
                                        <div class="col-md-4 text-center mt-3">
                                            <div>
                                                <h5 class="mt-3 mb-1 text-primary">{{ $data->name }}</h5>
                                                 <span class="text-primary fs-18px"> Chuyên khoa:
                                                    {{ $data->profileDoctor->chuyenKhoa->ten_chuyen_khoa ?? 'Chưa có chuyên khoa' }}
                                                </span>
                                                <br/>
                                                <span class="text-primary fs-18px">
                                                    {{ $data->profileDoctor->bio ?? '' }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center mt-3" style="">
                                            <div
                                                style="display: flex; align-items: center; justify-content: center; border: 1px solid #cfe2f3; border-radius: 6px; padding: 15px 10px; background-color: #f9feff; margin-bottom: 20px;">
                                                <div
                                                    style="width: 60px; height: 60px; background-color: #204e87; border-radius: 50%; color: white; display: flex; align-items: center; justify-content: center; font-size: 26px; margin-right: 12px;">
                                                    <i class="fas fa-phone-alt"></i>
                                                </div>
                                                <div style="text-align: left;">
                                                    <div style="color: #1a1a1a; font-weight: 500;">Tư vấn miễn phí</div>
                                                    <div style="font-size: 20px; font-weight: bold; color: #e53935;">
                                                        1900 3366
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{route('customer_schedule_doctor')}}"
                                               style="background-color: #204e87; color: white; border: none; border-radius: 50px; padding: 12px 30px; font-size: 16px; font-weight: 600; cursor: pointer; width: 100%;">
                                                ĐẶT LỊCH KHÁM
                                            </a>
                                        </div>
                                    </div> <!-- .row -->
                                    <!-- Thông tin chi tiết -->
                                    <div class="col-md-12">
                                        <h6 class="title mb-3">Thông tin chi tiết</h6>
                                        <div class="row gy-2">
                                            <div class="col-sm-6">
                                                <span class="text-soft">Email:</span>
                                                <div>{{ $data->email }}</div>
                                                <h6 class="title mb-2 mt-5">Học vấn & Công tác</h6>
                                                <div class="gy-2 ">
                                                    <div>{!! $data->profileDoctor->hoc_van ?? 'Chưa cập nhật' !!}</div>

                                                    <p class="mt-3"><strong>Quá trình công tác:</strong></p>
                                                    <div>{!! $data->profileDoctor->qua_trinh_cong_tac ?? 'Chưa cập nhật' !!}</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="title mb-3">Giới thiệu:</h6>
                                                <div>{!! $data->profileDoctor->gioi_thieu_chung ?? 'Chưa cập nhật' !!}</div>
                                            </div>
                                        </div>

                                        <hr class="mt-4 mb-3">

                                        <!-- Học vấn & Công tác -->
                                    </div>
                                </div> <!-- .card-inner -->
                            </div> <!-- .card -->
                        </div> <!-- .nk-block -->
                    </div> <!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
@endsection
