
  <?php
  include "../model/connect.php";
  session_start();
  
  $id = $_GET["id"];
  if(empty($_SESSION["cart"][$id])){
     $query = "SELECT * FROM products where id=$id";
     $product= getOne($query); 
     $_SESSION["cart"][$id]["image"]= $product["image"];
     $_SESSION["cart"][$id]["productName"]= $product["productName"];
     $_SESSION["cart"][$id]["productPrice"]= $product["productPrice"];
     $_SESSION["cart"][$id]["quantity"]= 1;

     $ma_sp=$_POST["id"];
     $query ="INSERT INTO cart(ma_sp) values('$ma_sp')";
     connect($query);
     
    
  }else{
    $_SESSION["cart"][$id]["quantity"]++;

    $ma_sp=$_POST["id"];
    $query ="INSERT INTO cart(ma_sp) values('$ma_sp')";
    connect($query);
  }
 
   header("location:../detail.php?id=$id");

?> 

