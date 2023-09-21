<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Combined HTML</title>
</head>
<body>
    <?php
    // Function to include and display an HTML component
    function includeComponent($filename) {
        ob_start(); // Start output buffering
        include($filename); // Include the HTML component
        $content = ob_get_clean(); // Get the buffered content
        echo $content; // Display the content
    }

    // Include the header component
    includeComponent('index.html');
    ?>

    <div id="content">
        <?php
        // Include the content component
        includeComponent('../Components/index.html');
        ?>
    </div>

    <?php
    // Include the footer component
    //includeComponent('footer.html');
    ?>
</body>
</html>
