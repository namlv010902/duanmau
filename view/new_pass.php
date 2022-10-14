<?php
     session_start(); 
     include "../model/connect.php"; 
     $query = "select * from users"; 
     $users = getAll($query); 
     $Err="";
     $re_passErr= $passErr="";
     $re_pass=$pass="";
     foreach($users as $value){ 
         if(isset($_POST["btn-login"])){ 
              if(empty($_POST["re_pass"]) || empty($_POST["pass"])){                    
                if(empty($_POST["re_pass"])){
                  $re_passErr="Re_pass is requied";
                }else{
                  $re_pass=$_POST["re_pass"];
                };
                if(empty($_POST["pass"])){
                  $passErr="Password is requied";
                }else{
                  $pass=$_POST["pass"];
                };
             
             }else{
                if($_POST["pass"] != $_POST["re_pass"]){
                $Err= "Mật khẩu ko trùng khớp";
             }else{
                $pass= $_POST["pass"];
                $id=$_SESSION["id"];
                $query = "UPDATE users SET password='$pass' where id like n'$id'";
                connect($query);
                header("location:./login.php");
             }
                       
             }
         }
        }

       
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">
    <title>Document</title>
    <link rel="stylesheet" href="../src/css/sign_up.css">
</head>
<style>
      #err{
        
        font-size: 20px;
        color: white;
        text-shadow: 1px 1px 20px red;
      }
      .or hr{
         display: inline-block;
         width: 40%;

      }
      .or p{
        display: inline-block;
        
      }
      #dk{
        border: 1px solid red;
        text-decoration: none;
        padding: 10px;
        border-radius: 5px;
      }
      #dk:hover{
        color: red;
        background-color: white;
      }
      button{
        cursor: pointer;
      }
     #login:hover{
           color: red ;
     } 
      
</style>
<body>
    <div class="container">
    <h1>Mật khẩu mới</h1>
    <div class="form">
    <form action="./new_pass.php" method="POST">
        <label for="">Mật khẩu mới*</label> <br>
        <input type="password" name="pass" id=""> <br>
        <span id="err"><?php echo $passErr?></span> <br>

        <label for="">Xác nhân mật khẩu mới*</label> <br>
        <input type="text" name="re_pass" id=""> <br>
        <span id="err"><?php echo $re_passErr?></span> <br>

        <button type="submit" name="btn-login" id="login">Tiếp theo</button> <br>
        
        <span><?php echo $Err?></span>
        
     
    </form>
    </div>
    
   
    
    </div>
</body>
</html>