<div class="cell cell--4-col-desktop cell--4-col-tablet cell--2-col-phone" style="width: 45%;">
    <div class="card shadow--2dp" style="height: auto;">
        <div class="card__supporting-text">
            <div style="display: flex;">
                <h6 style="margin-top: 0;color: black;font-weight: bold;">Collection Rate</h6>
                <div class="chartIconBlock">
                    <img style="width: 10px;height: 10px;" src="<?= ROOT ?>/images/home.svg" />
                </div>
            </div>
            <div class="card__supporting-text">
                <div class="pie-chart__container">
                    <canvas id="CollectionRate"></canvas>
                    <label id="CollectionRate_data" hidden>
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
    var temp = JSON.parse(document.getElementById("CollectionRate_data").textContent);
    labels = Array()
    Reject = Array()
    Finished = Array()
    for (var i = 0; i < temp.length; i++) {
        $tempStatus =temp[i].Status;
        if ($tempStatus == "Rejected") {
            Reject.push(temp[i].TotalCollections);
        } else {
            Finished.push(temp[i].TotalCollections);
        }
        labels.push(temp[i].Date)
    }
    console.log(labels, Reject, Finished);
    const CollectionRate_values = {
        labels: labels,
        datasets: [{
            label: 'Success Pickup Request',
            data: Finished,
            fill: true,
            backgroundColor: "rgba(3, 169, 245, 0.2)",
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }, {
            label: 'Fail Pickup Request',
            data: Reject,
            fill: true,
            backgroundColor: "rgba(200, 44, 44, 0.2)",
            borderColor: 'red',
            tension: 0.1
        }]
    };

    const CollectionRateConfig = {
        type: 'line',
        data: CollectionRate_values,
    };

    const chart = new Chart(document.getElementById('CollectionRate'), CollectionRateConfig);

</script>
