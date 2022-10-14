<?php
    include "./model/connect.php";
   
    session_start();
    if(empty($_SESSION)){
        header("location:./view/login.php");
    };
     
    if(empty($_POST["search"])){
        $query ="select * from products";
        $products = getAll($query);
    }else{
        $search = $_POST["search"];
        $query ="select * from products where id like '$search' OR name like '%$search%'";
        $products = getAll($query);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siêu thị điện máy API</title>
    <link rel="shortcut icon" href="./src/images/logoap.png" type="image/x-icon" >
    <script src="https://kit.fontawesome.com/969bec5078.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css">
</head>
 <style>
    
   
    .nam_tich_xanh{
        display: flex;
        align-items: center;
    }
  #desc{
        height: 150px;
        display: inline-block;
        overflow: scroll;
        width: 200px;
        
    }
    td{
        text-align: center;
    }
    td img{
        height: 150px;
        width: 150px;
    }
    .right{
        display: flex;
        align-items: center;
    }
    form{
        display: flex;
        align-items: center;
        border: 1px solid black;
        border-radius: 10px;
    }
    #timkiem{
        border: none;
        background: none;
    }
    .right button{
        border: none;
        background: none;
    }
 </style>
<body>
    <div class="container">
        <main>
            <article>
                <div class="logo">
                    <img src="./src/images/logoap.png" alt="">
                </div>
                <h3>Admin tools</h3>
                <div class="infomation">
                <a href="./admin.php" id="but"><button><img src="./src/images/label.png" alt="">Product </button></a><br>
                <a href="./view/category.php"><button><img src="./src/images/label.png" alt="">Categories </button></a> <br>

                <a href="./view/user.php"><button><img src="./src/images/label.png" alt="">User </button> </a> <br>
                <a href=""><button><img src="./src/images/caidat.png" alt=""> Settings</button></a>
               
                
                </div>
                <h2>Insights</h2>
                <div class="insi">
                <button><img src="./src/images/inbox.png" alt="">In box</button>
                <button><img src="./src/images/bell.png" alt="">Nofitication</button>
                <button><img src="./src/images/coment.png" alt="">Comment</button>
                </div>
                <button><img src="./src/images/help.png" alt=""> Helps</button>
            </article>
            <aside>
                <header>
                    <div class="left">
                    <img height="100px" width="150px" style="border-radius:50% ;" id="avatars" src="<?php echo $_SESSION["avatar"]?>" alt="">
                    <div class="nam_tich_xanh">
                    <h2>Hi, <?php echo $_SESSION["username"]?></h2>
                    <img height="22px" src="./src/images/tichxanh.jpg"  alt="">
                    </div>
                    <div class="comback">
                        <h1>Welcome back</h1> 
                        <img src="./src/images/medal.png" alt="">
                    </div>
                    </div>
                    <div class="right">                         
                    
                        <button id="out">
                      <a onclick="return confirm('Bạn có muốn đăng xuất không')" href="./controller/log_out.php">Log Out</a> 
                        </button>
                       
                       
                    </div>
                </header>
                <div class="banner">
                    <div class="banner_left">
                    <h1>Your Products</h1>
                    <h4>Create Your Product Dashboard in Minutes</h4>
                    <button id="check">Check all seting</button>
                    </div>
                    <div class="image">
                    <img src="https://ui8-unity.herokuapp.com/img/banner-pic.png" alt="">
                    </div>
                </div>
                <a href="./view/add-product.php"><button id="add">Add New Product</button></a>
                <table>
        <thead>
            <tr>
                <th>#</th>
                <th id="name">Product Name</th>
                <th id="images">Product Image</th>
                <th id="price">Product Price</th>
                <th id="">Product Desc </th>
                <th>Sale Off</th>
                <th>Date Added</th>
                <th>View</th>
                <th>Hàng đặc biệt</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $key => $value):?>
            <tr>
                <td><?php echo $key + 1?></td>
                <td><?php echo $value["productName"]?></td>
                <td><img src="<?php echo $value["image"]?>" alt=""></td>
                <td id="price"><?php echo $value["productPrice"]?></td>
                <td id="desc"><?php echo $value["productDesc"]?></td>
                <td id="sale"><?php echo $value["sale_off"]?></td>
                <td id="date"><?php echo $value["date_Added"]?></td>
                <td><?php echo $value["view"]?></td>
                <td><?php echo $value["dac_biet"]?></td>
                <td id="category"><?php echo $value["categoryId"]?></td>
                <td id="action">
                    <a href="./view/update-product.php?id=<?php echo $value["id"]?>"><button id="update"><i class="fas fa-edit"></i></button></a>
                    <a onclick="return confirm('Bạn có muốn xóa không ')" href="./controller/save-delete-product.php?id=<?php echo $value["id"]?>"><button id="delete"><i class="fas fa-trash-alt"></i></button></a>
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
            </aside>
        </main>
    </div>
</body>

</html>