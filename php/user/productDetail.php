<?php
    if(isset($_GET["proId"])){
        $proId= $_GET["proId"];

    $conn = mysqli_connect("localhost","root","","triumph_php");
    if(!$conn){
        die("error connect db");
    }
    $query = "select * from product where proId=$proId";
    $result = mysqli_query($conn,$query);
    if($result != null){
        $product = mysqli_fetch_array($result);
    }else{
        die("cannot get product");
    }
    mysqli_close($conn);
    // var_dump($product);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Document</title>

</head>
<body>
    <div class="container">
        <h1>Product Detail</h1>
        <a href="cart.php" class="btn btn-success">
        Cart
    </a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            
                <tr>
                    <td><?=$product["proId"]?></td>
                    <td><?=$product["proName"]?></td>
                    <td><?=$product["proImg"]?></td>
                    <td><?=$product["proQuantity"]?></td>
                    <td><?=$product["proPrice"]?></td>
                    <td>
                    <form action="productDetailProcess.php" method="post" >
                            <button type="button"  onclick="handleMinus()"class="btn btn-danger">-</button>
                            <input type="text" value="<?=$product["proId"]?>" hidden name="proId">
                            <input id="amount" type="text" value="1" name="cartQuantity">
                            <button type="button" onclick="handlePlus()"class="btn btn-danger">+</button>
                            <button type="submit" class='btn btn-info' >Add to cart</button>
                            </form>

                        

                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
</body>
<script>
    let amountElement = document.getElementById('amount');
    let amount = amountElement.value
    let render =(amount) => {
        amountElement.value = amount
    }
    let handlePlus = () => {
        if(amount < <?=$product["proQuantity"]?>){
            amount++;
        render(amount);
        }

    }
    let handleMinus = () => {
        if(amount >1){
            amount--;
        render(amount);
        }
        
    }
    amountElement.addEventListener('input', ()=>{
        amount =amountElement.value;
        amount = parseInt(amount);
        amount =(isNaN(amount)||amount==0)?1:amount;
        render(amount);
    });

</script>
</html>