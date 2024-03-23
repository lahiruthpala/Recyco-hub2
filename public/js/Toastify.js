document.addEventListener("DOMContentLoaded", function () {
    var success = document.getElementsByClassName("success");
    var error = document.getElementsByClassName("error");
    console.log(error, success);

    Array.from(success).forEach(function (element) {
        Toastify({
            text: element.textContent,
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
            onClick: function () {} // Callback after click
        }).showToast();
        element.remove();
    });

    Array.from(error).forEach(function (element) {
        Toastify({
            text: element.textContent,
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
                background: "linear-gradient(to right, red, #ff0000)",
            },
            onClick: function () {} // Callback after click
        }).showToast();
        element.remove();
    });
});

function SideNotification(massage = ['Something went wrong', 'error']) {
    if (massage[1] == "success") {
        Toastify({
            text: massage[0],
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
            onClick: function () {} // Callback after click
        }).showToast();
    } else {
        Toastify({
            text: massage[0],
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
                background: "linear-gradient(to right, red, #ff0000)",
            },
            onClick: function () {} // Callback after click
        }).showToast();
    }
}