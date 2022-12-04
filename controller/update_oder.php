<?php
  include "../model/connect.php";
  $id = $_GET["id"];
  $id_prd = $_GET["idsp"];
  $type = $_GET["type"];
  $phi_van_chuyen = 10;
  $query = "SELECT * FROM oder_detail where id_oder = $id && id_product = $id_prd";
  $oder_detail = getOne($query);
  $query2 = "SELECT * FROM oder where id = $id";
  $oder = getOne($query2);
  if($type === "decre"){
      if($oder_detail["quantity"]>1){       
        $quantity = $oder_detail["quantity"]-1;
        $query = "UPDATE oder_detail SET quantity = $quantity where id_oder = $id && id_product = $id_prd ";
        connect($query);
        $total_prd = $oder["total_product"] - $oder_detail["price"];
        $total = $total_prd + $phi_van_chuyen;
        $query2 = "UPDATE oder SET total_product = $total_prd, total=$total where id = $id ";
        connect($query2);

      }else{
        $quantity = $oder_detail["quantity"]-1;
        $query = "UPDATE oder_detail SET quantity = $quantity where id_oder = $id && id_product = $id_prd ";
        connect($query);
        $total_prd = $oder["total_product"] - $oder_detail["price"];
        $total = $total_prd + $phi_van_chuyen;
        $query2 = "UPDATE oder SET total_product = $total_prd, total=$total where id = $id ";
        connect($query2);
        $query = "DELETE FROM oder_detail where id_oder = $id && id_product = $id_prd ";
        connect($query);
      }
  }else{
       

         $quantity = $oder_detail["quantity"]+1;
        $query = "UPDATE oder_detail SET quantity = $quantity where id_oder = $id && id_product = $id_prd ";
        connect($query);
        $total_prd = $oder["total_product"] + $oder_detail["price"];
        $total = $total_prd + $phi_van_chuyen;
        $query2 = "UPDATE oder SET total_product = $total_prd, total=$total where id = $id ";
        connect($query2);
        }
  
  header("location:../view/oder_detal.php?id=$id");


?>