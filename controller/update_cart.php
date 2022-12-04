<?php
    session_start();
    include "../model/connect.php";
    $id= $_GET["id"];
    $type = $_GET["type"];
    $query =  "SELECT * FROM products where id = $id";
    $products = getOne($query);
    $alert="";
    if($type === "decre"){
        if($_SESSION["cart"][$id]["quantity"]>1){       
             
            $_SESSION["cart"][$id]["quantity"]--;
        }else{
            unset($_SESSION["cart"][$id]);
        }
    }else{
    // print_r($_SESSION["cart"][$id]["quantity"]);
         if( $_SESSION["cart"][$id]["quantity"] >= $products["quantity"]){
             $_SESSION["cart"][$id]["quantity"] = $products["quantity"];
             $alert ="Tối đa";
           
         }else{

        $_SESSION["cart"][$id]["quantity"]++;
         }
    }
    header("location: ../view/view-cart.php?id=$alert")

?>
