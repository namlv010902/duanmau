<?php
     include "../model/connect.php";
     $id = $_POST["id"];
     $query = "SELECT * FROM products where id=$id";
     $products= getOne($query);
     $name=$_POST["names"];
     $image=$_FILES["images"]["name"];
     $price = $_POST["price"];
     $sale_off = $_POST["sale_off"];      
     $category=$_POST["categoryId"];
     $desc = $_POST["desc"];
     $trang_thai= $_POST["trang_thai"];
     if(empty($_FILES["images"]["name"])){
        $image = $products["image"];
     }else{
        $image ='./src/images/'.$_FILES["images"]["name"];
     }
     
     $query="UPDATE products SET image ='$image',productName='$name',productPrice='$price',sale_off='$sale_off',categoryId='$category',productDesc='$desc',dac_biet='$trang_thai' where id=$id";
     connect($query);
     move_uploaded_file($_FILES["images"]["tmp_name"],"../src/images/".$_FILES["images"]["name"]);
     header("location:../admin.php");
?>