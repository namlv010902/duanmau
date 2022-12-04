<?php
   include "../model/connect.php";
   session_start();
   if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    if(!empty($_SESSION["cart"])){
    $cart = $_SESSION["cart"];
   
}}
   $ten = $_POST["ten"];
   $sdt = $_POST["sdt"];
    $diachi = $_POST["diachi"];
     $pay = $_POST["pay"];
     $satus = $_POST["status"];
     
 $query5 = "INSERT INTO oder(name,adress,phone,pay,status,total,id_user) values('$ten', '$diachi', '$sdt','$pay','$satus','$count_money','$id')";
 connect($query5);
 echo "Thêm thành công";
 if (!empty($query5)) {
     
    $sql = "SELECT * from oder where name like n'$ten' "  ;
      $order = getOne($sql);
     $id_oder = $order["id"];
     
    foreach ($cart as $value) {
        
        $query6 = "INSERT INTO oder_detail(id_oder,id_product,quantity) values('$id_oder', '$value[id]', '$value[quantity]')";
        connect($query6);
        unset($_SESSION["cart"]);
     
    }
    header("location:../view/thongbaodh.php");

}
?>