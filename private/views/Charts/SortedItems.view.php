<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
    <div class="mdl-card mdl-shadow--2dp pie-chart">
        <div class="mdl-card__title" style="align-items: center; justify-content: center;">
            <h2 class="mdl-card__title-text">Sorted Items</h2>
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
    let redIntensity = 0;   // Initial red intensity
    let greenIntensity = 120; // Initial green intensity
    let blueIntensity = 0;  // Initial blue intensity

    function getRandomColor() {
        // Increase color intensities (make them lighter)
        redIntensity += 10;
        greenIntensity += 10;
        blueIntensity += 10;

        // Ensure color intensities do not exceed 255
        if (redIntensity > 255) redIntensity = 255;
        if (greenIntensity > 255) greenIntensity = 255;
        if (blueIntensity > 255) blueIntensity = 255;

        // Return the updated color
        return `rgb(${redIntensity}, ${greenIntensity}, ${blueIntensity})`;
    }
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
            backgroundColor: Array.from({ length: type.length }, () => getRandomColor()),
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