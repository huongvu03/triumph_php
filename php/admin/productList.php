<!-- list product -->
<?php


session_start();

// cach 2
$queryName = $sort = "";

if (isset($_GET["sname"])) {
    $queryName = " and proName like '%" . $_GET["sname"] . "%'  ";
}

if (isset($_GET["desc"])) {
    $sort = " order by proPrice desc ";
}

if (isset($_GET["asc"])) {
    $sort = " order by proPrice asc ";
}


$conn = mysqli_connect("localhost", "root", "", "triumph_php");
if (!$conn) {
    die("error connect db");
}

$query = "select * from product where 1 $queryName $sort ";
//where 1=where true-> dung khi sort search

$result = mysqli_query($conn, $query);

$product = array();

while ($row = mysqli_fetch_array($result)) {
    $product[] = $row;
}
mysqli_close($conn);


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/css/item.css">
    <link rel="stylesheet" href="../../src/css/itemlist.css">
    <link rel="stylesheet" href="../css/productList.css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Document</title>
</head>

<body>
<div class="productList-admin">
    <?php
    include("header.php");
    ?>
    <a href="addproduct.php">
        <button class="btn btn-success">Add Product</button>
    </a>
 </div>

<nav class="navbar" style="background-color: black;">
  <!-- Navbar content -->
   
    <a href="productList.php">
       PRODUCT
    </a>
    <a href="orderlist.php">
       ORDER
    </a>
   
        <form action="" class="productList-searchbar">
        <input type="text" name="sname" class="searchbar"> <input type="submit" value="Search">
    </form>
   

</nav>
   
    <h1 style="text-align: center;">PRODUCT LIST</h1>
   
    <h4>
        <?= isset($error) ? $error : "" ?>
    </h4>


    <?php
    if (count($product) == 0) {
        echo '<h3>No records</h3>';
    } else {
    ?>

        <div class='sortlist'>

            <div style>Sort by</div>
            <div>
                <form action="">
                    <input type="submit" name="desc" value="Sort Price Descending">

                    <input type="submit" name="asc" value="Sort Price Ascending">
                </form>
            </div>
        </div>
        <div class='classiclist'>
            <div class='classicrightlist'>
                <ul>

                    <?php
                    foreach ($product as $pro) {
                    ?>
                        <li>
                            <div class='item'>
                                <div class='iteminfor'>
                                    <!-- <td><?= $pro["proId"] ?></td> -->



                                    <div class='irow1'>

                                        <img class="rowimg" src="<?= $pro["proImg"] ?>" alt="" width="100" height="100"> </td>
                                    </div>
                                    <div class='irow2'>
                                        <div class='name'> <?= $pro["proName"] ?></div>
                                        <div class='price'>
                                            <p>From $<?= $pro["proPrice"] ?></p>
                                        </div>
                                        <div class='quantity'>Quantity:<?= $pro["proQuantity"] ?></div>

                                    </div>
                                </div>


                                <div class='button'>
                                    <div class='btn btn-danger' onClick="handleDelete(<?= $pro['proId'] ?>)">Delete</div>
                                    <div class='btn btn-info'><a href="product-update.php?proId=<?= $pro["proId"] ?>">Update </a></div>
                                </div>


                            </div>

                        </li>
                    <?php
                    }
                    ?>

                </ul>

            </div>

        </div>

    <?php
    }
    ?>




</body>
<script>
    function handleDelete(id) {
        //test function
        // alert("dang xoa nha");
        var option = confirm("Do you want to delete this product?");

        if (!option) { //option==false
            return; //dung ham
        }
        // console.log(id);
        $.post('product-delete.php', { //gui lenh di trang can xu ly
            'proId': id
        }, function(data) {
            //data=nhan thong tin tu trang product-delete
            console.log(data);

            // refesh lai trang
            location.reload();


        });
    }
</script>

</html>