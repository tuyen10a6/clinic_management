import axios from "axios";
import notify from 'toastr'

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;
const MangDenJs = {
    init() {
        this.checkSubmit();
        this.checkScrollContent();
    },
    checkSubmit() {
        $('#submit').click(function () {
            let name = $("input[name='name']").val();
            let gender = $("#gender-form").val();
            let city = $("#city-form").val();
            let country = $("input[name='country']").val();
            let phone = $("input[name='phone']").val();
            let language = $("input[name='language']").val();
            if ( name.trim() === '' || gender.trim() === '' || city.trim() === '' || country.trim() === '' || phone.trim() === '') {
                if (language === 'vn') {
                    $('#submit').removeAttr("disabled");
                    $('#text-error-vn').text('Vui lòng điền đầy đủ thông tin')
                }
                if (language === 'en') {
                    $('#text-error-en').text('Please fill in all information')
                }
            } else {
                $('.loading').css('display', ' block');
                $('#submit').css('display', ' none');
                axios.post(URL_STORE, {
                    name: name,
                    gender: gender,
                    province: city,
                    country: country,
                    phone: phone,
                    language: language
                }).then(response => {
                    if (response.data.status == true) {
                        if (language === 'vn') {
                            $('#text-error-vn').text('')
                            $('#text-success-vn').text('Bạn đã điền thông tin thành công!')
                        }
                        if (language === 'en') {
                            $('#text-error-en').text('')
                            $('#text-success-en').text('You have successfully filled in the information!')
                        }
                    }
                    if (response.data.status == false) {
                        if (language === 'vn') {
                            $('#text-success-vn').text('')
                            $('#text-error-vn').text('Số điện thoại trên đã đăng ký')
                        }
                        if (language === 'en') {
                            $('#text-success-en').text('')
                            $('#text-error-en').text('The above phone number is registered.')
                        }
                    }
                }).catch(error => {
                    console.log('Có lỗi xảy ra:', error)
                }).finally(() => {
                    $(this).css('display', 'block').prop("disabled", false);
                    $('.loading').css('display', 'none');
                })
            }
        })
    },

    checkScrollContent() {
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        let scrollPoints = [30, 50, 70, 90];
        let triggeredPoints = {};

        scrollPoints.forEach(function (point) {
            triggeredPoints[point] = false;
        });

        $(window).on("scroll", function () {
            let scrollTop = $(window).scrollTop();
            let windowHeight = $(window).height();
            let documentHeight = $(document).height();
            let scrollPercent = ((scrollTop + windowHeight) / documentHeight) * 100;

            scrollPoints.forEach(function (point) {
                if (!triggeredPoints[point] && scrollPercent >= point) {
                    triggeredPoints[point] = true;
                    $.post("/mangden/track-scroll", {
                        _token: csrfToken,
                        scroll_percent: point
                    }, function (response) {
                        console.log(response.message);
                    }).fail(function (error) {
                        console.log("Lỗi khi gửi dữ liệu:", error);
                    });
                }
            });
        });
    }
}
$(function () {
    MangDenJs.init()
})

