<?php
     session_start(); 
     include "../model/connect.php"; 
     $query = "select * from users"; 
     $users = getAll($query); 
     $Err="";
     $codeErr= $passErr="";
     $code=$pass="";
 
     foreach($users as $value){ 
         if(isset($_POST["btn-login"])){ 

              if(empty($_POST["code"]) || empty($_POST["pass"])){                    
                if(empty($_POST["code"])){
                  $codeErr="Code is requied";
                }else{
                  $code=$_POST["code"];
                };
                if(empty($_POST["pass"])){
                  $passErr="Password is requied";
                }else{
                  $pass=$_POST["pass"];
                };
             
             }else{
                 if($_POST["code"] == $value["id"] && $_POST["pass"] == $value["password"]){
                  
                  $_SESSION["id"]= $_POST["code"];
                  header("location:./new_pass.php");
                 }else{
                  $Err = "Mã đăng nhập hoặc mật khẩu sai";
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
    <h1>Đổi mật khẩu</h1>
    <div class="form">
    <form action="./change_Password.php" method="POST">
       <label for="">Mã đăng nhập*</label> <br>
        <input type="text" name="code" id=""> <br>
        <span id="err"><?php echo $codeErr?></span> <br>
        <label for="">Mật khẩu cũ*</label> <br>
        <input type="password" name="pass" id=""> <br>
        <span id="err"><?php echo $passErr?></span> <br>
        <button type="submit" name="btn-login" id="login">Tiếp theo</button> <br>
        
        <span><?php echo $Err?></span>
       <a href=""><h4>Bạn quên mật khẩu?</h4></a> 
        <div class="or">
            <hr>
          <p> Or </p>
          <hr>
        </div>
     <a href="./sign_up.php" id="dk">Register account</a>  
    </form>
    </div>
    
   
    
    </div>
</body>
</html>