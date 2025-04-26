import axios from "axios";
import toastr from 'toastr'
import "slick-carousel"

const Cme2025 = {
    init() {
        this.checkSubmit();
        this.slick();
    },
    slick(){
        $('.slider').slick({
            infinite: true,
            speed: 500,
            slidesToShow: 5, // Mặc định hiển thị 5 ảnh trên desktop
            slidesToScroll: 1,
            autoplay: true,
            dots: false,
            autoplaySpeed: 1000,
            arrows: true,
            responsive: [
                {
                    breakpoint: 480, // Dưới 480px (mobile nhỏ)
                    settings: {
                        slidesToShow: 3, // Hiển thị 1 ảnh nếu màn hình quá nhỏ
                        slidesToScroll: 1
                    }
                }
            ]
        });
    },

    checkSubmit() {
        $('#doctor-form').on('submit', function (e) {
            e.preventDefault();

            let submitButton = $(this).find('button[type="submit"]');
            submitButton.prop('disabled', true).text('Đang gửi...');

            let soDienThoai = document.querySelector('input[name="so_dien_thoai"]').value.trim();

            // Kiểm tra số điện thoại có đúng 10 chữ số không
            if (!/^\d{10}$/.test(soDienThoai)) {
                toastr.error('Số điện thoại phải có đúng 10 chữ số.');
                submitButton.prop('disabled', false).text('Gửi thông tin');
                return;
            }

            let formData = {
                ho_ten: document.querySelector('input[name="ho_ten"]').value.trim(),
                so_dien_thoai: soDienThoai,
                noi_cong_tac: document.querySelector('textarea[name="noi_cong_tac"]').value.trim() || null,
                phong_kham_rieng: document.querySelector('input[name="phong_kham_rieng"]:checked')?.value || null,
                biet_livespo: document.querySelector('input[name="biet_livespo"]:checked')?.value || null,
                hoi_nghi: document.querySelector('input[name="hoi_nghi"]:checked')?.value || null
            };

            axios.post(URL_STORE, formData)
                .then(response => {
                    if(response.data.status === true)
                    {
                        toastr.success(response.data.message);
                        $('#doctor-form')[0].reset(); // Reset form sau khi gửi thành công
                    }else {
                        toastr.error(response.data.message);
                    }
                })
                .catch(error => {
                    if (error.response && error.response.data && error.response.data.message) {
                        toastr.error(error.response.data.message);
                    } else {
                        toastr.error('Có lỗi xảy ra, vui lòng thử lại!');
                    }
                })
                .finally(() => {
                    submitButton.prop('disabled', false).text('Gửi thông tin');
                });
        });
    }
};

$(document).ready(function () {
    Cme2025.init();
});
