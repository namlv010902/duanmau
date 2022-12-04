<?php
 include "../model/connect.php";
 $id = $_GET["id"];
 $status = $_POST["status"];
 $query = "UPDATE oder SET status = $status where id=$id";
 connect($query);
 header("location:../view/oder_detal.php?id=$id");


?>