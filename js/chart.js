document.addEventListener('DOMContentLoaded', function() {
    var canvas = document.getElementById('balance-chart');
    if (canvas) {
        var ctx = canvas.getContext('2d');
        var balanceChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April'],
                datasets: [{
                    label: 'Loan Balance',
                    data: [400000, 380000, 360000, 350000],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    } else {
        console.error('Canvas element with id \'balance-chart\' not found.');
    }
});
