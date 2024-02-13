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
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <h4 style="color:red">
        <?= isset($error)?$error:"" ?>
    </h4>
    <form action="loginProcess.php" method="post">
        <p>username: <input type="text" name="username"></p>
        <p>password: <input type="password" name="password"></p>
        <p><input type="submit" value="login"></p>
    </form>
</body>
</html>