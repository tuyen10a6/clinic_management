@extends('layouts.customer.master')

@section('content')
    <div class="card card-bordered p-5">
        <div class="card-inner">
            <div class="nk-block-head">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title fw-bold">Chính sách bảo hiểm</h2>
                        <ul class="nk-block-tools gx-3 mt-2">
                            <li><em class="text-soft fs-13px">Cập nhật 14/06/2023</em></li>
                            <li class="d-flex align-items-center text-soft">
                                <em class="icon ni ni-eye mr-1"></em> <span>4.0K</span>
                            </li>
                        </ul>
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
                </div>
            </div>

            <div class="mt-4">
                <p>
                    Hiện nay, sức khỏe con người chịu ảnh hưởng nhiều từ các lối sống không lành mạnh, khoa học. Những rủi ro về sức khỏe không những gây ảnh hưởng đến tinh thần mà còn làm kiệt quệ về mặt tài chính. Tuy nhiên, khi có bảo hiểm người bệnh sẽ bớt được phần nào gánh nặng. Những gánh nặng về viện phí khi thăm khám sẽ được bảo hiểm hỗ trợ chi trả một phần. Bên bảo hiểm có trách nhiệm giải quyết toàn bộ rủi ro và đền bù thiệt hại theo phương pháp của thống kê.
                </p>

                <h6 class="mt-4 fw-bold">Có 2 dạng hình thức bảo hiểm</h6>
                <ul class="list list-sm mt-2">
                    <li>
                        <strong>Bảo hiểm bắt buộc:</strong> Là bảo hiểm do pháp luật quy định về điều kiện bảo hiểm, mức chi phí bảo hiểm, số tiền bảo hiểm tối thiểu mà tổ chức, cá nhân tham gia bảo hiểm và doanh nghiệp bảo hiểm có nghĩa vụ phải thực hiện.
                    </li>
                    <li>
                        <strong>Bảo hiểm tự nguyện:</strong> Là loại hình bảo hiểm mà người tham gia có quyền lựa chọn công ty bảo hiểm, sản phẩm bảo hiểm, mức phí và quyền lợi bảo hiểm.
                    </li>
                </ul>
            </div>
            <h6 class="mt-5 fw-bold">Hình thức bồi thường bảo hiểm</h6>
            <ul class="list list-sm mt-2">
                <li><strong>Chi trả gián tiếp cho phòng khám:</strong> Đây là hình thức công ty bảo hiểm có ký kết thanh toán trực tiếp một phần hoặc toàn bộ chi phí cho khách hàng.</li>
                <li><strong>Chi trả trực tiếp cho khách hàng:</strong> Khách hàng thanh tự thanh toán toàn bộ chi phí khám bệnh và gửi lại hồ sơ cho công ty bảo hiểm để yêu cầu bồi thường quyền lợi.</li>
            </ul>

            <h5 class="mt-5 text-primary fw-bold">Hình thức chi trả trực tiếp</h5>
            <p>Người bệnh cần cung cấp thông tin gì để được thanh toán bảo hiểm:</p>

            <h6 class="mt-3 fw-bold">Yêu cầu thanh toán qua điện thoại</h6>
            <ul class="list list-sm">
                <li>Thông tin họ và tên, ngày tháng năm sinh, số thẻ bảo hiểm</li>
                <li>Chẩn đoán bệnh, kết quả xét nghiệm, chẩn đoán hình ảnh, thăm dò chức năng.</li>
                <li>Toàn bộ chi phí thăm khám, chi phí thuốc men.</li>
            </ul>

            <h6 class="mt-4 fw-bold">Yêu cầu thanh toán qua email</h6>
            <ul class="list list-sm">
                <li>Thẻ bảo hiểm, giấy tờ tùy thân</li>
                <li>Scan kết quả xét nghiệm, chẩn đoán hình ảnh, thăm dò chức năng, chi phí thăm khám, thuốc men.</li>
            </ul>
            <h5 class="mt-5 text-primary fw-bold">Gửi hồ sơ tới công ty bảo hiểm yêu cầu thanh toán</h5>
            <ul class="list list-sm mt-2">
                <li>Thẻ bảo hiểm và CMND/CCCD/Hộ chiếu/Giấy khai sinh (trẻ dưới 16 tuổi)</li>
                <li>Đơn yêu cầu bồi thường.</li>
                <li>Bệnh án.</li>
                <li>Đơn thuốc chỉ định và các kết quả xét nghiệm, cận lâm sàng.</li>
                <li>Bảng kê chi phí khám bệnh, chi phí thuốc.</li>
                <li>Hóa đơn thanh toán.</li>
                <li>Bản tường trình tai nạn rủi ro (nếu có).</li>
            </ul>

            <h5 class="mt-5 text-primary fw-bold">Hình thức chi trả trung gian</h5>
            <p>Quy trình bảo lãnh bằng hình thức chi trả trung gian gồm các giai đoạn như sau:</p>

            <h6 class="fw-bold">Bước 1: Tiếp nhận</h6>
            <p>Khách hàng xuất trình thẻ bảo hiểm, CMND/CCCD/Hộ chiếu/Giấy khai sinh để nhân viên phụ trách thanh toán bảo hiểm bên tổ hợp Y tế hỗ trợ thanh toán.</p>

            <h6 class="fw-bold mt-3">Bước 2: Kiểm tra thông tin</h6>
            <ul class="list list-sm">
                <li>Trường hợp công ty có hợp đồng chi trả trực tiếp, nhân viên sẽ hỗ trợ khách hàng scan lại thẻ bảo hiểm, giấy tờ tùy thân và cho khách hàng ký giấy yêu cầu bồi thường.</li>
                <li>Trường hợp công ty không có hợp đồng chi trả trực tiếp, MEDIPLUS sẽ cung cấp đầy đủ hồ sơ cho khách hàng để khách hàng tự bảo lãnh.</li>
            </ul>
            <h6 class="fw-bold mt-3">Bước 3: Tiến hành thăm khám</h6>
            <p>Khách hàng tạm ứng/thanh toán chi phí khám bệnh, xét nghiệm, chẩn đoán lâm sàng và thăm dò chức năng trước khi tiến hành làm dịch vụ.</p>

            <h6 class="fw-bold mt-3">Bước 4: Liên hệ công ty bảo hiểm để bảo lãnh cho khách hàng</h6>
            <p>Khi khách hàng kết thúc quá trình thăm khám, tổng hợp chi phí và liên hệ công ty bảo hiểm yêu cầu bồi thường.</p>

            <h6 class="fw-bold mt-3">Bước 5: Hoàn tất quá trình bảo lãnh</h6>
            <p>Thông báo cho khách hàng chi phí được thanh toán và chi phí không được thanh toán (nếu có).</p>
            <p>Đồng thời, cho khách hàng ký đầy đủ chứng từ và hoàn tiền lại tiền cho khách hàng.</p>
            <p>Gửi hồ sơ yêu cầu thanh toán cho công ty bảo hiểm để thu hồi công nợ.</p>



        </div>
    </div>
@endsection
