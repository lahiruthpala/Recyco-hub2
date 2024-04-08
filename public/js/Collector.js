let isScannerActive = false;
let inventory = [];
let count = 0;

let scanner = new Instascan.Scanner({
    video: document.getElementById('preview')
});

function getCollectorJobs() {
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
        if (inventory.length > 0) {
            scanInventory(content);
        } else {
            getInfo(content);
        }
    });
}

function getCollectorJobsManual() {
    var content = document.getElementById('CollectorID').value;
    getInfo(content);
}

function getInfo(content) {
    // Create an XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Define the PHP file URL and the request method (POST in this example)
    var url = ROOT + '/Inventory/PendingInventory';
    var method = 'POST';
    // Set up the request
    xhr.open(method, url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    var data = 'Collector_ID=' + encodeURIComponent(content);

    // Set up the callback function to handle the response
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Parse the response (assuming it's a JSON response)
                var response = JSON.parse(xhr.responseText);
                setData(response)
            } else {
                console.error('Error: ' + xhr.status);
            }
        }
    };
    // Send the request with the data
    xhr.send(data);
}

function setData(data) {
    console.log("--------->>>>>>>>", data);
    for (var i = 0; i < data.length; i++) {
        if (data[i].Inventory_ID != null) {
            inventory.push(data[i].Inventory_ID);
        }
        document.getElementById('jobs').innerHTML += "<li class='list__item' style='display: flex;justify-content: space-between;' id=" + data[i].Inventory_ID + "><div name='" + data[i].Inventory_ID + "'>" + data[i].Inventory_ID + "</div><div>" + data[i].waste_type + "</div></li>";
    }
}

function scanInventory(content) {
    console.log(inventory, content);
    if (inventory.includes(content)) {
        if (document.getElementById('jobs').childElementCount == 0) {
            alert("Inventory already scanned");
        } else {
            count += 1;
            let temp = document.getElementById(content).outerHTML;
            document.getElementById(content).remove();
            document.getElementById('ScanJobs').innerHTML += temp;
        }
    } else {
        alert("Inventory not found in the list. Please check your input.");
    }
}

function submit() {
    if(inventory.length != count){
        alert("All inventory are not yet saned");
        return;
    }
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = ROOT + '/Inventory/UpdateStatus';

    // Append jobs to the form

    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'jobs';
    input.value = inventory;
    form.appendChild(input);


    // Submit the form
    document.body.appendChild(form);
    form.submit();

}