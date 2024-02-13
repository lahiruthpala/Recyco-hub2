document.addEventListener("DOMContentLoaded", function() {
    var success = JSON.parse(document.getElementById("success").textContent);
    var error = JSON.parse(document.getElementById("error").textContent);
    console.log(success, error);
    Toastify({
        text: "This is a toast",
        duration: 3000,
        destination: "https://github.com/apvarun/toastify-js",
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        offset: {
            x: 20, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
            y: 75 // vertical axis - can be a number or a string indicating unity. eg: '2em'
        },
        style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)",
        },
        onClick: function () { } // Callback after click
    }).showToast();
});