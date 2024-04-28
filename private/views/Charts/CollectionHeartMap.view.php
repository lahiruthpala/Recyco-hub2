<div class="cell cell--4-col-desktop cell--4-col-tablet cell--2-col-phone" style="width: 45%;">
    <div class="card shadow--2dp">
        <div class="card__supporting-text">
            <div style="display: flex;">
                <h6 style="margin-top: 0;color: black;font-weight: bold;">Customer base</h6>
                <div class="chartIconBlock">
                    <img style="width: 10px;height: 10px;" src="<?= ROOT ?>/images/home.svg" />
                </div>
            </div>
            <div class="card__supporting-text" style="height: 300px;">
                <div class="pie-chart__container" style="height: inherit;">
                    <div id="map" style="height: 300px"></div>
                    <label id="SortingRate_data" hidden>
                        <?php
                        echo json_encode($data); ?>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyn3Iymp1NpFUBho-3HfzzMrnJSLKaqgA&libraries=visualization"></script>

<script>
    var heatMapData = [
        { location: new google.maps.LatLng(37.782, -122.447), weight: 0.5 },
        new google.maps.LatLng(37.782, -122.445),
        { location: new google.maps.LatLng(37.782, -122.443), weight: 2 },
        { location: new google.maps.LatLng(37.782, -122.441), weight: 3 },
        { location: new google.maps.LatLng(37.782, -122.439), weight: 2 },
        new google.maps.LatLng(37.782, -122.437),
        { location: new google.maps.LatLng(37.782, -122.435), weight: 0.5 },

        { location: new google.maps.LatLng(37.785, -122.447), weight: 3 },
        { location: new google.maps.LatLng(37.785, -122.445), weight: 2 },
        new google.maps.LatLng(37.785, -122.443),
        { location: new google.maps.LatLng(37.785, -122.441), weight: 0.5 },
        new google.maps.LatLng(37.785, -122.439),
        { location: new google.maps.LatLng(37.785, -122.437), weight: 2 },
        { location: new google.maps.LatLng(37.785, -122.435), weight: 3 }
    ];

    var sanFrancisco = new google.maps.LatLng(37.774546, -122.433523);

    map = new google.maps.Map(document.getElementById('map'), {
        center: sanFrancisco,
        zoom: 13,
        mapTypeId: 'satellite'
    });

    var heatmap = new google.maps.visualization.HeatmapLayer({
        data: heatMapData
    });
    heatmap.setMap(map);
</script>