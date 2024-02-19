<?php
//   session_start();
//   $userId=$_SESSION["userId"];
//   $userId=$_SESSION["userId"];

// if(isset($_GET["total"])){
//     $cartTotal=$_GET["total"];

// }
//  var_dump($cartTotal);
    $conn= mysqli_connect("localhost","root","","triumph_php");
    if(!$conn){
        die("error connect db");
    }

    $query = "SELECT  product.proImg ,product.proName, cart.cartQuantity,
    cart.cartId, user.userName, product.proPrice
   FROM cart
   JOIN product ON cart.proId = product.proId
   Join user on user.userId=cart.userId
   WHERE cart.userId = user.userId";

    
            
    $result= mysqli_query($conn,$query);
    $orderList=array();
    while($row=mysqli_fetch_array($result)){
        $orderList[]=$row;
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


  
        <h1>Order List</h1>
        <a href="productList.php" class="btn btn-success">
        Product
    </a>
        <?php
            if(count($orderList)==0){
                echo "<h3>No records</h3>";
            }else{
        ?>
        <table class="table table-hover table-dark">
            <thead>
            <tr>  
                <th>CartId</th>
                <th>UserName</th>
                <th>Product</th>
                <th>Product Name</th>

                <th>Quantity</th>
                <th>Product Price</th>

                <th>Cart Total</th>

                <th>Action</th>
            </tr>
            </thead>
           <tbody>
            <?php
            $subTotal=0;
            $total=0;
        
               foreach($orderList as $list){
            ?>
            <tr> 
                
                <td><?=$list["cartId"]?></td>
                <td><?=$list["userName"]?></td>

                <td><img src="../admin/<?=$list["proImg"]?>" alt="" width="100px" height="100px" ></td>
                <td><?=$list["proName"]?></td>
                <td><?=$list["cartQuantity"]?></td>
                <td><?=$list["proPrice"]?></td>
                <td><?= $subTotal=($list["cartQuantity"]*$list["proPrice"])?></td>

                
                <!-- <td>
                <a href="orderList-update.php?cartId=<?=$list["cartId"]?>" class="btn btn-danger">Update</a>
                <a href="orderList-delete.php?cartId=<?=$list["cartId"]?>" class="btn btn-danger" >Delete</a>
                </td> -->
            </tr>
        <?php  
            $total += $subTotal;
         }
        ?>
        </tbody>
<?php ?>
        </table>
       
        
    <?php

    }
    ?>
    
    </div>
    <h1>Total: <?=$total?> </h1>

    
</body>
</html>
