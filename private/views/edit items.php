<?php
    $id="";
    $type="";
    $quantity="";
    $date="";
    $place="";

    $errormessage="";
    $successmessage="";

    if ($_SERVER['REQUEST_METHOD']=='GET'){
        if(!isset($_GET["id"])){
            header("location:/Recyco-HUB/reg_list.view.php");
            exit;
        }
        $id= $_GET["id"];
        //read the row of the selected client from database
        $sql="SELECT * FROM clients WHERE id=$id";
        $result = $connection->query($sql)
        $row = $result->fetch_assoc();

        if(!$row){
            header("location:/Recyco-HUB/reg_list.view.php");
            exit; 
        }
        $type=$row["type"];
        $quantity=$row["quantity"];
        $date=$row["date"];
        $place=$row["place"];

    }
    else{
        //post method: update the data of the client
        $id=$_POST["id"];
        $type=$_POST["type"];
        $quantity=$_POST["quantity"];
        $date=$_POST["date"];
        $place=$_POST["place"];

        do{
            if(empty($type)||empty($quantity)||empty($date)||empty($place)){
                $errormessage="All the fields are required";
                break;
            }
            $sql ="UPDATE clients".
                    "SET type='$type',quantity='$quantity',date='$date',place='$place'".
                    "WHERE id =$id";
            $result=$connection->query($sql)
            if(!$result){
                $errormessage="Invalid query: ". $connection->error;
                break;
            }
            $successmessage = "Item updated correctly"
            header("location:/Recyco-HUB/reg_ist.view.php");
            exit;
        }while(false);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>"></script>
</head>
<body>
    <div class="container-my-5">
        <h2>New item</h2>
        <?php
        if(!empty($errormessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role ='alert'>
            <strong>$errormessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' area-lable='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
            <input type="hidden" name="id" value = "<?php echo $id;?>">
            <div class="row-mb-3">
                <label class="col-sm-3 col-form-label">type</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $type; ?>">
                </div>
            </div>
            <div class="row-mb-3">
                <label class="col-sm-3 col-form-label">quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="quantity" value="<?php echo $quantity; ?>">
                </div>
            </div>
            <div class="row-mb-3">
                <label class="col-sm-3 col-form-label">date</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $date; ?>">
                </div>
            </div>
            <div class="row-mb-3">
                <label class="col-sm-3 col-form-label">place</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="place" value="<?php echo $place; ?>">
                </div>
            </div>
            <?php
            if(!empty( $successmessage)){
                echo "
                <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-6'>
                <div class='alert alert-success alert-dismissible fade show' role ='alert'>
                <strong>$successmessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' area-lable='Close'></button>
                </div>"
            }
            ?>
            <div class="row-mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary" >Submit</button>
                </div>
                <div class="col-sm-3 d-grid" >
                    <a class="btn btn-outline-primary" href="/Recyco-HUB/reg_list.view.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    
</body>
</html>