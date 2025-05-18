{{-- resources/views/pages/chinh-sach-khach-hang.blade.php --}}

@extends('layouts.customer.master')

@section('content')
    <div class="container mx-auto p-6 bg-white rounded shadow">
        <h1 class="fs-22px font-bold mb-4 pt-3">Chính sách khách hàng</h1>
        <div class="flex items-center text-gray-500 text-sm mb-6">
            <span class="mr-2">Cập nhật 07/09/2023</span>
            <span class="mr-2">•</span>
            <span>2.8K</span>
        </div>

        <div class="nk-block-head-content">
            <ul class="btn-toolbar gx-2">
                <li>
                    <a href="#" class="btn btn-facebook btn-sm"><em class="icon ni ni-facebook-f"></em> Facebook</a>
                </li>
                <li>
                    <a href="#" class="btn btn-twitter btn-sm"><em class="icon ni ni-twitter"></em> Twitter</a>
                </li>
                <li>
                    <a href="#" class="btn btn-danger btn-sm"><em class="icon ni ni-pinterest"></em> Pinterest</a>
                </li>
            </ul>
        </div>

        <div class="prose mt-4">
            <h2 class="font-bold fs-22px">Chính sách bảo mật thông tin cá nhân người bệnh</h2>
            <p>Người bệnh có quyền truy cập vào dữ liệu cá nhân của mình, có quyền yêu cầu <strong>MEDIPLUS</strong> sửa lại những sai sót về dữ liệu của bạn mà không mất phí. Bất cứ lúc nào bạn cũng có quyền yêu cầu chúng tôi ngừng việc sử dụng thông tin cá nhân của bạn cho mục đích tiếp thị dịch vụ.</p>

            <h2 class="font-bold mt-4 fs-22px">Chính sách Ưu đãi dành cho người bệnh</h2>
            <p>Với mong muốn mang đến dịch vụ chăm sóc sức khỏe tốt, MEDIPLUS đã đang và sẽ không ngừng nỗ lực nâng cao chất lượng thăm khám, chất lượng dịch vụ để mọi người dân có cơ hội trải nghiệm dịch vụ y tế tốt nhất.</p>

            <h2 class="font-bold fs-22px">Chính sách bảo hiểm y tế tại MEDIPLUS</h2>
            <p>Hưởng lợi ích từ bảo hiểm y tế là quyền lợi của mỗi người dân khi đi khám và điều trị. Luôn đặt quyền lợi của người bệnh lên hàng đầu, MEDIPLUS áp dụng chính sách bảo hiểm y tế theo đúng quy định của Bộ Y tế và có những ưu đãi đặc biệt cho một số đối tượng.</p>

            <p><em>MEDIPLUS xin trân trọng cảm ơn quý khách đã tin tưởng và sử dụng dịch vụ của chúng tôi!</em></p>
        </div>

        <div class="mt-8">
            <p class="font-semibold text-gray-700 mb-2">Đánh giá bài viết</p>
            <div class="flex items-center space-x-1 text-yellow-400 text-2xl">
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </div>
        </div>
    </div>
@endsection
