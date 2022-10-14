<?php
     session_start(); 
     include "../model/connect.php"; 
     $query = "select * from users"; 
     $users = getAll($query); 
     $Err="";
     $code_passErr="";
     $code_pass="";
     if(isset($_POST["btn-login"])){
        if(empty($_POST["code_pass"])){
          $code_passErr="Không được bỏ trống";
        }else{
            $code_pass=$_POST["code_pass"];
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
    <h1>Nhập mã xác nhận</h1>
    <div class="form">
    <form action="./code_pass.php" method="POST">
      
        <label for="">Mã xác nhận*</label> <br>
        <input type="password" name="code_pass" id=""> <br>
        <span id="err"><?php echo $code_passErr?></span> <br>
        <button type="submit" name="btn-login" id="login">Gửi</button> <br>
        
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