import notify from "toastr";
import axios from 'axios';

const dentalEvent = {
    init() {
        this.store();
    },

    store() {
        $("#form-submit").submit(function (event) {
            console.log('ok1223');
            event.preventDefault();

            const submitButton = $("#form-submit button[type='submit']");
            submitButton.text('Đang gửi thông tin...')

            const formData = {
                name: $("#name").val(),
                phone: $("#phone").val(),
                work_place: $("#workplace").val(),
                private_clinic: $("input[name='private_clinic']:checked").val(),
                about_livespo: $("input[name='know_livespo']:checked").val()
            };

            if (!formData.name || !formData.phone || !formData.work_place || !formData.private_clinic || !formData.about_livespo) {
                notify.error("Vui lòng điền đầy đủ thông tin!");
                submitButton.prop("disabled", false);
                return;
            }

            axios.post(URL_STORE, formData)
                .then(response => {
                    console.log(response);
                    if (response.data.status === true) {
                        notify.success(response.data.message, 'Thông báo');
                        $("#form-submit")[0].reset();
                    } else {
                        notify.error(response.data.message, 'Thông báo');
                    }
                })
                .catch(error => {
                    notify.error("Có lỗi xảy ra, vui lòng thử lại.", 'Thông báo');
                    console.error("Lỗi khi gửi form:", error);
                })
                .finally(() => {
                    submitButton.text('Gửi')
                });
        });
    }

};

$(function () {
    dentalEvent.init();
});
