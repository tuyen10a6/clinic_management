import axios from "axios"

const CustomerHome = {
    init() {
        this.searchDoctor()
    },
    searchDoctor() {
        const input = document.getElementById("search-doctor");
        const resultDiv = document.getElementById("doctor-results");

        if (!input || !resultDiv) return;

        input.addEventListener("input", function () {
            const keyword = this.value.trim();

            if (!keyword) {
                resultDiv.innerHTML = '';
                resultDiv.style.display = 'none';
                return;
            }

            axios.get(SEARCH_DOCTOR_HOME, {params: {name: keyword}})
                .then(response => {
                    const doctors = response.data;

                    if (!doctors.length) {
                        resultDiv.innerHTML = '<div style="padding: 10px; color: #888;">Không tìm thấy bác sĩ phù hợp.</div>';
                        resultDiv.style.display = 'block';
                        return;
                    }

                    const listHTML = `
    <ul style="list-style: none; padding: 0; margin: 0;">
        ${doctors.map(doc => `
            <li style="
                padding: 0;
                margin: 5px 0;
                border-radius: 5px;
                overflow: hidden;
                border: 1px solid #ddd;
                background-color: #f7f7f7;
            ">
                <a href="/doctor/${doc.id}" style="
                    text-decoration: none;
                    color: inherit;
                    display: flex;
                    align-items: center;
                    padding: 10px 15px;
                ">
                    <img src="${URL_PROJECT}/${doc.image}" alt="${doc.name}"
                         style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; margin-right: 10px;">
                    <strong>${doc.name}</strong>
                </a>
            </li>
        `).join('')}
    </ul>
`;



                    resultDiv.innerHTML = listHTML;
                    resultDiv.style.display = 'block';
                })
                .catch(error => {
                    console.error("Search error:", error);
                    resultDiv.innerHTML = '<div style="padding: 10px; color: red;">Có lỗi xảy ra khi tìm kiếm.</div>';
                    resultDiv.style.display = 'block';
                });
        });
    }

}

$(function () {
    CustomerHome.init()
})
