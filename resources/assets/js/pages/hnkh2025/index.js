import axios from "axios";
import toastr from 'toastr'

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;
const Hnkh2025 = {
    init() {
        this.checkSubmit();
    },

    checkSubmit() {
        $('#form-question-hnkh2025').on('submit', function (e) {
            e.preventDefault();

            let submitButton = $(this).find('button[type="submit"]');
            submitButton.prop('disabled', true).text('Đang gửi...');

            // Lấy dữ liệu từ form
            let full_name = $('input[name="ho_ten_kh"]').val().trim();
            let dai_dien = $('input[name="dai_dien"]').val().trim();
            let dia_chi = $('input[name="dia_chi"]').val().trim();
            let ghi_chu = $('textarea[name="comments"]').val().trim() ?? null;
            let cau_hoi_kinh_doanh = $('textarea[name="cau_hoi_kinh_doanh"]').val().trim() ?? null;
            let tiep_don = $('input[name="tiep_don"]:checked').val() ?? null;
            let di_chuyen = $('input[name="di_chuyen"]:checked').val() ?? null;
            let luu_tru = $('input[name="luu_tru"]:checked').val() ?? null;
            let noi_dung_chuong_trinh = $('input[name="noi_dung_chuong_trinh"]:checked').val() ?? null;

            let an_tuong_noi_dung = [];
            $('input[name="an_tuong_noi_dung[]"]:checked').each(function () {
                an_tuong_noi_dung.push($(this).val());
            });

            var an_tuong_noi_dung_json = JSON.stringify(an_tuong_noi_dung) ?? '' ;
            console.log(an_tuong_noi_dung_json)

            // Tạo object dữ liệu
            let formData = {
                ho_ten_kh: full_name,
                dai_dien: dai_dien,
                dia_chi: dia_chi,
                cau_hoi_kinh_doanh: cau_hoi_kinh_doanh,
                tiep_don: tiep_don,
                di_chuyen: di_chuyen,
                luu_tru: luu_tru,
                noi_dung_chuong_trinh: noi_dung_chuong_trinh,
                an_tuong_noi_dung: an_tuong_noi_dung_json,
                comments: ghi_chu
            };

            console.log("Dữ liệu gửi đi:", formData);

            // Gửi dữ liệu bằng Axios
            axios.post(URL_STORE, formData)
                .then(response => {
                    toastr.success(response.data.message);
                    $('.text-notify-form').addClass('text-success').html(response.data.message);
                    $('#form-question-hnkh2025')[0].reset(); // Reset form sau khi gửi thành công
                })
                .catch(error => {
                    if (error.response && error.response.data && error.response.data.message) {
                        toastr.error(error.response.data.message);
                        $('.text-notify-form').addClass('text-danger').html(error.response.data.message);
                    } else {
                        toastr.error('Có lỗi xảy ra, vui lòng thử lại!');
                        $('.text-notify-form').addClass('text-danger').html(error.response.data.message);
                    }
                })
                .finally(() => {
                    submitButton.prop('disabled', false).text('Gửi thông tin');
                });
        });
    }
};

$(document).ready(function () {
    Hnkh2025.init();
});
