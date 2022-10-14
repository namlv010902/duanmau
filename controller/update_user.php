<?php
    include "../model/connect.php";
    session_start();
    $id=$_POST["id"];
    $query = "select * from users where id like n'$id'";
    $user=getOne($query);  
    $code=$_POST["code"];
    $avatar=$_FILES["avatars"]["name"];
    $name= $_POST["names"];
    $pass=$_POST["pass"];
    $mail=$_POST["mail"];
    $role=$_POST["role"];
    $status=$_POST["status"];
    if($_FILES["avatars"]["size"]==0){
        $avatar= $user["avatar"];

    }else{
        $avatar = './src/images/'.$_FILES["avatars"]["name"];
    }
    $query= "UPDATE users SET id='$code', avatar='$avatar', username='$name', password='$pass', email='$mail',vaitro='$role', kichhoat='$status' where id like n'$id' ";
    connect($query);
    move_uploaded_file($_FILES["avatars"]["tmp_name"],"../src/images/".$_FILES["avatars"]["name"]);
   
    header("location:../view/user.php");

?>