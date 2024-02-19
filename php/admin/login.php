<?php
    if(isset($_GET["error"])){
        $error = $_GET["error"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">  
    <title>Document</title>
</head>
<body>
<div class="login" >
    <form action="loginProcess.php" method="post">
    <h1>Login</h1>
    <h4 style="color:red">
        <?= isset($error)?$error:"" ?>
    </h4>
    <form action="loginProcess.php" method="post">
        <p>Username: <input type="text" name="username"></p>
        <p>Password: <input type="password" name="password"></p>
        <p><input type="submit" value="LOG IN" class="btn btn-primary"></p>
    </form>
</div>

</body>
</html>