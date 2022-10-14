<?php 
include "../model/connect.php";
  $id=$_GET["id"];
  $query= "DELETE  FROM products where categoryId=$id";
  connect($query);
  $query= "DELETE  FROM category where id=$id";
  connect($query);
  header("location: ../view/category.php");
?>