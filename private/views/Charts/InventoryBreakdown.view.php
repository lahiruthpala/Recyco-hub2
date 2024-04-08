<div class="cell cell--4-col-desktop cell--4-col-tablet cell--2-col-phone" style="width: 30%;">
    <div class="card shadow--2dp" style="height: auto;">
        <div class="card__supporting-text">
            <div style="display: flex;">
                <h6 style="margin-top: 0;color: black;font-weight: bold;">Inventories</h6>
                <div class="chartIconBlock">
                    <img style="width: 10px;height: 10px;" src="<?= ROOT ?>/images/home.svg" />
                </div>
            </div>
            <div class="pie-chart__container" style="height: 350px;display: flex;justify-content: center;">
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
        '#8BE3C3',
        '#106752',
        '#19AA76',
        '#274E13',
        '#38761D',
        '#6AA84F',
        '#93C47D',
        '#B6D7A8',
        '#D9EAD3',
        '#D9D9D9',
        '#EFEFEF',
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
        type.push(temp[i].waste_type);
    }
    for (var i = 0; i < temp.length; i++) {
        weight.push(temp[i].total_weight);
    }
    const data = {
        labels: type,
        datasets: [{
            label: 'Inventory Breakdown',
            data: weight,
            borderWidth: 3,
            spacing: 3,
            borderRadius: 10,
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
                        color: 'black'
                    }
                },
                afterDraw: chart => {
                    var ctx = chart.chart.ctx;
                    ctx.save();
                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';
                    ctx.fillStyle = "#666";
                    var data = chart.data.datasets[0].data;
                    chart.data.labels.forEach(function (label, i) {
                        var meta = chart.getDatasetMeta(0);
                        var rect = meta.data[i].getBoundingClientRect();
                        ctx.fillText(label, rect.x + rect.width / 2, rect.y - 5);
                        ctx.beginPath();
                        ctx.moveTo(rect.x + rect.width / 2, rect.y);
                        ctx.lineTo(rect.x + rect.width / 2, rect.y - 10);
                        ctx.lineTo(rect.x + rect.width / 2 - 5, rect.y - 5);
                        ctx.fillStyle = "#666";
                        ctx.fill();
                    });
                    ctx.restore();
                }
            }
        }
    });
</script>