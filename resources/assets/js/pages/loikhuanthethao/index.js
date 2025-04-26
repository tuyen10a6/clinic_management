import axios from "axios";
import notify from 'toastr'

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;
const LoikhuanthethaoJs = {
    init() {
        this.checkSubmit();
    },
    checkSubmit() {
        $('#submit').click(function () {
            let run = $("input[name='run']:checked");
            let runContent = run.closest('.question-check-item-content').find('label').text().trim();
            let problemRun = $("input[name='problem-run']:checked");
            let problemRunContent = problemRun.closest('.question-check-item-content').find('label').text().trim();
            let useColon = $("input[name='use-colon']:checked");
            let useColonContent = useColon.closest('.question-check-item-content').find('label').text().trim();
            let name = $("input[name='name']").val();
            let gender = $("#gender-form").val();
            let city = $("#city-form").val();
            let country = $("input[name='country']").val();
            let phone = $("input[name='phone']").val();
            let language = $("input[name='language']").val();
            if (run.val() === undefined || problemRun.val() === undefined || useColon.val() === undefined || name.trim() === '' || gender.trim() === '' || city.trim() === '' || country.trim() === '' || phone.trim() === '') {
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
                    city: city,
                    country: country,
                    phone: phone,
                    run: run.val(),
                    run_content: runContent,
                    problem_run: problemRun.val(),
                    problem_run_content: problemRunContent,
                    use_colon: useColon.val(),
                    use_colon_content: useColonContent,
                    language: language
                }).then(response => {
                    console.log(response.data)
                    if (response.data.original.status === true) {
                        if (language === 'vn') {
                            $('#text-error-vn').text('')
                            $('#text-success-vn').text('Bạn đã điền thông tin thành công!')
                        }
                        if (language === 'en') {
                            $('#text-error-en').text('')
                            $('#text-success-en').text('You have successfully filled in the information!')
                        }
                    }
                    if (response.data.original.phone === false) {
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
    }
}
$(function () {
    LoikhuanthethaoJs.init()
})

