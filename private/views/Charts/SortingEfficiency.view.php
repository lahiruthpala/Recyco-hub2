<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
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
    redIntensity = 0;   // Initial red intensity
    greenIntensity = 120; // Initial green intensity
    blueIntensity = 0;  // Initial blue intensity

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
            backgroundColor: Array.from({ length: type.length }, () => getRandomColor()),
            hoverOffset: 4
        }]
    };
    const ctx3 = document.getElementById('SortingRate');
    new Chart(ctx3, {
        type: 'doughnut',
        data: data2,
    });
</script>