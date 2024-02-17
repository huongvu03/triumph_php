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
    <!-- <link rel="stylesheet" href="css/item.css"> -->
    <link rel="stylesheet" href="../../src/css/itemlist.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Document</title>
</head>

<body>
   
  
    <h1>Product List</h1>
    <a href="cart.php" class="btn btn-success">
        Cart
    </a>
    <form action="">
        Name: <input type="text" name="sname"> <input type="submit" value="Search">
    </form>
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
            <ItemSearch searchValue={seachValue} onSearch={handleSearch} />
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
                                    <!-- Chi da sua duong link dan hinh -->
                                        <img class="rowimg" src="../admin/<?= $pro["proImg"] ?>" alt="" width="100" height="100"> </td>
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
                                    <div class='btn btn-info'><a href="process-product-add.php?proId=<?= $pro["proId"] ?>">Add to cart </a></div>
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


</html>