<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone" style="width: 20%;">
    <div class="mdl-card mdl-shadow--2dp pie-chart">
        <div class="mdl-card__title" style="align-items: center; justify-content: center;">
            <h2 class="mdl-card__title-text">Inventory Breakdown</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <div class="pie-chart__container">
                <canvas id="InventoryBreakdown"></canvas>
                <label id="data" hidden>
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
    var temp = JSON.parse(document.getElementById("data").textContent);
    console.log(temp);
    type = Array()
    weight = Array()
    for (var i = 0; i < temp.length; i++) {
        type.push(temp[i].Type);
    }
    for (var i = 0; i < temp.length; i++) {
        weight.push(temp[i].total_weight);
    }
    const data = {
        labels: type,
        datasets: [{
            label: 'Inventory Breakdown',
            data: weight,
            backgroundColor: Array.from({ length: type.length }, () => getColor(color)),
            hoverOffset: 4
        }]
    };
    const ctx = document.getElementById('InventoryBreakdown');
    new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        color: 'rgb(255, 255, 255)'
                    }
                }
            }
        }
    });
</script>