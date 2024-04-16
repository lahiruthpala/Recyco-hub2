<div class="card__supporting-text no-padding"
    style="margin: 20px; display: none;  width: 95%; border-radius: 15px; border: 1px solid green;color: black;"
    id="NewSector">
    <form method="POST"  action="<?= ROOT ?>/Admin/AddNewSectors"
        enctype="multipart/form-data" id="AddNewSectors">
        <div class="form__article">
            <h3>Sector info</h3>

            <div class="grid" style="margin-left: 30px;">
                <div
                    style="display: flex;justify-content: center;align-items: center;padding-right: 30px;border-right: 2px solid var(--smoke-color);">
                    <div class="profile-image color--smooth-gray profile-image--round">
                        <label for="profileImage">
                            <img src="<?= ROOT ?>/images/locationDefault.jpg" id="Image" style="max-width: 100%;">
                            <input type="file" id="profileImage" name="profileImage" style="display: none;"
                                onchange="displayImage(this)">
                        </label>

                        <script>
                            function displayImage(input) {
                                if (input.files && input.files[0]) {
                                    var fileSize = input.files[0].size; // Get the file size in bytes
                                    var maxSize = 1 * 1024 * 1024; // 1MB in bytes
                                    var fileExtension = input.files[0].name.split('.').pop().toLowerCase(); // Get the file extension

                                    if (fileSize > maxSize) {
                                        SideNotification(["Error: The uploaded image size exceeds the maximum allowed size of 1MB.", 'error']);
                                        return;
                                    }

                                    if (!['jpg', 'jpeg', 'png', 'gif'].includes(fileExtension)) {
                                        SideNotification(["Error: Only image files (JPG, JPEG, PNG, GIF) are allowed.", 'error']);
                                        return;
                                    }

                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        document.getElementById('Image').src = e.target.result;
                                    }

                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                        </script>
                    </div>
                </div>

                <div style="margin-left: 30px">
                    <div style="display: flex; ">
                        <h6>Sector Name</h6>
                        <input id="Action" name="Action" value="AddNew" hidden>
                        <input id="sector_ID" name="sector_ID" hidden>
                        <input id="latitude" name="latitude" hidden>
                        <input id="longitude" name="longitude" hidden>
                        <input id="radius" name="radius" hidden>
                        <h6 style="margin-left:5.8vw;">
                            <input type="text" placeholder="Enter the SectorName" id="SectorName" name="SectorName"
                                class="textfield__input">
                            <label class="textfield__error" id="NameError" for="SectorName"></label>
                        </h6>
                    </div>
                </div>

                <div style="margin-left: 20%;">
                    <div style="display: flex;">
                        <h6>Description</h6>
                        <h6 style="margin-left:3vw;">
                            <input type="Name" placeholder="Enter the Price" id="Price" name="Price"
                                class="textfield__input">
                            <label class="textfield__error" id="PriceError" for="Price"></label>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div id="map" style="height: 500px;margin: 50px 15px 50px 15px;"></div>
        <label id="Sector_data" hidden>
            <?php
            echo json_encode($data); ?>
        </label>
        <div style="display:flex;">
            <button id="CreateButton" class="button js-button button--raised js-ripple-effect button--colored-green"
                style="border-radius: 99px; margin-left: auto;">Create</button>
        </div>
    </form>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyn3Iymp1NpFUBho-3HfzzMrnJSLKaqgA"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        console.log("+++++++++++++++++++++++++++++++++");
        var sectors = JSON.parse(document.getElementById("Sector_data").textContent);
        console.log(sectors);
        function initMap() {
            // Create the map.
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 8,
                center: { lat: 6.902041987828156, lng: 79.86116500114315 },
            });

            // Construct the circle for each value in citymap.
            // Note: We scale the area of the circle based on the population.
            for (const sector in sectors) {
                // Add the circle for this city to the map.
                console.log(sector);
                var latlng = new google.maps.LatLng(sectors[sector].latitude, sectors[sector].longitude);
                const cityCircle = new google.maps.Circle({
                    strokeColor: "#FF0000",
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: "#FF0000",
                    fillOpacity: 0.35,
                    map,
                    center: latlng,
                    radius: sectors[sector].radius,
                });
            }
            var latlng = new google.maps.LatLng(6.902041987828156, 79.86116500114315);
            const cityCircle = new google.maps.Circle({
                strokeColor: "#0000FF",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#0000FF",
                fillOpacity: 0.35,
                map,
                center: latlng,
                radius: 1000,
                editable: true,
            });

            // Listen for changes in the circle
            google.maps.event.addListener(cityCircle, 'radius_changed', function() {
                var newRadius = cityCircle.getRadius();
                document.getElementById('radius').value = newRadius;
                console.log("New radius: " + newRadius);
            });

            google.maps.event.addListener(cityCircle, 'center_changed', function() {
                var newCenter = cityCircle.getCenter();
                document.getElementById('latitude').value = newCenter.lat();
                document.getElementById('longitude').value = newCenter.lng();
                console.log("New center: " + newCenter.lat() + ", " + newCenter.lng());
            });
        }

        initMap();
    });
</script>