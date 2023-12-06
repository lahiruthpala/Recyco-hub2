let isScannerActive = false;
let scanner = new Instascan.Scanner({
    video: document.getElementById('preview')
});

function Addinventory() {
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
        callVerifyInventory(content);
    });
}
// Function to call PHP function using AJAX
function callVerifyInventory(content) {
    // Create an XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Define the PHP file URL and the request method (POST in this example)
    var url = '<?= ROOT ?>/SortingManager/verifyInventory';
    var method = 'POST';

    // Set up the request
    xhr.open(method, url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    var data = 'content=' + encodeURIComponent(content);

    // Set up the callback function to handle the response
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Parse the response (assuming it's a JSON response)
                var response = JSON.parse(xhr.responseText);

                // Check if the inventory verification was successful
                console.log(response);
                if (response.success) {
                    // If successful, update the HTML element with the scanned content
                    document.getElementById('inventorylist').value += "," + content;
                    document.getElementById('inventory').innerHTML += "<span class='mdl-list__item-primary-content list__item-text'>" + content + "</span>";
                } else {
                    alert('Invalied QR code');
                }
            } else {
                console.error('Error: ' + xhr.status);
            }
        }
    };

    // Send the request with the data
    xhr.send(data);
}