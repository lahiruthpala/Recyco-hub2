function createcomponent(id) {
    console.log(id);
    document.getElementById("AssignBatchID").value = id;
}

let isScannerActive = false;
let scanner = new Instascan.Scanner({
    video: document.getElementById('preview')
});

function getCollecter() {
    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
            isScannerActive = true;
        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });
    scanner.addListener('scan', function (content) {
        getinfo(content);
    });
}
// Function to call PHP function using AJAX
function getinfo(content) {
    // Create an XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Define the PHP file URL and the request method (POST in this example)
    var url = ROOT + '/Inventory/collectordetails';
    var method = 'POST';

    // Set up the request
    xhr.open(method, url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    var data = 'id=' + encodeURIComponent(content);

    // Set up the callback function to handle the response
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Parse the response (assuming it's a JSON response)
                var response = JSON.parse(xhr.responseText);
                setdata(response)

            } else {
                console.error('Error: ' + xhr.status);
            }
        }
    };

    // Send the request with the data
    xhr.send(data);
}

function setdata(data){
    var data = data.success;
    //TODO
    document.getElementById('CollecterName').value = "LAHIRU";
    document.getElementById('VehicleNumber').value = data.Vehicle_NO;
    document.getElementById('Area').value = data.Assigned_Area;
    document.getElementById('Status').value = "Active";
    document.getElementById('CollecterImage').src = "images/Bobby.PNG"
    document.getElementById('Assignbutton').disabled = false;
}