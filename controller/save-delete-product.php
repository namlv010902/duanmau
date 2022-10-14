<?php
    include "../model/connect.php";
    $id = $_GET["id"];
    $query = "DELETE FROM products WHERE id=$id";
    connect($query);
    header("location:../admin.php");
?>