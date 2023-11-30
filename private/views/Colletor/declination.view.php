<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decline Pickup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #c3e9ca;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .decline-form {
            background-color: white;
            color: #333;
            /* Dark text color */
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 400px;
            /* Set a fixed width */
        }

        h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        label {
            font-size: 18px;
            display: block;
            margin-top: 15px;
        }

        textarea {
            width: 100%;
            height: 120px;
            font-size: 16px;
            padding: 10px;
            margin-top: 10px;
            resize: none;
            /* Disable textarea resizing */
            border: 1px solid #ccc;
            /* Add a light border */
        }

        /* Style the submit button with a green color */
        button[type="submit"] {
            background-color: #04AA6D;
            /* Green color */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 12px 20px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease;
            /* Add a smooth hover effect */
        }

        /* Hover effect for the submit button */
        button[type="submit"]:hover {
            background-color: #038f5e;
            /* Darker green color on hover */
        }

        /* Notification style */
        .notification {
            background-color: #04AA6D;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            display: none;
        }
    </style>
</head>

<body>
    <div class="decline-form">
        <h2>Decline Pickup Request</h2>
        <form id="declineForm">
            <label for="reason">Reason for Declining:</label>
            <textarea id="reason" name="reason" required></textarea>
            <!-- Use type="submit" to make the button a submit button -->
            <button type="submit" onclick="changeText()">Submit</button>
        </form>
        <!-- Notification container -->
        <div class="notification" id="notification">
            Pickup request declined successfully.
        </div>
    </div>

    <script>
        const declineForm = document.getElementById("declineForm");
        const notification = document.getElementById("notification");
        function changeText() {
            var button = document.getElementById('Submit');

            // Check the current text content and change it
            if (button.innerHTML === 'Submit') {
                button.innerHTML = 'Done';
            } else {
                button.innerHTML = 'Click me';
            }
        }

        // declineForm.addEventListener("submit", function () {
        //     var button = document.getElementById('submit');

        //     // Check the current text content and change it
        //     if (button.innerHTML === 'Submit') {
        //         e.preventDefault(); // Prevent the form from actually submitting

        //         // Handle form submission (you can add your logic here)

        //         // Display the notification
        //         notification.style.display = "block";

        //         getel

        //         // Hide the notification after 3 seconds (adjust as needed)
        //         setTimeout(function () {
        //             notification.style.display = "none";
        //         }, 3000);
        //         button.innerHTML = "Done"
        //     } else {
        //         window.location.href = "<?= ROOT ?>/collector/declination";
        //     }
        // });
    </script>
</body>

</html>