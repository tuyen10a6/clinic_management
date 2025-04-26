import axios from "axios";
import toastr from 'toastr'
const WorkshopMeOi = {
    init() {
        this.checkSubmit();
    },
    checkSubmit() {
        $('#workshop-form').on('submit', function (e) {
            e.preventDefault();

            // Lấy dữ liệu từ form
            let fullName = $('input[name="full_name"]').val().trim();
            let phone = $('input[name="phone"]').val().trim();
            let childAgeOther = $('input[name="child_age_other"]').val().trim();
            let knowLivespo = $('input[name="know_livespo"]:checked').val();
            let usedLivespo = $('input[name="used_livespo"]:checked').val();
            let question = $('textarea[name="question"]').val().trim();

            let childAges = [];
            $('input[name="child_age[]"]:checked').each(function () {
                childAges.push($(this).val());
            });

            // Kiểm tra hợp lệ
            let errors = [];
            if (!fullName) errors.push("Họ và tên không được để trống.");
            if (!phone) {
                errors.push("Số điện thoại không được để trống.");
            } else if (!/^\d{10}$/.test(phone)) {
                errors.push("Số điện thoại phải có đúng 10 chữ số.");
            }
            if (!knowLivespo) errors.push("Vui lòng chọn bạn đã biết đến LiveSpo chưa.");
            if (!usedLivespo) errors.push("Vui lòng chọn bạn đã từng dùng sản phẩm LiveSpo chưa.");

            // Nếu có lỗi, hiển thị và dừng lại
            let submitButton = $('button[type="submit"]');
            if (errors.length > 0) {
                errors.forEach(error => toastr.error(error));
                submitButton.prop('disabled', false);
                return; // 🔴 Quan trọng: Dừng form submit nếu có lỗi
            }

            // Tạo object dữ liệu
            let formData = {
                full_name: fullName,
                phone: phone,
                child_age: childAges,
                child_age_other: childAgeOther,
                know_livespo: knowLivespo,
                used_livespo: usedLivespo,
                question: question
            };

            console.log("Dữ liệu gửi đi:", formData);

            submitButton.prop('disabled', true);

            // Gửi dữ liệu bằng Axios
            axios.post(WORKSHOP_ME_OI_STORE, formData)
                .then(response => {
                    toastr.success(response.data.message, {
                        timeOut: 12000
                    });
                    $('#workshop-form')[0].reset(); // Reset form sau khi gửi thành công
                })
                .catch(error => {
                    if (error.response && error.response.data && error.response.data.message) {
                        toastr.error(error.response.data.message);
                    } else {
                        toastr.error('Có lỗi xảy ra, vui lòng thử lại!');
                    }
                })
                .finally(() => {
                    // Bật lại nút submit sau khi nhận response
                    submitButton.prop('disabled', false);
                });
        });
    }
};

// Đảm bảo mã chạy sau khi DOM đã sẵn sàng
$(document).ready(function () {
    WorkshopMeOi.init();
});
