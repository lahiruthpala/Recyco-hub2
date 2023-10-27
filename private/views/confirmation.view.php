<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accepted</title>
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

        .accepted-message {
            background-color: white; /* White background color for the tile */
            color: black; /* Black text color */
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 300px; /* Set a fixed width */
            height: 200px; /* Set a fixed height */
        }

        .tick-circle {
            background-color: #04AA6D; /* Green color for the circle */
            width: 100px;
            height: 100px;
            border-radius: 50%; /* Makes it a circle */
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px; /* Spacing between the circle and text */
        }

        .tick-mark {
            font-size: 48px;
            color: white; /* White color for the checkmark */
            stroke-dasharray: 100;
            stroke-dashoffset: 100;
            animation: drawCheckmark 1.5s ease forwards;
        }

        p {
            font-size: 24px;
        }

        /* Define the drawCheckmark animation */
        @keyframes drawCheckmark {
            0% {
                stroke-dashoffset: 100;
            }
            100% {
                stroke-dashoffset: 0;
            }
        }
    </style>
</head>
<body>
    <div class="accepted-message">
        <div class="tick-circle">
            <svg class="tick-mark" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"><path d="M4 38l17 17 40-40" fill="none" stroke="currentColor" stroke-width="8"/></svg>
        </div>
        <p>Pickup </p>
    </div>
</body>
</html>
