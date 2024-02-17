<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if(isset($_POST) && !empty($_POST)){
    $userId = $_POST["userId"];
    $total = $_POST["total"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    
    $conn = mysqli_connect("localhost","root","","triumph_php");
    if(!$conn){
        die("error connect db");
    }
    
    $query = "SELECT product.proName
              FROM cart
              JOIN product ON cart.proId = product.proId
              WHERE cart.userId = $userId";
    
    $result = mysqli_query($conn, $query);
    $cartList = array();
    
    while($row = mysqli_fetch_assoc($result)){
        $cartList[] = $row['proName'];
    }
    
    // mysqli_close($conn);
    
    try{
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mvhoang765218@gmail.com';
        $mail->Password = 'imbp lamh frhm nvfy';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('mvhoang765218@gmail.com', "nguoi gui");
        $mail->addAddress($email, "nguoi nhan");
        $mail->isHTML(true);
        $mail->Subject = "Test Email PHP";
        
        $body = '<!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Order Confirm</title>
                    </head>
                    <body>
                        <h1>Order Confirm</h1>
                        <table>';
        
       
        
        foreach($cartList as $pro){
            $body .= '<tr><td>productName</td><td>'.$pro.'</td></tr>';
        }
        $body .= '<tr><td>Total</td><td>'.$total.'</td></tr>';

        $body .= '<tr><td>Name</td><td>'.$name.'</td></tr>';
        $body .= '<tr><td>Phone number</td><td>'.$phone.'</td></tr>';
        $body .= '<tr><td>Address</td><td>'.$address.'</td></tr>';
        
        $body .= '</table></body></html>';
        
        $mail->Body = $body;
        
        $mail->send();
        //remove cart
        $removeQuery = "DELETE FROM cart WHERE userId = $userId ";
        mysqli_query($conn, $removeQuery);
        mysqli_close($conn);
        
        echo "<script>window.location.href='productList.php?message=Success'</script>";
    } catch(Exception $e){
        echo "<script>window.location.href='productList.php?message=Error'</script>";
    }
}
?>
