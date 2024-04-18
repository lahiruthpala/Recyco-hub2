let isScannerActive = false;
let inventoryIds = [];
let waste_type = ""
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
    if (CheckInventoryAlreadyAdded(content)) {
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
                console.log(xhr.responseText);
                var response = JSON.parse(xhr.responseText);

                // Check if the inventory verification was successful
                console.log('Response', response);
                if (response.success) {
                    // If successful, update the HTML element with the scanned content
                    if (waste_type == "") {
                        waste_type = response.WasteType;
                        document.getElementById('WasteType').value = response.WasteType;
                        inventoryIds.push(content);
                        document.getElementById('inventory').innerHTML += "<li class='list__item' value=" + content + " style='color: black;'>" + content + "</li>";
                        getSortingMachine(response.WasteType);
                    }else if(waste_type != response.WasteType) {
                        SideNotification(["Error: Waste types are incompatible", 'error']);
                        return false;
                    }else {
                        inventoryIds.push(content);
                        document.getElementById('inventory').innerHTML += "<li class='list__item' value=" + content + " style='color: black;'>" + content + "</li>";
                    }
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
    console.log("AlreadyAdded", id)
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

function submitNewSortingJob(e) {
    e.preventDefault(); // Prevent form submission
    console.log(inventoryIds);
    // Append inventoryIds to the form
    var form = document.getElementById('newSortingJob'); // Replace 'yourFormId' with the actual ID of your form
    var inventoryInput = document.createElement('input');
    inventoryInput.type = 'hidden';
    inventoryInput.name = 'inventoryIds';
    inventoryInput.value = inventoryIds.join(',');
    form.appendChild(inventoryInput);
    console.log('done');
    // Submit the form
    form.submit();
}

function getSortingMachine(content) {
    // Create an XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Define the PHP file URL and the request method (POST in this example)
    var url = ROOT + '/SortingManager/getSortingMachine';
    var method = 'POST';
    // Set up the request
    xhr.open(method, url, true);

    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    // Add session ID to the request header
    var data = 'waste_type=' + encodeURIComponent(content);

    // Set up the callback function to handle the response
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Parse the response (assuming it's a JSON response)
                var response = JSON.parse(xhr.responseText);
                console.log(response);
                if (response == 'false') {
                    SideNotification(["Error: No Machine are available", 'error']);
                    return;
                } else {
                    setData(response);
                }
            } else {
                console.error('Error: ' + xhr.status);
            }
        }
    };
    // Send the request with the data
    xhr.send(data);
}

function setData(data) {
    for(var i = 0; i < data.length; i++) {
        document.getElementById('MachineTypes').innerHTML += "<li class='menu__item'" + `onclick="SetForm('${data[i].Machine_ID}', '${data[i].Machine_Type}')"` + '>' + data[i].Machine_Type + '</li>';
    }
    document.getElementById('Machine_Type').disabled = false;
}