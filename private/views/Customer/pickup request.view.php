<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pickup Order</title>
<<<<<<< Updated upstream
    <link rel="stylesheet" type="text/css" href="<?=ROOT ?>/css/lib/pickuprequeststyle.css">
</head>
<body> 
=======
    <!-- <link rel="stylesheet" type="text/css" href="pickuprequeststyle.css"> -->
    <link rel="stylesheet" href="<?= ROOT ?>/css/pickuprequeststyle.css">
</head>
<body>  
>>>>>>> Stashed changes
    <!-- <img src="images/pickup background.jpg"> -->
    <h2>Pickup Order Request</h2>

    <form class="container">
        <div class="column1">
            <label for="itemName">Select Item:</label>
            <select id="itemName" name="itemName" required>
                <option value="" disabled selected>Select an item</option>
                <option value="item1">plastic</option>
                <option value="item2">glass</option> 2</option>
                <option value="item3">polythene</option>
            </select>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" placeholder="Enter quantity" required>

        <label for="pickupDate">Pickup Date:</label>
        <input type="date" id="pickupDate" name="pickupDate" required>

        <label for="pickupaddress">Address:</label>
        <input type="text" id="homenumber" name="homenumber" required>
        <!-- <input type="text" id="street address" name="street address" required> -->
    
            <input type="text" id="city" name="city" required>
        </div>
        <div class="column2">
            <label for="pickup-point">Pickup Point:</label>
            <input type="text" id="pickup-point" name="pickup-point" placeholder="Enter pickup point address">
            <div id="map"><img src="images/map.jpg"></div>
    
        </div>
       
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
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&libraries=places&callback=initMap"></script>
    </form>
        <div class="submitbutton">
            <button  onclick="buttonClicked(1)" id="pickupbutton" type="submit">Submit Pickup Request</button>
            <button type="submit">More items to sell ?</button>
        </div>
        <script>
            function buttonClicked(buttonNumber){
                var newPageUrl = "http://localhost:5500/private/views/Customer/index.html"
                window.location.href = newPageUrl;
            }
        </script>

</body>
</html>
