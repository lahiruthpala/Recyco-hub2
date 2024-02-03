<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone" style="width: 30%;">
    <div class="mdl-card mdl-shadow--2dp pie-chart">
        <div class="mdl-card__title" style="align-items: center; justify-content: center;">
            <h2 class="mdl-card__title-text">Inventory Breakdown</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <div class="pie-chart__container">
                <canvas id="InventoryBreakdown" style="height: 300px"></canvas>
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
    const chartColors = [
        '#006400',
        '#228B22',
        '#20B2AA',
        '#008080',
        '#3CB371',
        '#32CD32',
        '#00FF00',
        '#ADFF2F',
        '#7FFF00',
        '#556B2F',
        '#8FBC8F',
        '#00FA9A',
        '#2E8B57',
        '#008000',
        '#006400',
        '#3CB371'
    ];
    function getColor(n) {
        console.log(n);
        color += 1;
        return chartColors[n % 20]
    }

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
                    labels: {
                        color: 'rgb(255, 255, 255)'
                    }
                }
            }
        }
    });
</script>