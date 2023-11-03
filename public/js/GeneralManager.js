document.getElementById('Generate').addEventListener('click', function () {
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
document.getElementById('PendingInventory').addEventListener('click', function () {
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
document.getElementById('RawInventory').addEventListener('click', function () {
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
document.getElementById('SortedInventory').addEventListener('click', function () {
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