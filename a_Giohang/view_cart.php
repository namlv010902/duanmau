<?php
    
      session_start();
    //   unset( $_SESSION["cart"]);
      $cart = $_SESSION["cart"];
      $count_money=0;
    
    ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<style>
         a{
            text-decoration: none;
            font-size: 30px;
           
         }
         #err{
            color: red;
            font-size: 20px;
         }
        
</style>
<body>
    <a href="./index.php">Sản phẩm</a>
    <?php 
      if(!empty($_SESSION["cart"])){ ?>
    <table border="1">
        <thead>
            <tr>
                <th>ảnh sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>đơn giá</th>
                <th>số lượng</th>
                <th>thành tiền</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           
             <?php foreach($cart as $id => $product):?>              
                <tr>
                   <td><img src="<?php echo $product["image"]?>"></td>
                   <td><?php echo $product["productName"]?></td>
                   <td><?php echo $product["productPrice"]?></td>
                   <td id="update"><a id="delete" href="./update_cart.php?id=<?php echo $id?>&type=decre" >-</a> <?php echo $product["quantity"]?>
                   <a href="./update_cart.php?id=<?php echo $id?>&type=incre">+</a>
                </td>
                   <td><?php $result= $product["productPrice"] * $product["quantity"];  echo $result?></td>
                   <td> <a href="./delete_cart.php?id=<?php echo $id?>">X</a> </td>               
                </tr>
                <?php $count_money = $count_money + $result ?>
                <?php endforeach?>
                <tr>            
                    <th id="tt" colspan="6">Tổng tiền:<?php echo $count_money?></th>
                </tr>
             
            
        </tbody>
    </table>  
    <?php }else{ ?>
                <h1>giỏ hàng trống</h1>
            
            <?php }?>
</body>
       
</html>