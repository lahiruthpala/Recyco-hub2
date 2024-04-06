<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pickup Order</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/css/pickuprequeststyle.css">
</head>

<body>
    <!-- <img src="images/pickup background.jpg"> -->
    <h2>Pickup Order Request</h2>

    <form class="container" id="Request" method="POST">
        <div class="column1">
            <label for="waste_type">Select Item:</label>
            <select id="waste_type" name="waste_type" required>
                <option value="" disabled selected>Select an item</option>
                <option value="plastic">plastic</option>
                <option value="glass">glass</option> 2</option>
                <option value="polythene">polythene</option>
            </select>

            <label for="weight">Quantity:</label>
            <input type="number" id="weight" name="weight" placeholder="Enter quantity" required>
            <input type="text" value="" id="latitude" name="latitude" hidden>
            <input type="text" value="" id="longitude" name="longitude" hidden>

            <label for="Collection_Date">Pickup Date:</label>
            <input type="date" id="Collection_Date" name="Collection_Date" required>

            <label for="pickup_address">Address:</label>
            <input type="text" id="pickup_address" name="pickup_address" required>

            <label for="Note">Address:</label>
            <input type="text" id="Note" name="Note" required>
        </div>
        <div id="map" style="height: 500px"></div>
        <div class="submitbutton">
            <button id="pickupbutton" type="submit">Submit Pickup Request</button>
            <button>Cancel</button>
        </div>
    </form>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyn3Iymp1NpFUBho-3HfzzMrnJSLKaqgA"></script>
    <script type="text/javascript" src="<?= ROOT ?>/js/gmap.js"></script>
</body>

</html>