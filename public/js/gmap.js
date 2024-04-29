var geocoder = new google.maps.Geocoder();


$(function () {
    getInitialLocation();
});


function updateMarkerPosition(latlng) {
    $('#latitude').val(latlng.lat());
    $('#longitude').val(latlng.lng());
    console.log(latlng.lat() + " " + latlng.lng());
}



function updateMarkerAddress(str) {
    document.getElementById('address').value = str;
}

function getInitialLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
            var initialLocation = [lat, lng];
            initialize_map(initialLocation);
        }, function (error) {
            SideNotification(['Error getting current position: ' + error.message, 'error']);
        });
    } else {
        SideNotification(['Geolocation is not supported by this browser.', 'error']);
        return false;
    }
}


function initialize_map(initialLocation) {

    var lat_value = document.getElementById('latitude').value;
    var long_value = document.getElementById('longitude').value;
    if (initialLocation) {
        if (lat_value == '0' || lat_value == "") {
            lat_value = initialLocation[0];
        }
        if (long_value == '0' || long_value == '') {
            long_value = initialLocation[1];
        }
    } else {
        if (lat_value == '0' || lat_value == "") {
            lat_value = 27.6982754;
        }
        if (long_value == '0' || long_value == '') {
            long_value = 85.323064;
        }
    }
    var latlng = new google.maps.LatLng(lat_value, long_value);


    var myOptions = {
        zoom: 14,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }



    map = new google.maps.Map(document.getElementById("map"), myOptions);


    marker = new google.maps.Marker({
        position: latlng,
        title: 'Singha Durbar, Kathmandu',
        map: map,
        draggable: true,
        //shadow: shadow,
    });


    google.maps.event.addListener(marker, 'drag', function () {
        updateMarkerPosition(marker.getPosition());
    });
}