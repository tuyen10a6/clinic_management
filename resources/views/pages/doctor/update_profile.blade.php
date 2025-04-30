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
                    <form action="{{route('doctor-update')}}" method="post">
                        @csrf
                        <div class="form-group"><label class="form-label" for="full-name">Họ và tên</label>
                            <div class="form-control-wrap"><input name="name" type="text" value="{{Auth::user()->name}}"
                                                                  class="form-control" id="full-name"></div>
                        </div>
                        <div class="form-group"><label class="form-label" for="email-address">Địa chỉ email</label>
                            <div class="form-control-wrap"><input name="email" value="{{Auth::user()->email}}" type="text"
                                                                  class="form-control" id="email-address">
                            </div>
                        </div>
                        <div class="form-group"><label class="form-label" for="phone-no">Số điện thoại</label>
                            <div class="form-control-wrap"><input type="text" class="form-control" id="phone-no"></div>
                        </div>
                        <div class="form-group"><label class="form-label" for="pay-amount">Chuyên khoa</label>
                            <div class="form-control-wrap ">
                                <div class="form-control-select">
                                    <select class="form-control" id="chuyen-khoa">
                                        @foreach($chuyenKhoa as $item)
                                            <option value="{{$item->id}}">{{$item->ten_chuyen_khoa}}</option>
                                        @endforeach
                                    </select></div>
                            </div>
                        </div>
                        <div class="form-group"><label class="form-label" for="phone-no">Kinh nghiệm</label>
                            <div class="form-control-wrap"><input type="text" class="form-control" id="phone-no"></div>
                        </div>
                        <div class="form-group"><label class="form-label" for="phone-no">Giới thiệu chung</label>
                            <div class="form-control-wrap">
                                <textarea name="gioi-thieu-chung" class="editor" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group"><label class="form-label" for="phone-no">Học vấn</label>
                            <div class="form-control-wrap">
                                <textarea name="hoc-van" class="editor" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group"><label class="form-label" for="phone-no">Quá trình công tác</label>
                            <div class="form-control-wrap">
                                <textarea name="qua-trinh-cong-tac" class="editor" rows="10"></textarea>
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
