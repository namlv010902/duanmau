<?php 
  include "../model/connect.php";
  $id=$_GET["id"];
  $query= "DELETE FROM binhluan where maKH like n'$id'";
  connect($query);
  $query= "DELETE FROM cart where ma_kh like n'$id'";
  connect($query);
  $query= "DELETE FROM users where id like n'$id'";
  connect($query);
  header("location: ../view/user.php");
?>