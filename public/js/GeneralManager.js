document.getElementById('newstock').addEventListener('click', function () {
    // Use AJAX to load a new component
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('content').innerHTML = this.responseText;
        }
    };
    xhttp.open('GET', 'GeneralManager/addNewInventory', true);
    xhttp.send();
});

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

function loadComponent(component) {
    console.log(component);
    document.getElementById('tableTital').innerHTML = component.replace(/([a-z0-9])([A-Z])/g, '$1 $2');
    fetch('Table/' + component)
        .then(response => response.text())
        .then(html => {
            document.getElementById('content').innerHTML = html;
        })
        .catch(error => console.error('Error:', error));
}
