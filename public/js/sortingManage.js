// JavaScript code to load components when the 'newstock' button is clicked
document.getElementById('newstock').addEventListener('click', function () {
    // Use AJAX to load a new component
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('content').innerHTML = this.responseText;
        }
    };
    xhttp.open('GET', './SortingManager/authenticater.php', true);
    xhttp.send();
    var componentContainer = document.getElementById('componentContainer');
    componentContainer.addEventListener('load', function () {
        // This code will run when the component is fully loaded
        console.log("Component is fully loaded.");
    });
});

// JavaScript code to load components when the 'stock' button is clicked
document.getElementById('stock').addEventListener('click', function () {
    // Use AJAX to load a new component
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('content').innerHTML = this.responseText;
        }
    };
    xhttp.open('GET', './SortingManager/table.php', true);
    xhttp.send();
    var componentContainer = document.getElementById('componentContainer');
    componentContainer.addEventListener('load', function () {
        // This code will run when the component is fully loaded
        console.log("Component is fully loaded.");
    });
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
    xhttp.open('GET', './SortingManager/addNewInventory.php', true);
    xhttp.send();
});