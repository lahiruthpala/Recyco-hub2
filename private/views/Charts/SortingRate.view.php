<div class="cell cell--4-col-desktop cell--4-col-tablet cell--2-col-phone" style="width: 45%;">
    <div class="card shadow--2dp" style="height: auto;">
        <div class="card__title" style="align-items: center; justify-content: center;">
            <h2 class="card__title-text">Sorting Rate</h2>
        </div>
        <div class="card__supporting-text">
            <div class="pie-chart__container">
                <canvas id="SortingRate"></canvas>
                <label id="SortingRate_data" hidden>
                    <?php
                    echo json_encode($data); ?>
                </label>
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
            label: 'Num of Sorting Job',
            data: Sorted_values,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };

    const SortingRateConfig = {
        type: 'line',
        data: SortingRate_values,
    };

    const chart = new Chart(document.getElementById('SortingRate'), SortingRateConfig);

</script>