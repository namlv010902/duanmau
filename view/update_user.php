<?php
    include "../model/connect.php"; 
    session_start();
    $id = $_GET["id"];
    $query = "SELECT * FROM users where id like n'$id'";
    $users= getOne($query);
    $codeErr=$namErr=$passErr=$mailErr="";
    $code=$name=$pass=$mail="";
    if(isset($_POST["submit"])){
        if(empty($_POST["code"])){
            $codeErr="Code login is required";
        }else{
            $code=$_POST["code"];
           
        };
        if(empty($_POST["names"])){
            $namErr="UserName is required";
        }else{
            $name=$_POST["names"];
           
        };
           
      
        if(!empty($_POST["pass"])){
            $pass=$_POST["pass"];
           
        }else{
            $passErr="Password is required";
        };

        if (empty($_POST["mail"])) {
            $mailErr = "Email is required";
        } else {
            $mail = ($_POST["mail"]);
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $mailErr = "Invalid email format";
            }
        }
           
        

        if(!empty($_POST["code"]) && !empty($_POST["names"]) && !empty($_POST["pass"]) && !empty($_POST["mail"]) ){
            $name=$_POST["names"];
            $query= "select * from users where username like n'$name'";
            $users = getAll($query); 
            if(count($users) != 0){
                $namErr="Tên người dùng đã tồn tại";
    
            }else{
          
          
         
        
         
          
           
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
                <a href="./admin.php" id="but"><button><img src="../src/images/label.png" alt="">Product </button></a><br>
                <a href="./categories.php"><button><img src="../src/images/label.png" alt="">Categories </button></a> <br>

                <a href="./users.php"><button><img src="../src/images/label.png" alt="">User </button> </a> <br>
                <a href=""><button><img src="../src/images/caidat.png" alt=""> Settings</button></a>
               
                
                </div>
                <h2>Insights</h2>
                <div class="insi">
                <button><img src="../src/images/inbox.png" alt="">In box</button>
                <button><img src="../src/images/bell.png" alt="">Nofitication</button>
                <button><img src="../src/images/coment.png" alt="">Comment</button>
                </div>
                <button><img src="../src/images/help.png" alt=""> Helps</button>
            </article>
            <aside>
                <header>
                    <div class="left">
                    <img id="avatar" src=".<?php echo $_SESSION["avatar"]?>" alt="">
                    <div class="nam_tich_xanh">
                    <h2>Hi, <?php echo $_SESSION["username"]?></h2>
                    <img height="22px" src="../src/images/tichxanh.jpg"  alt="">
                    </div>
                    <div class="comback">
                        <h1>Welcome back</h1> 
                        <img src="../src/images/medal.png" alt="">
                    </div>
                    </div>
                    <div class="right">                         
                        
                        <button id="out">
                      <a onclick="return confirm('Bạn có muốn đăng xuất không')" href="../controller/log_out.php">Log Out</a> 
                        </button>
                       
                    </div>
                </header>
                <div class="banner">
                    <div class="banner_left">
                    <h1>Your User</h1>
                    <h4>Create Your Product Dashboard in Minutes</h4>
                    <button id="check">Check all seting</button>
                    </div>
                    <div class="image">
                    <img src="https://ui8-unity.herokuapp.com/img/banner-pic.png" alt="">
                    </div>
                </div>
               
                 <h1>Update users</h1>
                 <form action="../controller/update_user.php" method="post" enctype="multipart/form-data">
                <input type="text" value="<?php echo $users["id"]?>" name="id" hidden>
                 <label for="">Code login</label><br>
                  <input type="text" value="<?php echo $users["id"]?>" name="code"> <br>
                  <span id="err"><?php echo $codeErr?></span> <br>
                   
                  <label for="">Avatar</label><br>
                  <input type="file" value=".<?php echo $users["avatar"]?>" name="avatars"> <br>
                 
                  
                  <label for="">UserName</label><br>
                  <input type="text" value="<?php echo $users["username"]?>" name="names"> <br>
                  <span id="err"><?php echo $namErr?></span> <br>

                  <label for="">Password</label><br>
                  <input type="password" value="<?php echo $users["password"]?>" name="pass"> <br>
                  <span id="err"><?php echo $passErr?></span> <br>

                  <label for="">Email</label><br>
                  <input type="text" value="<?php echo $users["email"]?>" name="mail"> <br>
                  <span id="err"><?php echo $mailErr?></span> <br>
                  
                  <label for="">Role</label><br>
                  <input type="radio" checked value="Khách hàng" name="role">Khách hàng
                  <input type="radio" value="Nhân viên" name="role">Nhân viên<br>
                  
                  
                  
                  <label for="">Status</label><br>
                  <input type="radio" value="Kích hoạt" checked name="status">Kích hoạt
                  <input type="radio" value="Chưa kích hoạt" name="status">Chưa kích hoạt<br>
                 
                  <button type="submit" name="submit">Add</button>
                   
                 </form>
            </aside>
        </main>
    </div>
</body>

</html>