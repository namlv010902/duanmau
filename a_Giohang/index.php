<?php
    include "../model/connect.php";
    $query = "SELECT * FROM products where categoryId=3";
    $product = getAll($query);




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">

    <title> Gio hang</title>
</head>
<style>
    .container{
        width: 1440px;
        margin: 0 auto;
    }
    .product{
        display: grid;
        grid-template-columns: repeat(4,1fr);
        grid-gap: 40px;
    }
    .colum img{
        width: 100%;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
<body>
    <div class="container">
        <a href="./view_cart.php">Gio hàng</a>

         <button>Submit</button>
    <div class="product">
        <?php foreach($product as $value):?>
        <div class="colum">      
            <img src="<?php echo $value["image"]?>" alt="">
            <h3><?php echo $value["productName"]?></h3>
            <p>Gia: <?php echo $value["productPrice"]?></p>
            
            <form action="./cart.php?id=<?php echo $value["id"]?>" method="post">
            <input hidden type="file" value="<?php echo $value["image"]?>">
            <input hidden type="text" value="<?php echo $value["productName"]?>">
            <input hidden type="text" value="<?php echo $value["productPrice"]?>">
           <a href=""> <button id="button" type="submit">Mua hàng</button></a>
           </form>
        </div>
        <?php endforeach?>
    </div>
    </div>
</body>
<script>
        
        
    
     
</script>
</html>