<!-- lay thong tin san pham ra truoc -->
<?php
    if(isset($_GET["proId"])){
        $id=$_GET["proId"];
       
        $conn = mysqli_connect("localhost", "root", "", "triumph_php");

        if(!$conn){
            die("error connect db");
        }

    $query = "select * from product where proId='$id'  "; 

    $result = mysqli_query($conn, $query);
 

        $pro = mysqli_fetch_array($result);
  
    mysqli_close($conn);

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

          <h1>Update Product List</h1>

    <form action="process-product-update.php" method="post" enctype="multipart/form-data">
    <div class="form-group" hidden>
        <label>Id</label>
        <input class="form-control" name="id" value="<?=$pro["proId"]?>"  />
        <small class="form-text text-muted text-danger"></small>
    </div>
        
    <div class="form-group">
        <label>Name</label>
        <input class="form-control" name="name" value="<?=$pro["proName"]?>">
        <small class="form-text text-muted text-danger"></small>
    </div>
    <div class="form-group">
        <label>Price</label>
        <input class="form-control" name="price" value="<?=$pro["proPrice"]?>">
        <small class="form-text text-muted text-danger"></small>
    </div>
   <div class="form-group">
        <label>Quantity</label>
        <input class="form-control" name="quantity" value="<?=$pro["proQuantity"]?>">
        <small class="form-text text-muted text-danger"></small>
    </div> 
    <div class="form-group">
        <label>Image</label>
        <img src="<?=$pro["proImg"]?>" alt="" width="100" height="100">
        
        <input class="form-control"  name="image" type="file" accept="image/*" value="<?=$pro["proImg"]?>" width="100" height="100"></img>
        <small class="form-text text-muted text-danger"></small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
 
    
</body>
</html>