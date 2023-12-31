$(document).ready(function () {
    function generateRandomColor() {
        // Menghasilkan warna acak dalam format RGB
        var color = 'rgb(' +
            Math.floor(Math.random() * 256) + ',' +
            Math.floor(Math.random() * 256) + ',' +
            Math.floor(Math.random() * 256) + ')';
        return color;
    }

    var ctx = document.getElementById('myChart').getContext('2d');

    // Menghasilkan daftar warna acak sesuai dengan jumlah label
    var randomColors = Array.from({ length: 6 }, generateRandomColor);

    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Hadir', 'Tidak Hadir'],
            datasets: [{
                label: '# of Votes',
                data: [12, 22],
                backgroundColor: randomColors,
                borderColor: randomColors,
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            aspectRatio: 2,
        }
    });
});