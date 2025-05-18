@extends('layouts.customer.master')
@section('content')
    <section style="background-color: #f0f8fa; padding: 40px 20px;">
        <div
            style="max-width: 1200px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
            <div style="flex: 1 1 50%;">
                <h2 style="font-size: 36px; font-weight: bold; margin-bottom: 20px;">Trang thiết bị y tế</h2>
                <p style="font-size: 18px; line-height: 1.6;">
                    MEDIPLUS đã và đang hợp tác với nhiều đơn vị sản xuất và phân phối thiết bị y tế hàng đầu thế giới
                    như hãng GE (Mỹ), hãng Sysmex (Nhật Bản), Healthcare (Hàn Quốc), ...
                </p>
            </div>
            <div style="flex: 1 1 45%; text-align: center;">
                <img src="{{asset('statics/images/blog-home-img.png')}}" alt="Trang thiết bị y tế" style="max-width: 100%; height: auto;"/>
            </div>
        </div>
        <div style="max-width: 1200px; margin: auto; margin-top: 50px">
            <h2 style="font-size: 28px; font-weight: bold; border-bottom: 2px solid #444; padding-bottom: 10px; margin-bottom: 30px;">
                Thiết bị chẩn đoán hình ảnh
            </h2>

            <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                <!-- Card 1 -->
                <div style="flex: 1 1 300px; border: 1px solid #ddd; border-radius: 10px; overflow: hidden;">
                    <img src="{{asset('statics/images/chup-nhu-anh-tam-soat-ung-thu-vu.jpg')}}" alt="Chụp nhũ ảnh" style="width: 100%; height: auto;">
                    <div style="padding: 15px;">
                        <h3 style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">
                            Hệ thống chụp nhũ ảnh kỹ thuật số của hãng GE, hàng đầu của...
                        </h3>
                        <div style="font-size: 14px; color: #777; display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>24 Th5, 2023</span>
                            <span>👁️ 2.5K</span>
                        </div>
                        <p style="font-size: 14px; color: #444;">
                            Với sự chú trọng đến sức khỏe của một người phụ nữ, từ liều chụp thấp, các tương tác để chụp nhũ ảnh...
                        </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div style="flex: 1 1 300px; border: 1px solid #ddd; border-radius: 10px; overflow: hidden;">
                    <img src="{{asset('statics/images/may-chup-cat-lop-vi-tinh-tai-mediplus.jpg')}}" alt="Chụp cắt lớp vi tính" style="width: 100%; height: auto;">
                    <div style="padding: 15px;">
                        <h3 style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">
                            CHỤP CẮT LỚP VI TÍNH 128 LÁT CẮT/ VÒNG QUAY –...
                        </h3>
                        <div style="font-size: 14px; color: #777; display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>17 Th8, 2023</span>
                            <span>👁️ 4.0K</span>
                        </div>
                        <p style="font-size: 14px; color: #444;">
                            Chụp cắt lớp vi tính hay còn gọi là chụp CT, là kỹ thuật được ứng dụng rộng rãi để phát hiện bệnh lý...
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
