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
        <h1>Order</h1>
        <form action="process-product-order.php" method="post">
        <input type="hidden" name="proId" value="<?=$_GET["Id"]?>"/>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="name">
            <small class="form-text text-muted text-danger"></small>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input class="form-control" name="address">
            <small class="form-text text-muted text-danger"></small>
        </div>
        <div class="form-group">
            <label>PhoneNumber</label>
            <input  class="form-control" name="phone" >
            <small class="form-text text-muted text-danger"></small>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input  class="form-control" name="email" >
            <small class="form-text text-muted text-danger"></small>
        </div>
        <button type="submit" class="btn btn-primary">Order</button>
    </form>
    </div>
    
</body>
</html>