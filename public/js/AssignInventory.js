function createcomponent(id) {
    var collecter = getcollecterdetails(id)
    console.log(collecter);
}

function getcollecterdetails(content) {
    // Create an XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Define the PHP file URL and the request method (POST in this example)
    var url = '<?= ROOT ?>/Inventory/collectordetails';
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
                return response;
            } else {
                console.error('Error: ' + xhr.status);
            }
        }
    };

    // Send the request with the data
    xhr.send(data);
}