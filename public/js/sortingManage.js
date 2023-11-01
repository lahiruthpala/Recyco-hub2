document.getElementById('newstock').addEventListener('click', function () {
    // Use AJAX to load a new component
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('content').innerHTML = this.responseText;
        }
    };
    xhttp.open('GET', 'SortingManager/table', true);
    xhttp.send();
});

// JavaScript code to load components when the 'stock' button is clicked
document.getElementById('newstock').addEventListener('click', function () {
    // Use AJAX to load a new component
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('content').innerHTML = this.responseText;
        }
    };
    xhttp.open('GET', 'SortingManager/addNewInventory', true);
    xhttp.send();
});

document.getElementById('continue').addEventListener('click', function () {
    // Use AJAX to load a new componen
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Replace the content of the 'content' section with the new component
            document.getElementById('content').innerHTML = this.responseText;
        }
    };
    xhttp.open('GET', 'SortingManager/addNewInventory', true);
    xhttp.send();
});