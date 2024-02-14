<?php
     if(isset($_POST) && !empty($_POST)){
        $name = $_POST["name"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];

        $id = $_POST["id"];
        $image_file=$_FILES["image"];

        $image_name="";

    //ktra co thay doi hinh    
    if ($image_file["tmp_name"] != ""){//ktra co de xu ly
        //xu ly image = dat ten
        $image_name=bin2hex(random_bytes(4))."-".$image_file["name"];

        move_uploaded_file(
            $image_file["tmp_name"],__DIR__."/images/".$image_name
        );
           
        $query = "update product set proName = '$name', proPrice = $price, proImg='images/$image_name'
                    where proId = $id";

    }else{
      
        $query = "update product set proName = '$name', proPrice = $price
                    where proId = $id";

    }

    $conn = mysqli_connect("localhost", "root", "", "triumph_php");

    if(!$conn){
        die("error connect db");
    }
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);

    if($result==true){
        //thanh cong
        header("Location: productList.php");
    }else{
        die("error update product");
    }
 


}

