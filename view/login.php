<?php
     session_start(); 
     include "../model/connect.php"; 
     $query = "select * from users"; 
     $users = getAll($query); 
     $Err="";
     $non_matching="";
     $codeErr= $passErr="";
     $code=$pass="";
     
     foreach($users as $value){ 
         if(isset($_POST["btn-login"])){ 

              if(!empty($_POST["code"]) && !empty($_POST["pass"])){       
                
                 
                 if($_POST["code"] == $value["id"] && $_POST["pass"] == $value["password"]){
                  $_SESSION["avatar"] = $value["avatar"];
                  $_SESSION["id"]=$value["id"];
                  $_SESSION["username"] = $value["username"];
                  $_SESSION["email"] = $value["email"]; 
                   if($value["vaitro"]=="admin"){
                    
                     header("location:../admin.php"); 
                   }else if($value["vaitro"]=="Khách hàng"){
                 
                     header("location:../index.php");
                   
                   }
                 }else{
                  
                     $Err= "Mật khẩu hoặc tên đăng nhập sai!";
                 
                 }
             }else{
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
    <link rel="stylesheet" href="../src/css/llogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">

</head>
<style>
     
      #err{ 
        font-size: 22px;
        color: red;
      
        
      }
      #dk{    
       
        border-radius: 5px;
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
    <h1>Đăng nhập</h1>
    <div class="form">
    <form action="login.php" method="POST">
       <label for="">Mã đăng nhập*</label> <br>
        <input type="text" name="code" id=""> <br>
        <span id="err"><?php echo $codeErr?></span> <br>
        <label for="">Mật khẩu*</label> <br>
        <input type="password" name="pass" id=""> <br>
        <span id="err"><?php echo $passErr?></span> <br>
        <span><?php echo $Err?></span> <br>
        <button type="submit" name="btn-login" id="login">Đăng nhập ngay</button> <br>
       
        <div class="fogot">
       <a href="../view/forgot_password.php"><h4>Bạn quên mật khẩu ?</h4></a> 
     <a href="./sign_up.php" id="dk">Đăng ký tài khoản</a>
     </div>  
    </form>
    </div>
    
   
    
    </div>
</body>
</html>