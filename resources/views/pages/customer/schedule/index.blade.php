@extends('layouts.customer.master')
@section('content')
    <div style="max-width: 600px; margin: auto; border: 1px solid #ccc; border-radius: 5px; padding: 20px; margin-top: 30px">

        <p style="font-size: 13px; color: #888; margin: 0 0 10px;">Cập nhật 05/09/2023 • <span style="color: #1e88e5;">12.7K</span></p>

        <div style="margin-bottom: 15px;">
            <button style="background-color: #3b5998; color: white; border: none; padding: 8px 15px; border-radius: 4px; margin-right: 5px; cursor: pointer;">Facebook</button>
            <button style="background-color: #55acee; color: white; border: none; padding: 8px 15px; border-radius: 4px; margin-right: 5px; cursor: pointer;">Twitter</button>
            <button style="background-color: #bd081c; color: white; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer;">Pinterest</button>
        </div>

        <p style="font-size: 15px; line-height: 1.6;">
            Tổ hợp y tế MEDIPLUS với mạng lưới chuyên gia hàng đầu, có chuyên môn cao. Khách hàng có thể kết nối trực tiếp và nhanh chóng tới các Bác sĩ ở nhiều cơ sở y tế khác nhau, dễ dàng lựa chọn để thăm khám hoặc theo dõi sức khỏe dài lâu.
        </p>

        <form method="POST" action="{{route('customer_advice.store')}}" style="border: 1px solid #1a3660; padding: 20px; border-radius: 5px; background-color: #f9f9f9;">
            @csrf
            <div style="font-weight: bold; text-align: center; color: #1a3660; margin-bottom: 15px;">ĐẶT LỊCH KHÁM, TƯ VẤN VỚI BÁC SĨ</div>

            <input type="text" name="name" placeholder="*Họ và tên..." style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;" required>

            <input type="tel" name="phone" placeholder="*Số điện thoại..." style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;" required>

            <input type="email" name="email" placeholder="*Email..." style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;" required>

            <textarea name="message" placeholder="*Vấn đề, tình trạng sức khoẻ của bạn, hoặc câu hỏi dành cho Bác sĩ" rows="5" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; margin-bottom: 15px;" required></textarea>

            <div style="text-align: center; margin-bottom: 15px;">
                <label style="font-size: 14px;">
                    <input type="radio" name="note" value="Tân Mai" checked>
                    MEDIPLUS Tân Mai
                </label>
            </div>

            <div style="text-align: center;">
                <button type="submit" style="background-color: #1a3660; color: white; padding: 12px 30px; border: none; border-radius: 25px; font-weight: bold; font-size: 14px; cursor: pointer;">
                    ĐẶT LỊCH KHÁM
                </button>
            </div>
        </form>
    </div>
@endsection
