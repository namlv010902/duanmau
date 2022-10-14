<?php
    include "../model/connect.php"; 
    session_start();
    $Err="";
    $cate="";
    if(isset($_POST["submit"])){
        if(empty($_POST["cateName"])){
            $Err="CateName is required";
        }else{
            $cate=$_POST["cateName"];
            $query= "INSERT INTO category(categoryName) values('$cate')";
            connect($query);
            header("location:./category.php");
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
                    <img id="avatar" src="<?php echo $_SESSION["avatar"]?>" alt="">
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
                    <h1>Your category</h1>
                    <h4>Create Your Product Dashboard in Minutes</h4>
                    <button id="check">Check all seting</button>
                    </div>
                    <div class="image">
                    <img src="https://ui8-unity.herokuapp.com/img/banner-pic.png" alt="">
                    </div>
                </div>
               
                 <h1>Add new category</h1>
                 <form action="./add_category.php" method="post">
                  <label for="">CategoryName</label><br>
                  <input type="text" value="" name="cateName"> <br>
                  <span id="err"><?php echo $Err?></span> <br>
                  <button type="submit" name="submit">Add</button>
                   
                 </form>
            </aside>
        </main>
    </div>
</body>

</html>