<?php
     session_start();
     
     
     include "../model/connect.php"; 
      
     $Err="";
     $codeErr= $mailErr="";
     $code=$mail="";
     $pass="";
       
         if(isset($_POST["btn-login"])){           
              if(!empty($_POST["code"]) && !empty($_POST["mail"])){ 
                $code = $_POST["code"];
                $query = "select * from users where id like n'$code'"; 
                $users = getOne($query);
                if($_POST["code"] == $users["id"] && $_POST["mail"] == $users["email"]){
                $pass=$users["password"];
                   
              }else{
                $Err="Sai mã hoặc mail";     
             }
                       
             }else{
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
        <span><?php echo $Err?></span> <br>

        <span><?php echo $pass ?></span> <br>
       
        <a href="./login.php" style="font-size:25px; color: white ; ">Đăng nhập ngay</a><br>
       
      
       
      
    </form>
    </div>
    
   
    
    </div>
</body>
</html>