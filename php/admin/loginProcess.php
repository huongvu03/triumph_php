<?php
    session_start();
    if(isset($_POST)&& !empty($_POST)){
    $username = $_POST["username"];
    $password = $_POST["password"];
        // echo $username.$password;
        $conn = mysqli_connect("localhost","root","","triumph_php");
        if(!$conn){
            die("error connect db");
        }
        $query ="select * from admin where adName = '$username' and password = '$password'";
        $result = mysqli_query($conn,$query);
        
        $admin = mysqli_fetch_array($result);
        if($admin == null){
            //dang nhap sai
            header('Location: login.php?error=login-fail');
        }else{
            $_SESSION["admin"]= $admin["adName"];
            header('Location: productList.php');
        }
    }
    mysqli_close($conn);
?>