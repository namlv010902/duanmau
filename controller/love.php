<?php
 include "../model/connect.php";
 session_start();
 $id_user = $_SESSION["id"];
 $id_prd = $_GET["id"];
  $query = "INSERT INTO love(id_product, id_user) values('$id_prd','$id_user') ";
  connect($query);
  header("location:../index.php");

?>