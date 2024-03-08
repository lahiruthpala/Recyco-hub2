function loadComponent(component, id="") {
    event.stopPropagation();
    console.log(component);
    var sections = document.getElementsByClassName('card__supporting-text no-padding');
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
    console.log("Done");

    // Get all child elements in the div
    var button = document.getElementById("buttonToggle");
    var childElements = button.children;
    for(var i = 0; i < childElements.length; i++){
        if (childElements[i].id && childElements[i].id.endsWith("_Button")) {
            if(childElements[i].id != component+"_Button"){
                childElements[i].className = "button js-button button--raised js-ripple-effect button--colored-smoke";
            }else{
                childElements[i].className = "button js-button button--raised js-ripple-effect button--colored-green";
            }
        }
    }
}

function loadComponent2(component, show=[], hide=[], id="") {
    event.stopPropagation();
    console.log(component);

    for(var i = 0; i < hide.length; i++){
        document.getElementById(hide[i]).style.display = 'none';
    }
    var sections = document.getElementsByClassName('card__supporting-text no-padding');
    // Hide all sections
    console.log("Inside the load component");
    for (var i = 0; i < sections.length; i++) {
        sections[i].style.display = 'none';
        if (typeof isScannerActive !== 'undefined' && isScannerActive) {
            scanner.stop();
        }
    }
    for(var i = 0; i < show.length; i++){
        var partnerTableSection = document.getElementById(show[i]);
        partnerTableSection.style.display = 'block';
    }
    console.log("All are hidden");
    if(id.length != 0){
        createcomponent(id)
    }
    var partnerTableSection = document.getElementById(component);
    partnerTableSection.style.display = 'block';
    console.log("Done");

    // Get all child elements in the div
    var button = document.getElementById("buttonToggle");
    var childElements = button.children;
    for(var i = 0; i < childElements.length; i++){
        if (childElements[i].id && childElements[i].id.endsWith("_Button")) {
            if(childElements[i].id != component+"_Button"){
                childElements[i].className = "button js-button button--raised js-ripple-effect button--colored-smoke";
            }else{
                childElements[i].className = "button js-button button--raised js-ripple-effect button--colored-green";
            }
        }
    }
}

function loadPreview(component, id="") {
    event.stopPropagation();
    console.log(component);
    var sections = document.getElementsByClassName('scrollmain');
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
    console.log("Done");

    // Get all child elements in the div
    var button = document.getElementById("buttonToggle");
    var childElements = button.children;
    for(var i = 0; i < childElements.length; i++){
        if(childElements[i].id != component+"_Button"){
            childElements[i].className = "button js-button button--raised js-ripple-effect button--colored-smoke";
        }else{
            childElements[i].className = "button js-button button--raised js-ripple-effect button--colored-green";
        }
    }
}

function loadScreen(page, id = "") {
    const url = ROOT  + `/${page}?id=${id}`;
    window.location.href = url;
}

function loadRawInventoryInfo(page, Type = "", Location = "") {
    const url = ROOT + `/${page}?Type=${Type}&Location=${Location}`;
    window.location.href = url;
}
