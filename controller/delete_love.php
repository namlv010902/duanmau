<?php
   include "../model/connect.php";
   session_start();
   $id = $_GET["id"];
   $id_user = $_SESSION["id"];
   $query = "DELETE FROM love where id_product= $id and id_user like n'$id_user'";
   connect($query);
   header("location:../index.php");


?>