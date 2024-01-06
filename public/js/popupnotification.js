function popup_notification() {
    console.log('Page loaded!');

    // Specify the target div to observe
    const targetDiv = document.getElementById('popupnotification');

    // Create a MutationObserver instance
    const observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
            Toastify({
                text: "Hello",
                duration: 6000,
                position: "center",
                className: "Success",
                borderRadius: "30px",
                stopOnFocus: true,
                offset: {
                    x: 0, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                    y: 50 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                },
                style: {
                    //"linear-gradient(to right, #00b09b, #96c93d)"
                    background: "red",
                }
            }).showToast();
        });
    });

    // Configuration for the observer (in this case, we are observing changes in the content of the div)
    const config = {
        childList: true,
        subtree: true,
        characterData: true
    };

    // Start observing the target div with the specified configuration
    observer.observe(targetDiv, config);
}

// Run the onPageLoad function when the page has finished loading
document.addEventListener('DOMContentLoaded', popup_notification);