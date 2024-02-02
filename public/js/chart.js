// Wrap your code in the DOMContentLoaded event
document.addEventListener('DOMContentLoaded', function () {
    // Get all mini chart canvas elements
    var miniChartElements = document.getElementsByClassName('miniChart');

    // Loop through each mini chart element and create a mini line chart
    for (var i = 0; i < miniChartElements.length; i++) {
        var miniChartElement = miniChartElements[i];
        var randomData = JSON.parse(miniChartElement.getAttribute('data-chart-data'));

        // Create a mini line chart for the current company
        new Chart(miniChartElement.getContext('2d'), {
            type: 'line',
            data: {
                labels: Array.from({
                    length: 10
                }, (_, index) => ``),
                datasets: [{
                    borderColor: 'rgb(75, 192, 192)',
                    data: randomData,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false,
                    },
                    title: {
                        display: false,
                    }
                }
            }
        });
    }
});