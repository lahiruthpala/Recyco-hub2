
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">"
</head>
<body>
    <div class="container-my-5">
        <h2>Listing</h2>
        <a class="btn btn-primary" href="/Recyco-HUB/create.php" role="button">New item</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Type of waste</th>
                    <th>Quantity</th>
                    <th>Collection date</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername="localhost";
                $username="root";
                $password="";
                $database="Recyco-HUB";
                //create connection
                $connection = new mysqli($servername,$username,$password,$database);
                //check connection
                if($connection->connect_error){
                    die("connection failed" . $connection->connect_error)
                }
                //read all rows in database table
                $sql = "SELECT * FROM clients"
                $result = $connection->query($sql);
                if(!$result){
                    die("Invalid query: ". $connection->error);
                }
                //read data of each row
                while ($row = $result->fetch_assoc()){
                    echo"
                    <tr>
                        <td>$row[type] </td>
                        <td>$row[quantity]</td>
                        <td>$row[date]</td>
                        <td>$row[place]</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/Recyco-HUB/edit items.php">Edit</a>
                            <a class="btn btn-danger btn-sm" href="/Recyco-HUB/delete items.php">Delete</a>
                        </td>
                    </tr>";
                }

                ?>
                
            </tbody>
        </table>
    </div>
    
</body>
</html>