<?php
    session_start();

    $conn = mysqli_connect("localhost","root","","triumph_php");
    if(!$conn){
        die("error connect db");
    }
    $query = "select * from product";
    $result = mysqli_query($conn,$query);
    $productList = array();
    while($row = mysqli_fetch_array($result)){
        $productList[]=$row;
    }
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Document</title>

</head>
<body>
    <?php
        // if(!isset($_SESSION["admin"])){
        //     header("Location: login.php");
        // }
    ?>
    <?php
        // include("header.php");
    ?>
    <!-- <a href="Logout.php" class="btn btn-warning">
        Logout
    </a> -->
    <div class="container">
        <h1>Product List</h1>
        <a href="product-create.php">
            <button class="btn btn-success">Add Product</button>
        </a>
        <?php
            if(count($productList)==0){
                echo '<h3>No records</h3>';
            } else{
        ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($productList as $pro){
            ?>
                <tr>
                    <td><?=$pro["proId"]?></td>
                    <td><?=$pro["proName"]?></td>
                    <td><?=$pro["proImg"]?></td>
                    <td><?=$pro["proQuantity"]?></td>
                    <td><?=$pro["proPrice"]?></td>
                    <td>
                        <a href="product-update.php?id=<?=$pro["id"]?>" class="btn btn-info">Update</a>
                        <a href="product-delete.php?id=<?=$pro["id"]?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php
            }?>
            </tbody>
        </table>
        <?php
            }?>
    </div>
</body>
</html>