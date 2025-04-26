import axios from "axios";

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;

const AnderSaroCup = {
    init() {
        const userAgent = navigator.userAgent;
        if (!userAgent.includes("Zalo")) {
            window.location.href = 'ander-saro-cup/error';
        }
        this.setupEventHandlers();
    },

    setupEventHandlers() {
        $('#submit').click(this.handleSubmit.bind(this));
        $('.spin-button').click(this.handleSpinButtonClick.bind(this));
    },

    handleSubmit() {
        const submitButton = $('#submit');
        const name = $("input[name='name']").val().trim();
        const gender = $("#gender").val();
        const address = $("#address").val().trim();
        const phone = $("#phone").val().trim();

        if (!name || !gender || !address || !phone) {
            $('#text-error-vn').text('Vui lòng điền đầy đủ thông tin');
            return;
        }

        submitButton.prop('disabled', true).text('Loading...');
        axios.post(URL_STORE_ANDER_SARO_CUP, {name, gender, address, phone})
            .then(response => {
                if (response.data.status === true) {
                    localStorage.setItem("phone", phone);
                    $('#text-error-vn').text('');
                    $('#text-success-vn').text('Gửi thông tin thành công! Vui lòng kiểm tra zalo lấy mã đăng ký và bấm nút quay thưởng đổi quà');
                } else if (response.data.phone === false) {
                    $('#text-success-vn').text('');
                    $('#text-error-vn').text('Số điện thoại trên đã đăng ký');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            })
            .finally(() => {
                submitButton.prop('disabled', false).text('Gửi thông tin');
            });
    },

    handleSpinButtonClick() {
        console.log('spin button click')
        $(".reward-text").text('');
        const spinButton = $('.spin-button');
        const otp = $('#otp-input').val().trim();
        const phone = localStorage.getItem("phone");


        spinButton.text('Loading...').prop('disabled', true);

        axios.post(URL_CHECK_OTP, {
            'otp': otp
        })
            .then(response => {
                if (!response.data.status) {
                    $('#text-error-vn').text('OTP không chính xác!');
                    spinButton.text('Quay').prop('disabled', false);
                } else {
                    $('#text-error-vn').text('');
                    this.spinWheel();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                spinButton.text('Quay').prop('disabled', false);
            });
    },

    spinWheel() {
        const wheel = document.querySelector('.wheel-image');
        const rewardText = document.querySelector('.reward-text');

        // Cập nhật danh sách phần thưởng
        const rewards = [
            {label: '1 HỘP CLAUSY 5 ỐNG', message: 'Bạn đã nhận được <b>1 HỘP CLAUSY 5 ỐNG</b>', weight: 14},
            {label: '1 HỘP PREG-MOM 5 ỐNG', message: 'Bạn đã nhận được <b>1 HỘP PREG-MOM 5 ỐNG</b>', weight: 14},
            {label: 'TRỨNG NACOPE', message: 'Bạn đã nhận được <b>TRỨNG NACOPE</b>', weight: 29},
            {label: '1 HỘP COLON 5 ỐNG', message: 'Bạn đã nhận được <b>1 HỘP COLON 5 ỐNG</b>', weight: 14},
            {label: 'BÀN CHẢI NA', message: 'Bạn đã nhận được <b>BÀN CHẢI NA</b>', weight: 29},
        ];

        const totalWeight = rewards.reduce((total, reward) => total + reward.weight, 0);

        function getRandomReward() {
            const random = Math.random() * totalWeight;
            let cumulativeWeight = 0;

            for (const reward of rewards) {
                cumulativeWeight += reward.weight;
                if (random < cumulativeWeight) {
                    return reward;
                }
            }
        }

        const currentReward = getRandomReward();
        if (!currentReward) {
            console.error('Error: Could not determine reward.');
            return;
        }

        const rewardIndex = rewards.indexOf(currentReward);
        const spinDuration = 8;
        const rotationAngle = 360 * spinDuration + (360 / rewards.length) * rewardIndex;

        wheel.style.transition = `transform ${spinDuration}s cubic-bezier(0.33, 0.08, 0.38, 1.23)`;
        wheel.style.transform = `rotate(${rotationAngle}deg)`;

        setTimeout(() => {
            wheel.style.transition = '';
            rewardText.innerHTML = currentReward.message;
            $('.spin-button').text('Quay').prop('disabled', false);
        }, spinDuration * 1000);
    },
};

$(function () {
    AnderSaroCup.init();
});
