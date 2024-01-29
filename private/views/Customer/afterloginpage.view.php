<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recyco-Hub</title>
    <!-- <link rel="stylesheet" type="text/css" href="styleafterlogin.css"> -->
<<<<<<< Updated upstream
    
    <link rel="stylesheet" href="<?= ROOT ?>/css/styleafterlogin.css">

=======
    <link rel="stylesheet" href="<?= ROOT ?>/css/styleafterlogin.css">
>>>>>>> Stashed changes
</head>
<body>    
    <div class="button-container">
        <button onclick="buttonClicked(1)">Set pickup</button>
        <button onclick="buttonClicked(2)">Sorted items</button>
    <!-- <button onclick="buttonClicked(3)"></button> -->
    </div>
    <script>
        function buttonClicked(buttonNumber) {
<<<<<<< Updated upstream
            var newPageUrl = "http://localhost:8380/Recyco-hub2/private/views/Customer/pickup%20request.html"
            window.location.href = newPageUrl;
=======
            var newPageUrl = "http://localhost:5500/private/views/Customer/pickup request.html" 
            window.location.href = newPageUrl;
            
>>>>>>> Stashed changes
        }
    </script>

</body> 
</html>
