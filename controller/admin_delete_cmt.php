<?php
    session_start();
    include "../model/connect.php";
    $id= $_GET["id"];
    $idSP = $_SESSION["idSP"];
    $query= "DELETE FROM binhluan where id=$id";
    connect($query);
    header("location:../view/detail_cmt.php?id=$idSP");

?>