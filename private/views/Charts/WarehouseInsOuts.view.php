<div class="cell cell--4-col-desktop cell--4-col-tablet cell--2-col-phone" style="width: 45%;">
    <div class="card shadow--2dp" style="height: auto;">
        <div class="card__supporting-text">
            <div style="display: flex;">
                <h6 style="margin-top: 0;color: black;font-weight: bold;">Warehouse Traffic Flow</h6>
                <div class="chartIconBlock">
                    <img style="width: 10px;height: 10px;" src="<?= ROOT ?>/images/home.svg" />
                </div>
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
</div>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script>
    var temp = JSON.parse(document.getElementById("SortingRate_data").textContent);
    labels = Array()
    Ins = Array()
    Outs = Array()
    for (var i = 0; i < temp.length; i++) {
        labels.push(temp[i].Date);
        Ins.push(temp[i].Ins);
        Outs.push(temp[i].Outs);
    }
    console.log(labels, Ins);
    console.log(labels)
    const SortingRate_values = {
        labels: labels,
        datasets: [{
            label: 'Incoming Inventories',
            data: Ins,
            fill: true,
            backgroundColor: "rgba(3, 169, 245, 0.2)",
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }, {
            label: 'Outgoing Inventory',
            data: Outs,
            fill: true,
            backgroundColor: "rgba(200, 44, 44, 0.2)",
            borderColor: 'red',
            tension: 0.1
        }]
    };

    const SortingRateConfig = {
        type: 'line',
        data: SortingRate_values,
    };

    const chart = new Chart(document.getElementById('SortingRate'), SortingRateConfig);

</script>