@extends('layouts/doctor/master')
<?php

use Illuminate\Support\Facades\Auth;

?>
@section('content')
    <div class="row g-gs justify-center">
        <div class="col-lg-9">
            <div class="card h-100">
                <div class="card-inner">
                    <div class="card-head"><h5 class="card-title">Thông tin bác sĩ</h5></div>
                    <form action="{{route('doctor-update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group"><label class="form-label" for="full-name">Họ và tên</label>
                            <div class="form-control-wrap"><input name="name" type="text"
                                                                  value=" {{old('name', Auth::user()->name )}}"
                                                                  class="form-control" id="full-name"></div>
                        </div>
                            <div class="form-group d-flex align-items-center mt-3">
                                <input name="image" type="file" class="form-control w-250px" id="image">
                                <div class="image-control ms-3">
                                    <img class="w-200px" style="border-radius: 30px"
                                         src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('statics/images/profile-default.png') }}" />
                                </div>
                            </div>
                        <div class="form-group"><label class="form-label" for="email-address">Địa chỉ email</label>
                            <div class="form-control-wrap"><input name="email"
                                                                  value="{{old('email', Auth::user()->email )}}"
                                                                  type="text"
                                                                  class="form-control" id="email-address">
                            </div>
                        </div>
                        <div class="form-group"><label class="form-label" for="phone-no">Số điện thoại</label>
                            <div class="form-control-wrap"><input value="{{ old('phone', $profileDoctor->phone )}}"
                                                                  name="phone"
                                                                  type="text" class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="form-label" for="pay-amount">Chuyên khoa</label>
                            <div class="form-control-wrap ">
                                <div class="form-control-select">
                                    <select class="form-control" name="chuyen_khoa" id="chuyen-khoa">
                                        @foreach($chuyenKhoa as $item)
                                            <option
                                                value="{{ $item->id }}"
                                                @if(old('chuyen_khoa', $profileDoctor->chuyen_khoa_id ?? null) == $item->id) selected @endif>
                                                {{ $item->ten_chuyen_khoa }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label class="form-label" for="phone-no">Kinh nghiệm</label>
                            <div class="form-control-wrap"><input value="{{$profileDoctor->bio}}" name="kinh_nghiem"
                                                                  type="text" class="form-control" id="phone-no"></div>
                        </div>
                        <div class="form-group"><label class="form-label" for="phone-no">Giới thiệu chung</label>
                            <div class="form-control-wrap">
                                <textarea name="gioi_thieu_chung" class="editor"
                                          rows="10">{{ old('gioi_thieu_chung', $profileDoctor->gioi_thieu_chung) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group"><label class="form-label" for="phone-no">Học vấn</label>
                            <div class="form-control-wrap">
                                <textarea name="hoc_van" class="editor"
                                          rows="10"> {{ old('hoc_van', $profileDoctor->hoc_van) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group"><label class="form-label" for="phone-no">Quá trình công tác</label>
                            <div class="form-control-wrap">
                                <textarea name="qua_trinh_cong_tac" class="editor"
                                          rows="10"> {{ old('qua_trinh_cong_tac', $profileDoctor->qua_trinh_cong_tac) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Lưu thông tin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
