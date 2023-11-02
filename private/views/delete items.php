<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $servername="localhost";
    $username="root";
    $password="";
    $database="Recyco-HUB";
                //create connection
    $connection = new mysqli($servername,$username,$password,$database);
    $sql="DELETE FROM clients WHERE id=$id";
    $connection->query($sql);
}
header("location:/Recyco-HUB/reg_list.view.php");
exit;



?>