<?php
     include "../model/connect.php";
     $id = $_POST["id"];
     $query = "SELECT * FROM products where id=$id";
     $products= getOne($query);
     $red = $_POST["color_red"];
     $white = $_POST["color_white"];
     $black = $_POST["color_black"];
     $green = $_POST["color_green"];
     $name=$_POST["names"];
     $image=$_FILES["images"]["name"];
     $price = $_POST["price"];
     $sale_off = $_POST["sale_off"];      
     $category=$_POST["categoryId"];
     $desc = $_POST["desc"];
    
     if(empty($_FILES["images"]["name"])){
        $image = $products["image"];
     }else{
        $image ='./src/images/'.$_FILES["images"]["name"];
     }
     
     $query="UPDATE products SET color_white ='$white', color_black ='$green',color_red = '$red',color_green = '$green',
      image ='$image',productName='$name',productPrice='$price',sale_off='$sale_off',categoryId='$category',productDesc='$desc' where id=$id";
     connect($query);
     move_uploaded_file($_FILES["images"]["tmp_name"],"../src/images/".$_FILES["images"]["name"]);
     header("location:../product.php");
?>