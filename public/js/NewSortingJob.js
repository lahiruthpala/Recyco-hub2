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
        confirmButtonText: "Create",
        showLoaderOnConfirm: true,
        preConfirm: async (pwd) => {
            try {
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
                                    var form = document.getElementById('newSortingJob');
                                    var inventoryInput = document.createElement('input');
                                    inventoryInput.type = 'hidden';
                                    inventoryInput.name = 'inventoryIds';
                                    inventoryInput.value = inventoryIds.join(',');
                                    form.appendChild(inventoryInput);
                                    var pwdInput = document.createElement('input');
                                    pwdInput.type = 'hidden';
                                    pwdInput.name = 'pwd';
                                    pwdInput.value = pwd;
                                    console.log(pwdInput.value);
                                    form.appendChild(pwdInput);
                                    form.submit();
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