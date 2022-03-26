require("../bootstrap");

require("./validationFormUser");

require("./validationFormFood");

require("./validationFormAdmin");

require("./modalToggle");

require("./editSubmitForm");

const user = document.querySelector("meta[name='user-id']");
const thisURL = window.location.href;

if (user != 1 && thisURL.endsWith("/admin/home")) {
    if (user) {
        let userId = user.getAttribute("content");
        var popCanvas = document.getElementById("popChart");

        const d = new Date();
        let month = d.getMonth() + 1;
        let year = d.getFullYear();

        const getDaysInMonth = function (month, year) {
            return new Date(year, month, 0).getDate();
        };

        const days = getDaysInMonth(month, year);

        let arrayDays = [];
        for (let i = 1; i <= days; i++) {
            arrayDays.push(i);
        }

        let data = [];

        axios
            .post(`/api/orders/last-month`, {
                params: {
                    month: month,
                    userId: userId,
                },
            })
            .then((response) => {
                data = [...response.data.orders];
                var barChart = new Chart(popCanvas, {
                    type: "bar",
                    data: {
                        labels: arrayDays,
                        datasets: [
                            {
                                label: "Ordini",
                                data: data,
                                backgroundColor: [
                                    "rgba(255, 99, 132, 0.6)",
                                    "rgba(54, 162, 235, 0.6)",
                                    "rgba(255, 206, 86, 0.6)",
                                    "rgba(75, 192, 192, 0.6)",
                                    "rgba(153, 102, 255, 0.6)",
                                    "rgba(255, 159, 64, 0.6)",
                                    "rgba(255, 99, 132, 0.6)",
                                    "rgba(54, 162, 235, 0.6)",
                                    "rgba(255, 206, 86, 0.6)",
                                    "rgba(75, 192, 192, 0.6)",
                                    "rgba(153, 102, 255, 0.6)",
                                ],
                            },
                        ],
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false,
                            },
                        },
                    },
                });
            })
            .catch(function (error) {});

        const foodChart = document.getElementById("foodChart");

        axios
            .post(`/api/foods/last-month`, {
                params: {
                    month: month,
                    userId: userId,
                },
            })
            .then((response) => {
                let names = response.data.orders.names;
                let quantities = response.data.orders.quantities;
                var pieChart = new Chart(foodChart, {
                    type: "doughnut",
                    data: {
                        labels: names,
                        datasets: [
                            {
                                label: "Ordini",
                                data: quantities,
                                backgroundColor: [
                                    "rgba(255, 99, 132, 0.6)",
                                    "rgba(54, 162, 235, 0.6)",
                                    "rgba(255, 206, 86, 0.6)",
                                    "rgba(75, 192, 192, 0.6)",
                                    "rgba(153, 102, 255, 0.6)",
                                    "rgba(255, 159, 64, 0.6)",
                                    "rgba(255, 99, 132, 0.6)",
                                    "rgba(54, 162, 235, 0.6)",
                                    "rgba(255, 206, 86, 0.6)",
                                    "rgba(75, 192, 192, 0.6)",
                                    "rgba(153, 102, 255, 0.6)",
                                ],
                            },
                        ],
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false,
                            },
                        },
                    },
                });
            })
            .catch(function (error) {});
    }
}
