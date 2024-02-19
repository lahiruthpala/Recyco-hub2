<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pickup Order</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/css/pickuprequeststyle.css">
</head>

<body>
    <!-- <img src="images/pickup background.jpg"> -->
    <h2>Pickup Order Request</h2>

    <form class="container" id="Request" method="POST">
        <div class="column1">
            <label for="waste_type">Select Item:</label>
            <select id="waste_type" name="waste_type" required>
                <option value="" disabled selected>Select an item</option>
                <option value="plastic">plastic</option>
                <option value="glass">glass</option> 2</option>
                <option value="polythene">polythene</option>
            </select>

            <label for="weight">Quantity:</label>
            <input type="number" id="weight" name="weight" placeholder="Enter quantity" required>

            <label for="pickupDate">Pickup Date:</label>
            <input type="date" id="pickupDate" name="pickupDate" required>

            <label for="pickup_address">Address:</label>
            <input type="text" id="pickup_address" name="pickup_address" required>
        </div>
        <div class="column2">
            <label for="pickup-point">Pickup Point:</label>
            <input type="text" id="pickup-point" name="pickup-point" placeholder="Enter pickup point address">
            <div id="map"><img src="images/map.jpg"></div>

        </div>
    </form>
    <div class="submitbutton">
        <button onclick="submit()" id="pickupbutton" type="submit">Submit Pickup Request</button>
        <button type="submit">More items to sell ?</button>
    </div>
    <script>
        function submit() {
            var form = document.getElementById('Request');
            var input = document.getElementById('pickup-point');

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;

                    // Append the coordinates to the form
                    var latInput = document.createElement('input');
                    latInput.type = 'hidden';
                    latInput.name = 'latitude';
                    latInput.value = lat;
                    form.appendChild(latInput);

                    var lngInput = document.createElement('input');
                    lngInput.type = 'hidden';
                    lngInput.name = 'longitude';
                    lngInput.value = lng;
                    form.appendChild(lngInput);

                    // Submit the form
                    form.submit();
                }, function(error) {
                    alert('Error getting current position: ' + error.message);
                });
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        }
    </script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 0, lng: 0 },
                zoom: 15
            });

            var input = document.getElementById('pickup-point');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.bindTo('bounds', map);

            var marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
            });

            autocomplete.addListener('place_changed', function () {
                marker.setVisible(false);
                var place = autocomplete.getPlace();

                if (!place.geometry) {
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }

                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }

                marker.setPosition(place.geometry.location);
                marker.setVisible(true);
            });
        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&libraries=places&callback=initMap"></script>

</body>

</html>