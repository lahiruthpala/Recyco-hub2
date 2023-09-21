<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Content Update</title>
</head>
<body>
    <?php include('index.html'); ?>
    
    <h1>Main Content</h1>

    <div id="dynamicContent">
        <?php include('/../Components/index.html'); ?>
    </div>
    
    <script>
        // Function to load dynamic content
        function loadDynamicContent() {
            fetch('dynamic-content.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('dynamicContent').innerHTML = data;
                });
        }

        // Call the function initially to load the content
        loadDynamicContent();
    </script>
</body>
</html>
