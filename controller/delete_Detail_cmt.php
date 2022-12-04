<?php
    include "../model/connect.php";
    session_start();
    $idSP = $_SESSION["idSP"];
    $id= $_GET["id"];
    $query = "DELETE FROM binhluan where id = $id";
    connect($query);
    header("location:../detail.php?id=$idSP");


?>