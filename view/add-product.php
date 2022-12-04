<?php
    include "../model/connect.php";
    session_start();
    $query="SELECT * FROM category";
    $category=getAll($query);
    $nameErr=$imageErr=$categErr=$priceErr=$sale_offErr=$descErr=$trang_thaiErr="";
    $name=$image=$cate=$price=$sale_off=$desc=$trang_thai="";
    if(isset($_POST["login"])){
        if(empty($_POST["names"])){
            $nameErr="Không được bỏ trống !";
        }else{
            $name=$_POST["names"];
        }
        if(empty($_FILES["images"]["name"])){
            $imageErr="Không được bỏ trống !";  
        }else{
            $image=$_FILES["images"]["name"];
        }
        if(empty($_POST["price"])){
            $priceErr="Không được bỏ trống !";
        }else{
            $price=$_POST["price"];
        }
        if(empty($_POST["sale_off"])){
            $sale_offErr="Không được bỏ trống !";
        }else{
            $sale_off=$_POST["sale_off"];
        }
        if(empty($_POST["categoryId"])){
            $categErr="Không được bỏ trống !";
        }else{
            $cate=$_POST["categoryId"];
        }
        if(empty($_POST["desc"])){
            $descErr="Không được bỏ trống !";
        }else{
            $desc=$_POST["desc"];
        }

        if(empty($_POST["trang_thai"])){
            $trang_thaiErr="Trạng thái is required";
        }else{
            $trang_thai=$_POST["trang_thai"];
        }

       
    }
       
    if(!empty($_POST["names"]) && !empty($_FILES["images"]["name"]) && !empty($_POST["price"]) && !empty($_POST["sale_off"]) && !empty($_POST["categoryId"]) && !empty($_POST["desc"]) ){
        $name=$_POST["names"];
        $image=$_FILES["images"]["name"];
        $price = $_POST["price"];
        $sale_off = $_POST["sale_off"];      
        $category=$_POST["categoryId"];
        $desc = $_POST["desc"];
       
        $query="INSERT INTO products(image,productName,productPrice,sale_off,categoryId,productDesc) values('./src/images/$image','$name','$price','$sale_off','$category','$desc')";
        connect($query);
        move_uploaded_file($_FILES["images"]["tmp_name"],"../src/images/".$_FILES["images"]["name"]);
        header("location:../product.php");
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
    <link rel="stylesheet" href="../src/css/style.css">
    <script src="https://kit.fontawesome.com/969bec5078.js" crossorigin="anonymous"></script>
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
        
        text-align: center;
    }
    #img_user{
        width: 200px;
        height: 100px;
    }
    td img{
        width: 100%;
        
    }
   
    #action{    
       
        display: flex;
        align-items: center;
    }
    #delete{
        color: red;
    }
    #update{
        color: darkorange;
        margin-right: 10px;
    }
    th,td{
        padding: 6px;
    }
    #name{
        width: 220px;
    }
    .right{
        display: flex;
        align-items: center;
    }
    table, tr,th,td{
        border: none;
     }
     td{
        background-color: white;
       
     }
     tr{
        border-bottom: 15px solid rgba(230, 234, 241, 1);
     }
    .form{
        /* background-color: #FF754C; */
        width: 50%;
        margin: auto;
    }
    .form input, select, textarea{
        width: 100%;
        padding: 10px;
        font-size: 20px;
        border-radius: 7px;
        border: 2px solid #6C5DD3;
        outline: none;
        
    }
    .form label{
        font-size: 20px;
    }
    #err{
        font-size: 20px;
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
                <a href="../admin.php" id="but"><button  ><i class="fab fa-vaadin" style="margin-right:10px;"></i>Dashboard </button></a><br>

                <a href="../product.php" id="but"><button style="background-color: #6C5DD3; border-left: 8px solid red;"><i class="fab fa-sketch" style="margin-right:10px;"></i>Product </button></a><br>
                <a href="./category.php"><button><i class="fab fa-sellsy"  style="margin-right:10px;"></i>Categories </button></a> <br>

                <a href="./user.php"><button ><i class="fa fa-user-nurse"  style="margin-right:10px;"></i> User </button> </a> <br>
                <a href="./comment.php"><button><i class="fa fa-comment-alt"  style="margin-right:10px;"></i></i>Comment</button></a>
                <a href="./thong_ke.php"><button><i class="fab fa-deezer" style="margin-right:10px;"></i>Statistics </button></a>
                <a href="./oder.php"><button><i class="fas fa-cart-plus" style="margin-right:10px;"></i>Oder</button></a>

                
                </div>
                <h2>Insights</h2>
                <div class="insi">
                <button><i class="fab fa-instalod" style="margin-right:10px;"></i>In box</button>
                <button><i class="fab fa-gitlab" style="margin-right:10px;"></i>Nofitication</button>
   
                </div>
                <button> <i class="fab fa-earlybirds" style="margin-right:10px;"></i>Helps</button>
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
                    <div class="right">                         
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
                    <h1>Your user</h1>
                    <h4>Create Your Product Dashboard in Minutes</h4>
                    <button id="check">Check all seting</button>
                    </div>
                    <div class="image">
                    <img src="https://ui8-unity.herokuapp.com/img/banner-pic.png" alt="">
                    </div>
                </div>
          <div class="form">
                <h1 style="text-align: center;">Thêm mới sản phẩm</h1>
    <form action="./add-product.php" method="POST" enctype="multipart/form-data">
   
     <label for="">Tên sản phẩm</label><br>
     <input type="text" name="names"><br>
     <span id="err"><?php echo $nameErr?></span><br>
    
     <label for="">Ảnh sản phẩm</label><br>
     <input type="file" name="images" style="border: none;"><br>
     <span id="err"><?php echo $imageErr?></span><br>

     <label for="">Giá</label><br>
     <input type="number" name="price" min="0"><br>
     <span id="err"><?php echo $priceErr?></span><br>

     <label for="">Giảm giá</label><br>
     <input type="number" name="sale_off"><br>
     <span id="err"><?php echo $sale_offErr?></span><br>
     <label for="">Danh mục</label><br>
     <select name="categoryId" id="">
        <option value="" hidden>Lựa chọn danh mục</option>
        <?php foreach($category as $value):?>
        <option value="<?php echo $value["id"]?>"><?php echo $value["categoryName"]?></option>
        <?php endforeach?>
     </select><br>
     <span id="err"><?php echo $categErr?></span><br>
      <label for="">Product Desc</label> <br>
    <textarea name="desc" id="" cols="70" rows="7"></textarea> <br>
    <span id="err"><?php echo $descErr?></span> <br>
      <button type="submit" name="login" style="background-color: #FF754C; font-size: 20px; padding: 10px 15px;border: none; color: white; border-radius: 5px;">Thêm</button>

    </form>
    </div>
            </aside>
        </main>
    </div>
</body>

</html>





