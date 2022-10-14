<?php
    include "../model/connect.php";
    $id=$_POST["id"];
    $categoryName = $_POST["cateName"];
    $query= "UPDATE category SET categoryName = '$categoryName' where id=$id ";
    connect($query);
    header("location:../view/category.php");

?>