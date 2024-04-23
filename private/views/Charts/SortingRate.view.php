<div class="cell cell--4-col-desktop cell--4-col-tablet cell--2-col-phone" style="width: 45%;">
    <div class="card shadow--2dp" style="height: auto;">
        <div class="card__supporting-text">
            <div style="display: flex;">
                <h6 style="margin-top: 0;color: black;font-weight: bold;">Sorting Rate(Kg Per Day)</h6>
                <div class="chartIconBlock">
                    <img style="width: 10px;height: 10px;" src="<?= ROOT ?>/images/home.svg" />
                </div>
            </div>
            <div class="card__supporting-text" style="height: 300px;">
                <div class="pie-chart__container" style="height: inherit;">
                    <canvas id="SortingRate"></canvas>
                    <label id="SortingRate_data" hidden>
                        <?php
                        echo json_encode($data); ?>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script>
    var temp = JSON.parse(document.getElementById("SortingRate_data").textContent);
    labels = Array()
    Sorted_values = Array()
    for (var i = 0; i < temp.length; i++) {
        labels.push(temp[i].Date);
    }
    for (var i = 0; i < temp.length; i++) {
        Sorted_values.push(temp[i].count);
    }
    console.log(labels, Sorted_values);
    console.log(labels)
    const SortingRate_values = {
        labels: labels,
        datasets: [{
            label: '(Kgs Per Day)',
            data: Sorted_values,
            fill: true,
            borderColor: 'rgb(0, 255, 163)', // Set the desired color value here
            tension: 0.1
        }]
    };

    const SortingRateConfig = {
        type: 'bar',
        data: SortingRate_values,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    const chart = new Chart(document.getElementById('SortingRate'), SortingRateConfig);

</script>