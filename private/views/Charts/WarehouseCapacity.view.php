<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
    <div class="mdl-card mdl-shadow--2dp pie-chart">
        <div class="mdl-card__title" style="align-items: center; justify-content: center;">
            <h2 class="mdl-card__title-text">Warehouse Capacity</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <div class="pie-chart__container">
                <canvas id="WarehouseCapacity"></canvas>
                <label id="WarehouseCapacityData" hidden>
                    <?php
                    echo json_encode($data[0]); ?>
                </label>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script>
    var temp = JSON.parse(document.getElementById("WarehouseCapacityData").textContent);
    console.log(temp);
    type = Array("Current weight", "TotalWeight")
    weight = Array(temp.TotalWeight, temp.capacity-temp.TotalWeight)
    console.log(weight)
    for (var i = 0; i < temp.length; i++) {
        weight.push(temp[i].total_weight);
    }
    const WarehouseCapacity = {
        labels: type,
        datasets: [{
            label: 'Inventory Breakdown',
            data: weight,
            borderWidth: 0,
            backgroundColor: ['green', 'rgb(102,102,102)'],
            hoverOffset: 4
        }]
    };
    const ctx1 = document.getElementById('WarehouseCapacity');
    new Chart(ctx1, {
        type: 'doughnut',
        data: WarehouseCapacity,
        options: {
            plugins: {
                legend: {
                    display: false,
                    labels: {
                        color: 'rgb(255, 255, 255)'
                    }
                }
            }
        }
    });
</script>