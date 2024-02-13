<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone" style="width: 20%;">
    <div class="mdl-card mdl-shadow--2dp" style="height: auto;max-height: 300px;">
        <div class="mdl-card__title" style="align-items: center; justify-content: center;">
            <h2 class="mdl-card__title-text">Warehouse Capacity</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <div class="pie-chart__container" style="height: 120px;">
                <canvas id="WarehouseCapacity"></canvas>
                <label id="WarehouseCapacityData" hidden>
                    <?php
                    echo json_encode($data[0]); ?>
                </label>
            </div>
        </div>
    </div>
    <div class="mdl-card mdl-shadow--2dp pie-chart" style="height: 210px; margin-top:20px;">
        <div class="mdl-card__title" style="align-items: center; justify-content: center;">
            <h2 class="mdl-card__title-text">Warehouse Capacity</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <div class="pie-chart__container" style="height: 120px;">
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
    type = Array("Current weight", "Remaining weight"); // Adjust the labels as needed
    weight = Array(temp.TotalWeight, temp.capacity - temp.TotalWeight); // Adjust the values based on your capacity
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
            backgroundColor: ['green', 'rgb(102,102,102)'], // Adjust the colors as needed
            hoverOffset: 4
        }]
    };
    const ctx1 = document.getElementById('WarehouseCapacity').getContext('2d');
    new Chart(ctx1, {
        type: 'doughnut',
        data: WarehouseCapacity,
        options: {
            cutout: '70%',
            responsive: true, // Allow the chart to be responsive
            maintainAspectRatio: false, // Prevent the chart from maintaining aspect ratio // Adjust the size of the inner cutout based on your design preference
            height: 151,
            plugins: {
                legend: {
                    display: false,
                    labels: {
                        color: 'rgb(255, 255, 255)'
                    }
                },
                tooltip: {
                    enabled: false // Disable tooltips
                },
                datalabels: {
                    color: '#000',
                    font: {
                        size: '16'
                    },
                    formatter: "Text",
                    anchor: 'center', // Position the data label in the center of each arc
                    align: 'center' // Align the text horizontally in the center of each arc
                }
            }
        }
    });
</script>