<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
    <div class="mdl-card mdl-shadow--2dp pie-chart">
        <div class="mdl-card__title" style="align-items: center; justify-content: center;">
            <h2 class="mdl-card__title-text">Warehouse Capacity</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <div class="pie-chart__container">
                <canvas id="WarehouseCapacity"></canvas>
                <label id="data1" hidden>
                    <?php
                    echo json_encode($data[0]); ?>
                </label>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script>
    redIntensity = 0;   // Initial red intensity
    greenIntensity = 120; // Initial green intensity
    blueIntensity = 0;  // Initial blue intensity

    var temp = JSON.parse(document.getElementById("data1").textContent);
    console.log(temp);
    type = Array()
    weight = Array()
    for (var i = 0; i < temp.length; i++) {
        type.push(temp[i].Type);
    }
    for (var i = 0; i < temp.length; i++) {
        weight.push(temp[i].total_weight);
    }
    const data1 = {
        labels: type,
        datasets: [{
            label: 'Inventory Breakdown',
            data: weight,
            backgroundColor: Array.from({ length: type.length }, () => getRandomColor()),
            hoverOffset: 4
        }]
    };
    const ctx1 = document.getElementById('WarehouseCapacity');
    new Chart(ctx1, {
        type: 'doughnut',
        data: data1,
    });
</script>