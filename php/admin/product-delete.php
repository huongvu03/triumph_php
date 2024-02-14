
<?php
    if(isset($_POST["proId"])){
        $id=$_POST["proId"];
   
    $conn= mysqli_connect("localhost","root","","triumph_php");
    if(!$conn){
        die("error connect db");
    }
    $query = "delete from product where proId='$id' "; 
    $result = mysqli_query($conn, $query);
    // var_dump($result);
    mysqli_close($conn);
  
    if($result == false){
        die("cannot delete product");
    }else{
        // echo"tui echo";
         header("Location:productList.php");
    }
}


?>