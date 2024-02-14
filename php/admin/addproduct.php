<?php
    if(isset($_GET["error"])){
        $error = $_GET["error"];//lay thong tin tren link web
    }
?>

<?php

if ( isset($_POST) && !empty($_POST)){
    $name=$_POST["name"];
    $price=$_POST["price"];
    $quantity=$_POST["quantity"];

    $image_file=$_FILES["image"];

    $image_name="";


    if ($image_file["tmp_name"] != ""){//ktra co de xu ly
        //xu ly image = dat ten
        $image_name=bin2hex(random_bytes(4))."-".$image_file["name"];

        move_uploaded_file(
            $image_file["tmp_name"],__DIR__."/images/".$image_name
        );
    }else{

        header("location:addproduct.php?error=input-info");

    }

    $conn = mysqli_connect("localhost","root","","triumph_php");
    if(!$conn){
       die("error connect db");
   }
   
   $query= "insert into product (proName,proPrice,proImg,proQuantity) values
   ('$name',$price,'images/$image_name',$quantity)";

   $result=mysqli_query($conn,$query);

   if($result==true){
    header("location:productList.php");
   }else{
    die("error create product");
   }

}

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

        <h1>Create New Product</h1>
        <h4 style="color:red">
        <?= isset($error)? $error : "" ?>
    </h4>
        <form action="" method="post" enctype="multipart/form-data">
    
        
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="name">
            <small class="form-text text-muted text-danger"></small>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="price">
            <small class="form-text text-muted text-danger"></small>
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input class="form-control" name="quantity">
            <small class="form-text text-muted text-danger"></small>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input class="form-control"  name="image" type="file" accept="image/*">
            <small class="form-text text-muted text-danger"></small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>