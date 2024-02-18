<?php
session_start();
$userId=$_SESSION["userId"];
if(isset($_POST["proId"])){
    $proId = $_POST["proId"];
    $cartQuantity = $_POST["cartQuantity"];
    
}
    $conn = mysqli_connect("localhost","root","","triumph_php");
    if(!$conn){
        die("error connect db");
    }
    // kiểm tra xem bảng Cart có userId và productId ko
    $checkQuery = "SELECT * FROM cart WHERE userId = $userId AND proId = $proId";
    $checkResult = mysqli_query($conn, $checkQuery);
    
    //nếu có thì update quantity của nó +1
    if (mysqli_num_rows($checkResult) > 0) {
        
        $updateQuery = "UPDATE cart SET cartQuantity = cartQuantity + $cartQuantity WHERE userId = $userId AND proId = $proId";
        $updateResult = mysqli_query($conn, $updateQuery);
    
    } else {
    // nếu ko có thì insert record mới vào cart
    $insertQuery = "INSERT INTO cart (userId, proId, cartQuantity) VALUES ($userId, $proId, $cartQuantity)";
    $insertResult = mysqli_query($conn, $insertQuery);
    }
    
    mysqli_close($conn);
    header("Location: productDetail.php?proId= $proId ");
?>