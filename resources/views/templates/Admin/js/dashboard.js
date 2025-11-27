// Bar Chart (Kunjungan)
const visitsChart = new Chart(document.getElementById("visitsChart"), {
    type: "bar",
    data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
            data: [3,4,2,1,4,5,4],
            borderRadius: 6
        }]
    },
    options: {
        plugins: { legend: { display: false }},
        scales: { y: { display: false } }
    }
});

// Line Chart (Activity)
const activityChart = new Chart(document.getElementById("activityChart"), {
    type: "line",
    data: {
        labels: ["JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC"],
        datasets: [{
            data: [1,1,3,1,2,1,7,4,1,2,3,1],
            borderWidth: 2,
            tension: 0.4
        }]
    },
    options: {
        plugins: { legend: { display: false }},
        scales: { y: { beginAtZero: true } }
    }
});