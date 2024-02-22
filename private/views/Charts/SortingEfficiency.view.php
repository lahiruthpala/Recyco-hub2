<div class="cell cell--4-col-desktop cell--4-col-tablet cell--2-col-phone" style="width: 20%;">
    <div class="card shadow--2dp" style="height: auto;max-height: 300px;">
        <div class="card__supporting-text"
            style="border-radius: 15px;background-image: linear-gradient(to bottom right, #007552, #90B897);">
            <div style="display: flex;">
                <h6 style="margin-top: 0;">Warehouse Capacity</h6>
                <div class="chartIconBlock">
                    <img style="width: 10px;height: 10px;" src="<?= ROOT ?>/images/home.svg" />
                </div>
            </div>
            <div class="pie-chart__container" style="height: 120px;display: flex;">
                <canvas id="WarehouseCapacity"></canvas>
                <label id="WarehouseCapacityData" hidden>
                    <?php
                    echo json_encode($data[0]); ?>
                </label>
                <div style="align-self: center; margin-left: 35px;display: flex;flex-direction: row;">
                    <div style="display: flex;flex-direction: column;align-items: center;">
                        <h6 style="margin: 0;border-bottom: 1px solid;" id="text_data_upper"></h6>
                        <h6 style="margin: 0;" id="text_data_below"></h6>
                    </div>
                    <h6 id="text_data_upper" style="margin:0 0 0 5px;align-self: center;">Kg</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="card__supporting-text"
        style="border-radius: 15px;background-image: linear-gradient(to bottom right, #007552, #90B897);margin-top: 30px;">
        <div style="display: flex;">
            <h6 style="margin-top: 0;">Inventory Conversion Ratio</h6>
            <div class="chartIconBlock">
                <img style="width: 10px;height: 10px;" src="<?= ROOT ?>/images/home.svg" />
            </div>
        </div>
        <div class="pie-chart__container" style="height: 120px;display: flex;">
            <canvas id="InventoryConversionRatio"></canvas>
            <label id="InventoryConversionRatioData" hidden>
                <?php
                echo json_encode($data[0]); ?>
            </label>
            <div style="align-self: center; margin-left: 35px;display: flex;flex-direction: row;">
                <div style="display: flex;flex-direction: column;align-items: center;">
                    <h6 style="margin: 0;" id="text_data"></h6>
                </div>
                <h6 id="text_data_upper" style="margin:0 0 0 5px;align-self: center;">Kg</h6>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script>
    var temp = JSON.parse(document.getElementById("WarehouseCapacityData").textContent);
    console.log(temp);
    tempstr = temp.TotalWeight + 'Kg / ' + temp.capacity + ' Kg ';
    document.getElementById('text_data_upper').innerHTML = temp.TotalWeight;
    document.getElementById('text_data_below').innerHTML = temp.capacity;
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
            backgroundColor: ['#00FFA3', '#18A976'], // Adjust the colors as needed
            hoverOffset: 4
        }]
    };
    const ctx1 = document.getElementById('WarehouseCapacity').getContext('2d');
    new Chart(ctx1, {
        type: 'doughnut',
        data: WarehouseCapacity,
        options: {
            cutout: '70%',
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
            },
            layout: {
                padding: {
                    left: 20
                }
            },
            // other options
        }
    });
    var temp2 = JSON.parse(document.getElementById("InventoryConversionRatioData").textContent);
    
    for (var i = 0; i < temp2.length; i++) {
        weight.push(temp[i].total_weight);
    }
    const InventoryConversionRatio = {
        labels: type,
        datasets: [{
            label: 'Inventory Breakdown',
            data: weight,
            borderWidth: 0,
            backgroundColor: ['#00FFA3', '#18A976'], // Adjust the colors as needed
            hoverOffset: 4
        }]
    };
    const ctx2 = document.getElementById('InventoryConversionRatio').getContext('2d');
    new Chart(ctx1, {
        type: 'doughnut',
        data: WarehouseCapacity,
        options: {
            cutout: '70%',
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
            },
            layout: {
                padding: {
                    left: 20
                }
            },
            // other options
        }
    });
</script>