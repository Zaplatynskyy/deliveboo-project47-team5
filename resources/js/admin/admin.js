require("../bootstrap");

require("./validationFormUser");

require("./validationFormFood");

require("./validationFormAdmin");

require("./modalToggle");

require("./editSubmitForm");

var popCanvas = document.getElementById("popChart");

const d = new Date();
let month = d.getMonth() + 1;
let year = d.getFullYear();

var getDaysInMonth = function (month, year) {
    return new Date(year, month, 0).getDate();
};

const days = getDaysInMonth(month, year);

console.log(month);
console.log(year);
console.log(days);

let arrayDays = [];
for(let i = 1; i <= days; i++) {
    arrayDays.push(i);
}

let data = [];

console.log(`/api/orders/${month}`);

axios
    .get(`/api/orders/${month}`)
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
        });
    })
    .catch(function (error) {});

console.log(data);



