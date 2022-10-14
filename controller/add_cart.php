<?php
    include "../model/connect.php"; //import file connect.php từ thư mục model
    session_start();
    $idPerson = $_SESSION["id"];
    $idItem = $_GET["id"];
    $query = "select * from cart where ma_kh like n'$idPerson' AND ma_sp = $idItem";
    $cartItem = getOne($query);
    if(empty($cartItem)) {
        $count = $_POST["so_luong"];
        $query = "insert into cart(ma_kh,ma_sp,so_luong) values ('$idPerson', $idItem, $count);";
        connect($query);
    } else {
        $count = $_POST["so_luong"] + $cartItem["so_luong"];
        $query = "update cart set so_luong = $count where ma_kh like n'$idPerson' AND ma_sp=$idItem";
        connect($query);
    }

    header("location:../detail.php?id=$idItem"); 
?>

