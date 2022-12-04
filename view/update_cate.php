<?php
    session_start();
    include "../model/connect.php"; 
    $id=$_GET["id"];
    $query= "SELECT * FROM category where id=$id";
    $item= getOne($query);
    $Err="";
    $cate="";
    if(isset($_POST["submit"])){
        if(empty($_POST["cateName"])){
            $Err="CateName is required";
        }else{
            $cate=$_POST["cateName"];
            
        };
        
        
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
       width: 100%;
       border-radius: 5px;
       border: 2px solid #6C5DD3;
       
    }
    .form button{
        padding: 10px;
        font-size: 20px;
        border-radius: 5px;
        background-color: #FF754C;
        color: white;
        border: none;
       
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
                <a href="./category.php"><button style="background-color:#6C5DD3; cursor: pointer; border-left: 8px solid red; "><i class="fab fa-sellsy"  style="margin-right:10px;"></i>Categories </button></a> <br>

                <a href="./user.php"><button><i class="fa fa-user-nurse"  style="margin-right:10px;"></i> User </button> </a> <br>
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
               
                 <h1 style="text-align: center;">Thêm mới danh mục</h1>
                 <div class="form">
                 <form action="../controller/update_category.php" method="POST">
                  <label for="">Tên danh mục</label><br>
                  <input type="text" name="id" value="<?php echo $item["id"]?>" hidden>
                  <input type="text" name="cateName" value="<?php echo $item["categoryName"]?>" > <br>
                  <span id="err"><?php echo $Err?></span> <br>
                  <button type="submit" name="submit">Update</button>
                   
                 </form>
                 </div>
            </aside>
        </main>
    </div>
</body>

</html>