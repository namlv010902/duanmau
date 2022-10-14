<?php 
    include "../model/connect.php";
    session_start();

    $idItem = $_GET["id"];
    $timeComment = date("Y/m/d");
    $idP = $_SESSION["id"];
    $title = $_POST["cmt"];
   
    
    $query = "insert into binhluan(noidung, maSP, maKH,thoiGianBL) values ('$title', $idItem,'$idP', '$timeComment')";
    connect($query);

    header("location: ../detail.php?id=$idItem");

?>