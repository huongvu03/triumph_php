<?php


        if(!isset($_SESSION["admin"])) {
            header('Location: login.php?error=dang-nhap-di-ban-ei');
        } 
         
       else {
            $welcomename=$_SESSION["admin"];
            echo"Hi,$welcomename" ;
            
        }
    
?>  
    <a href="logout.php" class="btn btn-warning">
        Logout
    </a>