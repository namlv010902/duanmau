<?php
    include "../model/connect.php"; 
    session_start();
    $codeErr=$namErr=$avatarErr=$passErr=$mailErr=$roleErr=$statusErr="";
    $code=$name=$avatar=$pass=$mail=$role=$status="";
    if(isset($_POST["submit"])){

            if (empty($_POST["code"])) {
                $codeErr = "Mã đăng nhập không được bỏ trống";
            } else {
                $code = $_POST["code"];
                $query= "select * from users where id like n'$code'";
                $users = getAll($query); 
                if(count($users) != 0){
                    $codeErr="Mã đăng nhập đã tồn tại";
            
                }
           
        };
        if(empty($_POST["names"])){
            $namErr="Họ tên không được bỏ trống";
        }else{
            $name=$_POST["names"];
           
        };
        if(empty($_FILES["avatars"]["name"])){
            $avatarErr="Avatar không được bỏ trống";
        }else{
            $avatar=$_FILES["avatars"];
           
        };
        if(empty($_POST["pass"])){
            $passErr="Mật khẩu không được bỏ trống";
        }else{
            $pass=$_POST["pass"];
           
        };
        if (empty($_POST["mail"])) {
            $mailErr = "Email không được bỏ trống";
        } else {
            $mail = ($_POST["mail"]);
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $mailErr = "Sai định dạng email !";
            }
        }
           
        
        if(empty($_POST["role"])){
            $roleErr="Không được bỏ trống";
        }else{
            $role=$_POST["code"];
           
        };
        if(empty($_POST["status"])){
            $statusErr="Không được bỏ trống";
        }else{
            $status=$_POST["status"];
           
        };
        if(!empty($_POST["code"]) && !empty($_FILES["avatars"]["name"]) && !empty($_POST["names"]) 
        && !empty($_POST["pass"]) && !empty($_POST["mail"])
         && !empty($_POST["role"]) && !empty($_POST["status"]) ){
           
          
          $code=$_POST["code"];
          $query= "select * from users where id like n'$code'";
          $users = getAll($query); 
          if(count($users) != 0){
              $codeErr="Mã đăng nhập đã tồn tại";
      
          }else{
          $avatar=$_FILES["avatars"]["name"];
          $name= $_POST["names"];
          $pass=$_POST["pass"];
          $mail=$_POST["mail"];
          $role=$_POST["role"];
          $status=$_POST["status"];
         
          $query="INSERT INTO users(id,avatar,username,password,email,vaitro,kichhoat) values('$code','./src/images/$avatar','$name','$pass','$mail','$role','$status')";
          
          connect($query);
          move_uploaded_file($_FILES["avatars"]["tmp_name"],"../src/images/".$_FILES["avatars"]["name"]);
          
            header("location:./user.php");
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
    <title>Siêu thị điện máy API</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../src/images/logoap.png" type="image/x-icon" >
    <script src="https://kit.fontawesome.com/969bec5078.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css">
</head>
 <style>
    .nam_tich_xanh{
        display: flex;
        align-items: center;
    }
  #desc{
        height: 30px;
        overflow: hidden scroll;
    }
    table{
        width: 50%;
        text-align: center;
    }
    #action{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #delete{
        color: red;
    }
    #update{
        color: orange;
        margin-right: 10px;
    }
    th,td{
        padding: 10px;
    }
    #err{
        color: red;
    }
    .form label{
        font-size: 20px;
    }
    .form{
        background-color: #ffff;
        width: 50%;
        margin: auto;
    }
    .form input{
       font-size: 20px;
       padding: 10px;
       
    }
 </style>
<body>
    <div class="container">
        <main>
        <article>
                <div class="logo">
                    <img src="../src/images/logoap.png" alt="">
                </div>
                <h3>Admin tools</h3>
                <div class="infomation">
                <a href="../admin.php" id="but"><button ><i class="fab fa-vaadin" style="margin-right:10px;"></i>Dashboard </button></a><br>

                <a href="../product.php" id="but"><button><i class="fab fa-sketch" style="margin-right:10px;"></i>Product </button></a><br>
                <a href="./category.php"><button><i class="fab fa-sellsy"  style="margin-right:10px;"></i>Categories </button></a> <br>

                <a href="./user.php"><button style="background-color:#6C5DD3; cursor: pointer; border-left: 8px solid red; "><i class="fa fa-user-nurse"  style="margin-right:10px;"></i> User </button> </a> <br>
                <a href="./comment.php"><button><i class="fa fa-comment-alt"  style="margin-right:10px;"></i></i>Comment</button></a>
                <a href="./thong_ke.php"><button><i class="fab fa-deezer" style="margin-right:10px;"></i>Statistics</button></a>
                <a href="./oder.php"><button><i class="fas fa-cart-plus" style="margin-right:10px;"></i>Oder</button></a>
               
                
                </div>
                <h2>Insights</h2>
                <div class="insi">
                <button><i class="fab fa-instalod" style="margin-right:10px;"></i>In box</button>
                <button><i class="fab fa-gitlab" style="margin-right:10px;"></i>Nofitication</button>
               
                </div>
           <button > <a href="./controller/log_out.php" style="color: white;"> <i style="color: white;margin-right: 10px;" class="fas fa-sign-out" style="margin-right:10px; "></i>Log Out</a> </button>  
            </article>
            <aside>
                <header>
                    <div class="left">
                    <img id="avatars" src=".<?php echo $_SESSION["avatar"]?>" alt="">
                    <div class="nam_tich_xanh">
                    <h2>Hi, <?php echo $_SESSION["username"]?></h2>
                    <img height="22px" src="../src/images/tichxanh.jpg"  alt="">
                    </div>
                    <div class="comback">
                        <h1>Welcome back</h1> 
                        <img src="../src/images/medal.png" alt="">
                    </div>
                    </div>
                    <div class="right" style="display: flex; align-items: center;">                         
                     <form action="">
                   
                      <button><i style="font-size: 25px;" class="fas fa-search"></i></button>
                      <input placeholder="Search..." type="text">
                     </form>
                     <div class="bell" style="display:flex;">
                     <i style="font-size:30px; margin-top:10px;" class="far fa-bell"></i>
                     <p style=" display: flex; align-items: center; justify-content: center;color: white ; background-color:#FF754C ; height: 25px ; width:25px; border-radius: 50%;">3</p>
                     </div>
                       
                       
                       
                    </div>
                </header>
                <div class="banner">
                    <div class="banner_left">
                    <h1>Your category</h1>
                    <h4>Create Your Product Dashboard in Minutes</h4>
                    <button id="check">Check all seting</button>
                    </div>
                    <div class="image">
                    <img src="https://ui8-unity.herokuapp.com/img/banner-pic.png" alt="">
                    </div>
                </div>
               
                 <h1 style="text-align: center;">Thêm mới người dùng</h1>
                 <div class="form">
                 <form action="./add_user.php" method="post" enctype="multipart/form-data">

                 <label for="">Mã đăng nhập</label><br>
                  <input type="text" value="" name="code" style="border: 1px solid #6C5DD3; outline: none; border-radius: 7px; width:100%; margin-top: 10px;"> <br>
                  <span id="err"><?php echo $codeErr?></span> <br>
                   
                  <label for="">Avatar</label><br>
                  <input type="file" value="" name="avatars"> <br>
                  <span id="err"><?php echo $avatarErr?></span> <br>
                  
                  <label for="">Họ tên</label><br>
                  <input type="text" value="" name="names" style="border: 1px solid #6C5DD3; outline: none; border-radius: 7px; width:100%; margin-top: 10px;"> <br>
                  <span id="err"><?php echo $namErr?></span> <br>

                  <label for="">Mật khẩu</label><br>
                  <input type="password" value="" name="pass" style="border: 1px solid #6C5DD3; outline: none; border-radius: 7px; width:100%; margin-top: 10px;"> <br>
                  <span id="err"><?php echo $passErr?></span> <br>

                  <label for="">Email</label><br>
                  <input type="text" value="" name="mail" style="border: 1px solid #6C5DD3; outline: none; border-radius: 7px; width:100%; margin-top: 10px;"> <br>
                  <span id="err"><?php echo $mailErr?></span> <br>
                  
                  <label for="">Vai trò</label><br>
                  <input type="radio" value="Khách hàng" name="role">Khách hàng
                  <input type="radio" value="Nhân viên" name="role">Nhân viên<br>
                  <span id="err"><?php echo $roleErr?></span> <br>
                  
                  
                  <label for="">Kích hoạt</label><br>
                  <input type="radio" value="Kích hoạt" name="status">Kích hoạt
                  <input type="radio" value="Kích hoạt" name="status">Chưa kích hoạt <br>
                  <span id="err"><?php echo $statusErr?></span> <br>
                  

                  <button type="submit" name="submit" style="border: 1px solid #6C5DD3; outline: none; border-radius: 5px;padding: 10px; font-size: 20px; background-color: #FF754C; color: #ffff; border: none; margin-top: 10px; width: 100%;">Thêm ngay</button>
                   
                 </form>
                 </div>
            </aside>
        </main>
    </div>
</body>

</html>