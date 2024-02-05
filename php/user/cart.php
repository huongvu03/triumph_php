<?php
    session_start();
    $user=$_SESSION["user"];
    $userId=$_SESSION["userId"];
    
    $conn= mysqli_connect("localhost","root","","triumph_php");
    if(!$conn){
        die("error connect db");
    }
    $query = "SELECT product.proId, product.proImg ,product.proName, product.proPrice, cart.cartQuantity 
    FROM cart
    JOIN product ON cart.proId = product.proId
    WHERE cart.userId = $userId";
    
    $result= mysqli_query($conn,$query);
    $cartList=array();
    while($row=mysqli_fetch_array($result)){
        $cartList[]=$row;
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

    <div class="container">
        <h1>Cart List</h1>
        <a href="productList.php" class="btn btn-success">
        Product
    </a>
        <?php
            if(count($cartList)==0){
                echo "<h3>No records</h3>";
            }else{
        ?>
        <table class="table table-hover table-dark">
            <thead>
            <tr>  
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            </thead>
           <tbody>
            <?php
            $subTotal=0;
            $total=0;
        
               foreach($cartList as $pro){
            ?>
            <tr> 
                
                <td><?=$pro["proId"]?></td>
                <td><img src="<?=$pro["proImg"]?>" alt="" width="100px" height="100px" ></td>
                <td><?=$pro["proName"]?></td>
                <td><?=$pro["proPrice"]?></td>
                <td><?=$pro["cartQuantity"]?></td>
                <td><?=$subTotal=($pro["proPrice"]*$pro["cartQuantity"])?></td>
                <td>
                <a href="process-product-increase.php?id=<?=$pro["proId"]?>" class="btn btn-danger">increase</a>
                <a href="process-product-decrease.php?id=<?=$pro["proId"]?>" class="btn btn-danger">decrease</a>
                </td>
            </tr>
        <?php  
            $total += $subTotal;
         }
        ?>
        </tbody>
<?php ?>
        </table>
        <h1>Total: <?=$total?> </h1>
    <?php

    }
    ?>
    
    </div>
    

</body>
</html>