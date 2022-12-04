<?php
     include "../model/connect.php";
     session_start();
     $id = $_GET["id"];
     $query = "DELETE FROM cart where id_cart=$id";
     connect($query);
     header("location:../view/view-cart.php");
?>
