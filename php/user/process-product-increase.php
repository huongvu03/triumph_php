<?php
session_start();
$userId=$_SESSION["userId"];
if(isset($_GET["proId"])){
    $proId = $_GET["proId"];
}
$conn = mysqli_connect("localhost","root","","triumph_php");
if(!$conn){
    die("error connect db");
}
// kiểm tra xem bảng Cart có productId ko
$checkQuery = "SELECT * FROM cart WHERE proId = $proId";
$checkResult = mysqli_query($conn, $checkQuery);

//nếu có thì update quantity của nó +1
if (mysqli_num_rows($checkResult) > 0) {
    
    $updateQuery = "UPDATE cart SET cartQuantity = cartQuantity + 1 WHERE proId = $proId";
    $updateResult = mysqli_query($conn, $updateQuery);

}
mysqli_close($conn);
header("Location: cart.php");
?>