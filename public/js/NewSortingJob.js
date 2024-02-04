function NewSortingJob(e) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });
    e.preventDefault();
    Swal.fire({
        title: "Enter the Password",
        input: "password",
        inputAttributes: {
            autocapitalize: "off"
        },
        showCancelButton: true,
        confirmButtonText: "Crate",
        showLoaderOnConfirm: true,
        preConfirm: async (pwd) => {
            try {
                document.getElementById("password").value = pwd
                var xhr = new XMLHttpRequest();
                var url = ROOT + "/User/verify";
                var method = 'POST';
                // Set up the request
                xhr.open(method, url, true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                var data = 'pwd=' + encodeURIComponent(pwd);
                // Set up the callback function to handle the response
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            result = xhr.responseText;
                            if (result == "true") {
                                console.log("dshfkusdhffksd")
                                swalWithBootstrapButtons.fire({
                                    title: "confirmed",
                                    text: "Creating the Job.",
                                    icon: "success"
                                });
                                setTimeout(function () {
                                    var formData = new FormData(document.getElementById('newSortingJob'));
                                    formData.append('inventory', document.getElementById("inventorylist").value);
                                    document.getElementById("newSortingJob").submit();
                                }, 500);
                            } else {
                                Swal.showValidationMessage("Wrong Password");
                            }
                        } else {
                            Swal.showValidationMessage(`Request failed: ${xhr.status}`);
                        }
                    }
                };
                // Send the request with the data
                xhr.send(data);
            } catch (error) {
                Swal.showValidationMessage(`Request failed: ${error}`);
            }
        },
        allowOutsideClick: () => !Swal.isLoading()
    });
}