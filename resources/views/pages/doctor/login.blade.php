@extends('layouts.customer.master')
@section('content')
    <div class="w-100 d-flex justify-center m-5">
        <form class="w-30" action="{{route('post-login')}}" method="post"
              style="background: white; padding: 40px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 300px;">
            @csrf
            <h2 style="text-align: center; margin-bottom: 30px; color: #333;">Đăng nhập</h2>

            <div style="margin-bottom: 20px;">
                <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">Email</label>
                <input type="email" id="email" name="email" required
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="password" style="display: block; margin-bottom: 5px; font-weight: bold;">Mật khẩu</label>
                <input type="password" id="password" name="password" required
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <button type="submit"
                    style="width: 100%; padding: 12px; background-color: #007bff; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
                Đăng nhập
            </button>

            {{--    <p style="text-align: center; margin-top: 15px; font-size: 14px;">--}}
            {{--        <a href="#" style="color: #007bff; text-decoration: none;">Quên mật khẩu?</a>--}}
            {{--    </p>--}}

        </form>
    </div>
@endsection
