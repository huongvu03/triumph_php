<?php


        if(!isset($_SESSION["userName"])) {
            header('Location: login.php?error=dang-nhap-di-ban-ei');
        } 
         
       else {
            $welcomename=$_SESSION["userName"];
            echo"Hi,$welcomename" ;
            
        }
    
?>  
    <a href="logout.php" class="btn btn-warning">
        Logout
    </a>