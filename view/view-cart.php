<?php
     include "../model/connect.php";
    session_start(); 
    
    $alert = $_GET["id"];
    
    if(!empty($_SESSION["id"])){
    $id=$_SESSION["id"];
    // $query="SELECT c.id_cart, c.so_luong, c.ma_sp, p.id, p.productName, p.productPrice, p.image 
    // from cart as c join products as p 
    // on c.ma_sp = p.id where c.ma_kh like n'$id'";
    // $cart = getAll($query);
    if(!empty($_SESSION["cart"])){
    $cart = $_SESSION["cart"];
    $count_money=0;
    }
    }
    $query2 = "SELECT * FROM products where categoryId = 1";
    $product = getAll($query2);
   
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gio hàng</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../src/css/index.css">
    <script src="https://kit.fontawesome.com/969bec5078.js" crossorigin="anonymous"></script>

    
</head>
<style>
    
   article .fa{
       color: rgba(43, 193, 184, 1);   
    }
  .detail_img{
    border-radius: 30px;
    border: 2px solid rgba(43, 193, 184, 1);
    width: 400px;
    margin-right: 40px;
    margin-left: 80px;  
  }
  .detail_item{
    width: 620px;
  }
  .detail_img img{
    width: 100%;
    border-radius: 30px;
  }
  #avatar{
        border-radius: 50%;
    }
    #dangxuat{
        font-size: 18px;
        margin: 0 5px;
    }
    #cartt{
        background-color: green;
        color: white;
        padding: 10px;
        margin-top: 50px;
        cursor: pointer;
    }

    .box {   
    height: 350px;
    overflow: hidden scroll;
}
.showComment {
    width: 100%;
    border-radius: 10px;
    background: rgba(247, 226, 236, 0.75);
    padding: 10px;
    margin-top: 25px;
}

.head {
    display: flex;
    align-items: center;
}

.nameinfo {
    flex: 1;
    margin: 15px;
    border-bottom: 1px solid rgba(233, 74, 151, 0.25);
}

.avatar-comment {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
}
.avatar-comment img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.detail-comment {
    margin-left: 65px;  
}
.textComment {
    display: block;
    margin: 10px 0;
}
footer{
    margin-top: 50px;
}
table,tr,td,th{
    border-collapse: collapse;
    text-align: center;
    padding: 10px;
   
    
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
table{
    width: 70%;
    margin-left: 30px;
}

#img{
    width: 200px;
    height: 50px;
   
}
td img{
    width: 100%;

}
td{
    height: 210px;
    font-size: 20px;
}
#tt{
    height: 30px;
}
th{
    background-color: rgba(108, 93, 211, 1);
    color: white;
    border: none;
}
#update a{
    border: 1px solid gray;
    padding: 0 5px;
    font-size: 20px;
    color: black;
    
}
#update{
    display: flex;
    align-items: center;
    justify-content: center;

}
#ql_tk{
    font-size: 18px;
}
</style>
<body>
    <div class="container">
        
    <header>
            <div class="tren">
                <div class="left">
                    <div class="logo">
                        <a href="../index.php"><img src="https://www.webomates.com/wp-content/uploads/2020/09/API-300x270.png" alt="" height="110px" width="120px"></a>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="../index.php"><i class="fa fa-home"></i> Trang chủ</a></li>
                            <li><a href="">Giới thiệu</a></li>
                            <li><a href="">Cửa hàng </a></li>
                            <li><a href="">Liên hệ</a></li>
                            <li><a href="">Tin tức</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="right">
                    <div class="info">
                        <a href=""><i class="fas fa-envelope" id="mail"></i>info@domain.com |
                        </a>

                        <a href="" id="so"><i class="fas fa-phone" id="phone"></i>0565079665 </a>
                    </div>
                </div>
            </div>
            <div class="duoi">
                <div class="trai">
                    <a href=""> <i class="fas fa-bars" id="cate"></i> Danh mục sản phẩm</a>
                    <form action="./index.php" method="POST">
                        <select name="" id="">
                            <option value="">Tất cả sản phẩm</option>
                        </select>
                        <input type="text" name="search" placeholder="Tìm kiếm sản phẩm...">
                        <button id="search" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="phai">
                    <?php if(empty($_SESSION["id"])){ ?>
                        <a  href="./view/login.php"><i class="fas fa-shopping-cart" id="cart"></i></a>
                    <a href="./view/login.php"><i class="fas fa-user" id="user"></i></a>
                   
                 
                    <?php }else{ ?>
                        <a href="./view/view_cart.php"> <i class="fas fa-shopping-cart" id="cart"></i></a>
                  
                  <img id="avatar" class="user_hover" height="40px" width="60px" src=".<?php echo $_SESSION["avatar"]?>" alt=""> <br>
                  
                 
                  <?php }?>
                  <a href=""><i class="fas fa-bell"></i></a>
                </div>
            </div>

        </header>
        <p style="font-size: 25px;color: red;"> <?php echo $alert?></p>
        <main>
           
            <article >
                <button><i class="fa fa-laptop"></i> Máy tính và phụ kiện</button>
                <button><i class="fa fa-music"></i> Âm Thanh & Video</button>
                <button><i class="fa fa-mobile-alt"></i> Điện Thoại Di Động</button>
                <button><i class="fa fa-table"></i> Máy Tính Bảng</button>
                <button><i class="fa fa-tv-alt"></i> TV & Màn hình</button>
                <button><i class="fa fa-memory"></i> Nhà Thông Minh</button>
                <button><i class="fa fa-glasses"></i> Đồng Hồ & Mắt Kính</button>
                <button> <i class="fa fa-headphones"></i>Tai Nghe & Loa</button>
                <button><i class="fa fa-laptop"></i> Đồ gia dụng</button>
                <button><i class="fa fa-mouse"></i></i> Phụ kiện</button>
              
            </article>
        
     <!-- <?php if(!empty($cart)){ ?>
        <div class="cart_right" style="width: 80%;">
       
    <table border="1" style="width:90% ;" >
        <thead>
            <tr>
                <th id="">Ảnh sản phẩm</th>
                <th id="">Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           
             <?php foreach($cart as $value):?>              
                <tr>
                    <?php $_SESSION["id_cart"]= $value["id_cart"]?>
                   <td id="img"><img src="<?php echo $value["image"]?>"></td>
                   <td><?php echo $value["productName"]?></td>
                   <td>$<?php echo $value["productPrice"]?></td>
                   <td><?php echo $value["so_luong"]?></td>
                   <td>$<?php $result= $value["productPrice"] * $value["so_luong"];  echo $result?></td>
                   <td> <a style="font-size: 25px;" onclick="return confirm('Xóa khỏi giỏ hàng')" href="../controller/delete_cart.php?id=<?php echo $value["id_cart"] ?>"><i style="color:red" class="fa fa-trash-alt"></i></a> </td>               
                </tr>
                <?php $count_money = $count_money + $result ?>
                <?php endforeach?>
                <tr>            
                    <th id="tt" colspan="6">Tổng tiền: $<?php echo $count_money ?></th>
                </tr>
             
            
        </tbody>
    </table>  
       <div class="muahang" style="text-align: right; margin-right: 150px;">
      <a href="./thanh_toan.php"> <button style="font-size: 20px; padding: 10px 20px; margin-top: 20px; background-color: #FF754C; border: none; border-radius: 10px; color:white;">Mua hàng</button></a>
       </div>
            </div>
     <?php }else{?>
        <div class="cartErr" style="text-align:center ; width: 80%; margin-top: 50px;">
            <img height="200px" src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/cart/9bdd8040b334d31946f49e36beaf32db.png" alt="">
        <h3>Giỏ hàng của bạn trống</h3>
         <a href="../index.php"><button style="font-size:20px; margin-top: 20px; cursor: pointer; background-color: rgba(47, 53, 58, 1) ; padding: 10px 20px; color: white; border-radius: 10px;">Mua ngay</button></a>
        </div>
        
        <?php }?> -->

        <?php 
      if(!empty($_SESSION["cart"])){ ?>
       
    <table border="1">
        <thead>
            <tr>
                <th>ảnh sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>đơn giá</th>
                <th>số lượng</th>
                <th>thành tiền</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           
             <?php foreach($cart as $id => $product):?> 
                             
                <tr>
                   <td><img src="<?php echo $product["images"]?>"></td>
                   <td><?php echo $product["productName"]?></td>
                   <td><?php echo $product["productPrice"]?></td>
                   <td id="update"><a id="delete" href="../controller/update_cart.php?id=<?php echo $id?>&type=decre" >-</a> <?php echo $product["quantity"]?>
                   <a href="../controller/update_cart.php?id=<?php echo $id?>&type=incre">+</a>
                </td>
                   <td><?php $result= $product["productPrice"] * $product["quantity"];  echo $result?></td>
                   <td> <a href="./delete_cart.php?id=<?php echo $id?>">X</a> </td>               
                </tr>
                <?php $count_money = $count_money + $result ?>
        
                <?php endforeach?>
                <tr>            
                    <th id="tt" colspan="6">Tổng tiền:<?php echo $count_money?></th>
                    <!-- <?php $money = $_SESSION["cart"][$count_money] ?> -->
                </tr>
              
             
            
        </tbody>
    </table>  
    <?php }else{ ?>
                <h1>giỏ hàng trống</h1>
            
            <?php }?>
            <a href="./thanh_toan.php"> <button style="font-size: 20px; padding: 10px 20px; margin-top: 20px; background-color: #FF754C; border: none; border-radius: 10px; color:white;">Mua hàng</button></a>

        </main>
        <div class="title">
            <h1>Có thể bạn cũng thích</h1>
        </div>
        <div class="product">
            <?php foreach ($product as $value) : ?>
                <div class="colum">
                    <a href="../detail.php?id=<?php echo $value["id"] ?>">
                      <div class="img_product">
                         <img style="margin-top:15px; width: 90%;" src="<?php echo $value["image"] ?>" alt="">
                         </div> 
                        <h3><?php echo $value["productName"] ?></h3>
                        <p id="prdgia">Giá: $<?php echo $value["productPrice"] ?></p>
                    </a>
                    <button id="mua_prd">Mua hàng</button>
                      
                </div>
            <?php endforeach ?>
        </div>
        
         
          
          <footer>
            <div class="colum_footer">
                <div class="imgft">
                    <img src="https://www.webomates.com/wp-content/uploads/2020/09/API-300x270.png" alt="" height="130px" width="150px" alt="">
                </div>
                <h3>Siêu thị điện máy toàn quốc</h3>
                <p>9999 Nguyễn Huệ <br>
                    Quận 1, TP. Hồ Chí Minh
                    Việt Nam</p>
                <div class="footer">
                    <div class="phone">
                        <i class="fas fa-phone-alt"></i>
                        <span> Hotline</span>
                    </div>
                    <div class="mail">
                        <i class="fas fa-envelope"></i>
                        <span> Mail</span>
                    </div>
                </div>

            </div>
            <div class="cot">
                <h1>Về chúng tôi</h1>
                <p> <em> > </em> Trang chủ</p>
                <p> <em> > </em> Trang chủ</p>
                <p> <em> > </em> Trang chủ</p>
                <p><em> > </em> Trang chủ</p>
            </div>
            <div class="cot">
                <h1>Thông tin cần biết</h1>
                <p> <em> > </em> Hướng dẫn thanh toán</p>
                <p> <em> > </em> Hướng dẫn thanh toán</p>
                <p> <em> > </em> Hướng dẫn thanh toán</p>
                <p> <em> > </em> Hướng dẫn thanh toán</p>
                <p> <em> > </em> Hướng dẫn thanh toán</p>
                <p> <em> > </em> Hướng dẫn thanh toán</p>
            </div>

            <div class="cot">
                <h1>Danh mục sản phẩm</h1>
                <p> <em> > </em> Máy Tính & Phụ Kiện</p>
                <p> <em> > </em> Máy Ảnh, Âm Thanh & Video</p>
                <p> <em> > </em> Điện Thoại Di Động</p>
                <p> <em> > </em> Máy Tính & Máy Tính Bảng</p>
                <p> <em> > </em> TV & Màn hình</p>
                <p> <em> > </em> Nhà thông minh</p>
            </div>
            <div class="columm">
                <div class="ketnoi">
                    <h1>Kết nối</h1>
                    <div class="icon">
                        <i class="fab fa-facebook-square"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-tiktok"></i>
                        <i class="fab fa-twitter"></i>
                    </div>
                </div>

                <h1>Đăng ký nhận tin</h1>
                <p>Bằng cách nhập Email đăng ký, bạn sẽ nhận các tin khuyến mãi từ chúng tôi.</p>
                <form action="">
                    <input type="text" placeholder="Nhập email của bạn" required>
                    <button>Đăng ký</button>
                </form>


            </div>
        </footer>
    </div>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
   <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
   <script>
     tippy('.user_hover', {
        content: '<a id="dangxuat" href="../controller/log_out.php">Đăng xuất</a> <br> <a id="ql_tk" href="./account.php">Quản lý tài khoản</a> ',
        allowHTML: true, 
        placement: 'bottom',
        delay: [0, 1000],
        duration: [0, 1000],
        interactive: true,
      });
  </script>

</body>


</html>