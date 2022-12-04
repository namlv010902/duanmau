<?php
    include "../model/connect.php";
    session_start();
   $query = "SELECT products.id AS idPrd, products.productName, 
   COUNT(binhluan.noidung) AS 'So_luong' ,
   MAX(binhluan.thoiGianBL) AS 'Moi_nhat', 
   MIN(binhluan.thoiGianBL) AS 'Cu_nhat' 
   FROM binhluan JOIN products ON binhluan.maSP= products.id 
   GROUP BY products.id, products.productName HAVING So_luong>0 ORDER BY So_luong DESC";
   $comment= getAll($query);
   
      
    
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
    table, tr,th,td{
        border: none;
     }
     td{
        background-color: white;
     }
     tr{
        border-bottom: 15px solid rgba(230, 234, 241, 1);
     }
    .nam_tich_xanh{
        display: flex;
        align-items: center;
    }
  #desc{
        height: 30px;
        overflow: hidden scroll;
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
        color: darkorange;
        margin-right: 10px;
    }
    th,td{
        padding: 10px;
    }
    .right{
        display: flex;
        align-items: center;
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

                <a href="../admin.php" id="but"><button><i class="fab fa-sketch" style="margin-right:10px;"></i>Product </button></a><br>
                <a href="./category.php"><button><i class="fab fa-sellsy"  style="margin-right:10px;"></i>Categories </button></a> <br>

                <a href="./user.php"><button><i class="fa fa-user-nurse"  style="margin-right:10px;"></i> User </button> </a> <br>
                <a href="./comment.php"><button style="background-color: #6C5DD3;  border-left: 8px solid red;"><i class="fa fa-comment-alt"  style="margin-right:10px;"></i></i>Comment</button></a>
                <a href="./thong_ke.php"><button><i class="fab fa-deezer" style="margin-right:10px;"></i>Statistic </button></a>
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
                    <h1>Your category</h1>
                    <h4>Create Your Product Dashboard in Minutes</h4>
                    <button id="check">Check all seting</button>
                    </div>
                    <div class="image">
                    <img src="https://ui8-unity.herokuapp.com/img/banner-pic.png" alt="">
                    </div>
                </div>
                <h1>Quản lý comment</h1>
                <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Sản phẩm</th>
                <th>Số comment</th>
                <th>Mới nhất</th>
                <th>Muộn nhất</th>              
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($comment as $key => $value):?>
            <tr>
                <td style="text-align:center;width: 100px;"><?php echo $key + 1?></td>
                <td><?php echo $value["productName"]?></td>
                <td style="text-align:center;"><?php echo $value["So_luong"]?></td>
                <td style="text-align:center;"><?php echo $value["Moi_nhat"]?></td>
                <td style="text-align:center;"><?php echo $value["Cu_nhat"]?></td>
                <td id="action">
                <a style="color:darkorchid" href="./detail_cmt.php?id=<?php echo $value["idPrd"]?>">Chi tiết</a>
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