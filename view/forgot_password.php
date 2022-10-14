<?php
     session_start();
     
     include_once "../mail/index.php" ;
     $mail = new Mailer();
     include "../model/connect.php"; 
     $query = "select * from users"; 
     $users = getAll($query); 
     $Err="";
     $codeErr= $mailErr="";
     $code=$mail="";
 
     foreach($users as $value){ 
         if(isset($_POST["btn-login"])){ 

              if(empty($_POST["code"]) || empty($_POST["mail"])){                    
                if(empty($_POST["code"])){
                  $codeErr="Code is requied";
                }else{
                  $code=$_POST["code"];
                };
                if(empty($_POST["mail"])){
                  $mailErr="Mail is requied";
                }else{
                  $mail=$_POST["mail"];
                };
             
             }else{
                 if($_POST["code"] == $value["id"] && $_POST["mail"] == $value["email"]){
                  
                  $_SESSION["id"]= $_POST["code"];
                  header("location:./code_pass.php");
                 }else{
                  $Err = "Mã đăng nhập hoặc email sai";
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
    <h1>Quên mật khẩu</h1>
    <div class="form">
    <form action="./forgot_password.php" method="POST">
       <label for="">Mã đăng nhập*</label> <br>
        <input type="text" name="code" id=""> <br>
        <span id="err"><?php echo $codeErr?></span> <br>
        <label for="">Email*</label><br>
        <input type="text" name="mail" id=""> <br>
        <span id="err"><?php echo $mailErr?></span> <br>
        <button type="submit" name="btn-login" id="login">Tìm lại mật khẩu</button> <br>     
        <span><?php echo $Err?></span> 
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