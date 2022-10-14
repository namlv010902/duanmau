<?php 
  include "../model/connect.php";
  $id=$_GET["id"];
  $query= "DELETE FROM users where id like n'$id'";
  connect($query);
  header("location: ../view/user.php");
?>