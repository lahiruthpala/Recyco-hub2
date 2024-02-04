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
    if(CheckInventoryAlreadyAdded(content)){
        return false;
    }
    var xhr = new XMLHttpRequest();

    // Define the PHP file URL and the request method (POST in this example)
    var url = ROOT + "/SortingManager/verifyInventory";
    console.log(url);
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
                    document.getElementById('inventorylist').value += content + ",";
                    document.getElementById('inventory').innerHTML += "<li class='mdl-list__item' value=" + content + ">" + content + "</li>";
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

function CheckInventoryAlreadyAdded(id) {
    console.log("--->>>>>>>>", id)
    var inventoryList = document.getElementById('inventory');
    var inventoryArray = Array.from(inventoryList.getElementsByTagName('li')).map(li => li.innerHTML);
    console.log("--->>>>>>>>", inventoryArray)
    if (inventoryArray.includes(String(id))) {
        alert('ID already exists in inventory list');
        return true;
    } else {
        return false;
    }
}