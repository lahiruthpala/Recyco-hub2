<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone" style="width: 27%;">
    <div class="mdl-card mdl-shadow--2dp pie-chart">
        <div class="mdl-card__title" style="align-items: center; justify-content: center;">
            <h2 class="mdl-card__title-text">Sorting Efficiency</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <div class="pie-chart__container">
                <canvas id="SortingRate"></canvas>
                <label id="data2" hidden>
                    <?php
                    echo json_encode($data[0]); ?>
                </label>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script>
    color = 0;
    var temp = JSON.parse(document.getElementById("data2").textContent);
    console.log(temp);
    type = Array()
    weight = Array()
    for (var i = 0; i < temp.length; i++) {
        type.push(temp[i].Type);
    }
    for (var i = 0; i < temp.length; i++) {
        weight.push(temp[i].total_weight);
    }
    const data3 = {
        labels: type,
        datasets: [{
            label: 'Inventory Breakdown',
            data: weight,
            backgroundColor: Array.from({ length: type.length }, () => getColor(color)),
            hoverOffset: 4
        }]
    };
    const ctx3 = document.getElementById('SortingRate');
    new Chart(ctx3, {
        type: 'doughnut',
        data: data2,
    });
</script>