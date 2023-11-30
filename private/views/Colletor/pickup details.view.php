<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->view('include/head') ?>
    <title>Pickup Details</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d7f3db;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .pickup-tile {
            background-color: #c8f2b2;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 30px;
            width: 400px;
            /* Set a fixed width */
            height: 600px;
            /* Set a fixed height */
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Add space between content and buttons */
        }

        .pickup-tile h2 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        /* Style for the green circle */
        .green-circle {
            background-color: #04AA6D;
            /* Green color */
            width: 150px;
            height: 150px;
            border-radius: 50%;
            /* Makes it a circle */
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
            /* Center the circle */
        }

        /* Style for the truck icon */
        .pickup-tile .truck-icon {
            font-size: 64px;
            color: white;
            /* White color for the icon */
        }

        .pickup-tile p {
            font-size: 20px;
            margin-bottom: 12px;
        }

        .pickup-details {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-start;
        }

        .attribute {
            text-align: center;
            /* Center the text */
            width: 45%;
            /* Adjust the width as needed */
        }

        .value {
            text-align: left;
            width: 45%;
            /* Adjust the width as needed */
        }

        /* Fixed width for the "Pickup Details" heading */
        .pickup-heading {
            width: 100%;
        }

        /* Style for the buttons */
        .action-buttons {
            display: flex;
            justify-content: space-between;
        }

        .action-buttons button {
            background-color: #04AA6D;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
        }

        /* Add some margin to the buttons */
        .action-buttons button:first-child {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div>
        <header>
            <?php $this->view('include/header') ?>
        </header>
        <div class="pickup-tile">
            <!-- Green circle with truck icon -->
            <div class="green-circle">
                <i class="fas fa-truck-pickup truck-icon"></i>
            </div>
            <h2 class="pickup-heading">Pickup Details</h2>
            <div class="pickup-details">
                <div class="attribute">
                    <p><strong>Pickup ID:</strong></p>
                    <p><strong>Customer ID:</strong></p>
                    <p><strong>Customer Name:</strong></p>
                    <p><strong>Location:</strong></p>
                    <p><strong>Date:</strong></p>
                    <p><strong>Time:</strong></p>
                </div>
                <div class="value">
                    <p id="pickupIDValue">
                        <?= $pickup->pickupId ?>
                    </p>
                    <p id="customerIDValue">
                        <?= $pickup->User_ID ?>
                    </p>
                    <p id="customerNameValue">
                        <?= $pickup->User_ID ?>
                    </p>
                    <p id="locationValue">
                        <?= $pickup->pickup_address ?>
                    </p>
                    <?php
                        $timestamp = strtotime($pickup->time); // Convert string to timestamp
                        if ($timestamp !== false) {
                            // Successfully converted to timestamp
                            $formattedDate = date('Y-m-d', $timestamp); // Format date
                            $formattedTime = date('H:i:s', $timestamp); // Format time

                            echo "<p id='dateValue'>$formattedDate</p>";
                            echo "<p id='timeValue'>$formattedTime</p>";
                        } else {
                            // Handle the case when the conversion fails
                            echo "<p>Invalid date/time format</p>";
                        }
                    ?>
                </div>

            </div>
            <!-- Action buttons -->
            <div class="action-buttons">
                <button id="acceptButton">Accept</button>
                <button id="declineButton">Decline</button>
            </div>
        </div>

        <script>
            // Button event listeners
            const acceptButton = document.getElementById("acceptButton");
            const declineButton = document.getElementById("declineButton");

            acceptButton.addEventListener("click", () => {
                // Redirect to the acceptance page when the "Accept" button is clicked
                window.location.href = "<?= ROOT ?>/collector/confirmation";
            });

            declineButton.addEventListener("click", () => {
                // Add your logic for declining the pickup here
                window.location.href = "<?= ROOT ?>/collector/declination";
            });
        </script>

    </div>
</body>
<?php $this->view('include/footer') ?>

</html>