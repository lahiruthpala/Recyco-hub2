<!DOCTYPE html>
<html lang="en">
<head>

    
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
            width: 400px; /* Set a fixed width */
            height: 600px; /* Set a fixed height */
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Add space between content and buttons */
        }

        .pickup-tile h2 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        /* Style for the green circle */
        .green-circle {
            background-color: #04AA6D; /* Green color */
            width: 150px;
            height: 150px;
            border-radius: 50%; /* Makes it a circle */
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto; /* Center the circle */
        }
         /* Style for the truck icon */
         .pickup-tile .truck-icon {
            font-size: 64px;
            color: white; /* White color for the icon */
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
            text-align: center; /* Center the text */
            width: 45%; /* Adjust the width as needed */
        }
        .value {
            text-align: left;
            width: 45%; /* Adjust the width as needed */
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
                <p id="pickupIDValue"></p>
                <p id="customerIDValue"></p>
                <p id="customerNameValue"></p>
                <p id="locationValue"></p>
                <p id="dateValue"></p>
                <p id="timeValue"></p>
            </div>
        </div>
        <!-- Action buttons -->
        <div class="action-buttons">
            <button id="acceptButton">Accept</button>
            <button id="declineButton">Decline</button>
        </div>
    </div>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const pickupID = urlParams.get("pickupID");

        const pickupDetails = {
            P12345: {
                customerID: 'C67890',
                customerName: 'John Doe',
                location: 'Location 1, City A',
                date: '2023-09-25',
                time: '15:30',
            },
            P12346: {
                customerID: 'C56789',
                customerName: 'Jane Smith',
                location: 'Location 2, City B',
                date: '2023-09-26',
                time: '10:00',
            },
        };

        // Select value elements
        const pickupIDValue = document.getElementById("pickupIDValue");
        const customerIDValue = document.getElementById("customerIDValue");
        const customerNameValue = document.getElementById("customerNameValue");
        const locationValue = document.getElementById("locationValue");
        const dateValue = document.getElementById("dateValue");
        const timeValue = document.getElementById("timeValue");

        // Check if the pickup ID exists in the details
        if (pickupDetails[pickupID]) {
            const details = pickupDetails[pickupID];
            pickupIDValue.textContent = pickupID;
            customerIDValue.textContent = details.customerID;
            customerNameValue.textContent = details.customerName;
            
            // Create a link to view the location on Google Maps
            const locationLink = document.createElement("a");
            locationLink.href = `https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(details.location)}`;
            locationLink.textContent = details.location;
            locationValue.appendChild(locationLink);
            
            dateValue.textContent = details.date;
            timeValue.textContent = details.time;
        } else {
            // Handle case where pickup details are not found
            pickupIDValue.textContent = "N/A";
            customerIDValue.textContent = "N/A";
            customerNameValue.textContent = "N/A";
            locationValue.textContent = "N/A";
            dateValue.textContent = "N/A";
            timeValue.textContent = "N/A";
        }

        // Button event listeners
        const acceptButton = document.getElementById("acceptButton");
        const declineButton = document.getElementById("declineButton");

acceptButton.addEventListener("click", () => {
    // Redirect to the acceptance page when the "Accept" button is clicked
    window.location.href = "confirmation.html";
});

declineButton.addEventListener("click", () => {
    // Add your logic for declining the pickup here
    window.location.href = "declination.html";
});
</script>
</body>
</html>
