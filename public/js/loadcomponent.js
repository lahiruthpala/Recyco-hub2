function loadComponent(component, id="") {
    event.stopPropagation();
    console.log(component);
    document.getElementById('tableTitle').innerHTML = component.substring(component.lastIndexOf("/") + 1).replace(/([a-z0-9])([A-Z])/g, '$1 $2');
    var sections = document.getElementsByClassName('mdl-card__supporting-text no-padding');
    // Hide all sections
    console.log("Inside the load component");
    for (var i = 0; i < sections.length; i++) {
        sections[i].style.display = 'none';
        if (typeof isScannerActive !== 'undefined' && isScannerActive) {
            scanner.stop();
        }
    }
    console.log("All are hidden");
    if(id.length != 0){
        createcomponent(id)
    }
    var partnerTableSection = document.getElementById(component);
    partnerTableSection.style.display = 'block';
    console.log("Done")
}

function loadScreen(page, id = "") {
    const url = "http://localhost:8380/Recyco-hub2/public/" + `/${page}?id=${id}`;
    window.location.href = url;
}

function loadRawInventoryInfo(page, Type = "", Location = "") {
    const url = `http://localhost:8380/Recyco-hub2/public/${page}?Type=${Type}&Location=${Location}`;
    window.location.href = url;
}
