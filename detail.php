<?php
     include "./model/connect.php";
    session_start();
    $id = $_GET["id"];
    // if(!empty($_SESSION["id"])){
    // $idPerson = $_SESSION["id"];
    // }
    $query = "SELECT * FROM products where id = $id";
    $product = getOne($query);
    $categoryId= $product["categoryId"];
    $query1 = "SELECT * FROM products where categoryId = $categoryId";
    $category = getAll($query1);
    $query2 = "select bl.id AS 'idBL', maSP, noidung, maKH, thoiGianBL, p.username, p.avatar 
    from binhluan as bl join users as p on maKH = p.id where maSP = $id";
    $comments = getAll($query2);

    $query3 = "SELECT products.id AS'IDSP' ,products.productName, binhluan.noidung ,
     COUNT(binhluan.noidung) AS 'So_luong' from binhluan join products On binhluan.maSP = products.id 
     GROUP BY products.id, products.productName HAVING products.id = $id";
     $so_cmt = getAll($query3);  
    // echo "<pre>";
    // var_dump($comments);die;
  


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- <script src="jquery-3.3.1.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/index.css">
    
    <script src="https://kit.fontawesome.com/969bec5078.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
</head>
<style>
    .detail_img{
        overflow: hidden;
    }
    .detail_img img:hover{
        transform: scale(1.2);
        transition: 1s;
    }
    .count{
        display: flex;
        align-items: center;
        
    }
    .count button{
        padding: 0 5px;
        border: 1px solid gray;
        font-size: 25px;
        height: 35px;
        width: 35px;
    }
    .count input{
        height: 35px;
        width: 60px;
       text-align: center;
       border: 1px solid gray;
    }
    .so_luong{
        background: none;
        color: black;
    }
    .detailtrai button {
   
    color: black;
    font-size: 20px;
    background: none;
    border: 1px solid gray;
    border-radius: 10px;
   
    margin-top: 10px;
    padding: 10px;
    width: 260px;
    text-align: left;
}

.detailtrai .fa {
    color: black;
    margin-right: 8px;
    font-size: 25px;
}
  main{
    display: grid;
    grid-template-columns: repeat(4,1fr);
     
  }
  .detail_img{
    border-radius: 30px;
    border: 2px solid rgba(43, 193, 184, 1);
    width: 400px;
    margin-right: 40px;
    margin-left: 80px;
    display: flex;
    justify-content: center;
    align-items: center;
    
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

    .box {   
    height: 350px;
    overflow: hidden scroll;
}
.showComment {
    width: 100%;
    border-radius: 10px;
    background: rgba(230, 234, 241, 1);
    padding: 10px;
    margin-top: 25px;
}

.head {
    display: flex;
    align-items: center;
}

.nameinfo {
    flex: 2;
    margin: 15px;
    border-bottom: 1px dashed black;
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
#submit{
    padding: 10px;
    background-color: black;
    color: white;
    border-radius: 10px;
    cursor: pointer;
}
#user_hover{
   background: none;
   border: none;
  
}
#ql_tk{
    font-size: 18px;
}
.detailtrai .fa{
   color: black;

}
.detail_item form{
    margin-top: 20px;
}
.detail_item form .cart{
    background-color: #7380ec;
    color: white;
    
}
.detail_item form .cart:hover{
    background-color: darkgreen;
    transition: 1s;
    color: white;
    
}
.cart{
    font-size:20px; padding: 10px 20px; border: none; background: none; border-radius: 5px; cursor: pointer; margin-top: 20px;  color: #7380ec; border: 2px dashed #7380ec;
}


</style>
<body>
    <div class="container">
        
    <header>
            <div class="tren">
                <div class="left">
                    <div class="logo">
                        <a href="./index.php"><img src="https://www.webomates.com/wp-content/uploads/2020/09/API-300x270.png" alt="" height="85px" width="90px"></a>
                    </div>
                    <nav>
                        <ul>
                            <li><a href=""><i class="fa fa-home"></i>Trang chủ</a></li>
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
                    <form action="./detail.php?id=<?php echo $id?>" method="POST">
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
                        <a href="./view/view-cart.php"> <i class="fas fa-shopping-cart" id="cart"></i></a>
                  
                        <button id="user_hover"> <img id="avatar" height="40px" width="60px" src="<?php echo $_SESSION["avatar"]?>" alt=""></button> <br>
            
                 
                  <?php }?>
                  <a href=""><i class="fas fa-bell"></i></a>
                </div>
            </div>

        </header>
        <main>
          <div class="detailtrai">
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
          </div>
          <div class="detail_img">
          <img src="<?php echo $product["image"] ?>" alt="">
         
          
          
          </div>
          <div class="detail_item">
                        

                        <h1><?php echo $product["productName"] ?></h1>
                        <p id="prdgia">Giá: $<?php echo $product["productPrice"] ?></p>
                        <h3>Mô tả chi tiết:</h3>
                        <span> <?php echo $product["productDesc"] ?></span> <br>
                        <span>Giảm giá: <?php echo $product["sale_off"]?>%</span>
                        <p>Lượt xem: <?php echo $product["view"] ?></p>
                        <strong>Ngày nhập kho: <?php echo $product["date_Added"] ?></strong> <br>
                        <p><?php echo $product["color_red"] ?></p>
                        <p><?php echo $product["color_black"] ?></p>
                        <p><?php echo $product["color_white"] ?></p>
                        <p><?php echo $product["color_green"] ?></p>
                        <?php if(empty($_SESSION["id"])){?>
                            <form action="./view/login.php" method="post">
                                <input type="text" name="id" hidden value="<?php $product["id"] ?>">
                                <div class="count">
                                <button class="giam" type="button">-</button>
                                <input class="so_luong" type="text" min=0 name="so_luong" value="1">                              
                                 <button class="tang" type="button">+</button>
                                </div>
                           <button class="" style="font-size:20px; padding: 10px; border-radius: 5px; cursor: pointer; margin-top: 20px; background:rgba(47, 53, 58, 1); color: white;" >Thêm vào giỏ hàng</button>
                            </form>                     
                            
                 
                        <?php }else{?>
                            <form action="./controller/add_cart.php?id=<?php echo $id?>" method="post">
                                <input type="text" name="id" hidden value="<?php $product["id"] ?>">
                                <div class="count">
                                <button class="giam" type="button">-</button>
                                <input class="so_luong"  min=0 name="so_luong"  value="1" type="" >   
                                                           
                                 <button class="tang" type="button">+</button>
                                </div>
                     
                            <button class="cart" style=" " type="submit" >Thêm vào giỏ hàng</button>
                            </form>

                            <?php }?>
                        </div>
                        </main>
               
          <div class="title">
            <h1>Các sản phẩm tương tự</h1>
          </div>
            <div class="product">
                <?php foreach($category as $value):?>
                <div class="colum">

                <a href="./detail.php?id=<?php echo $value["id"] ?>">
                      <div class="img_product">
                         <img src="<?php echo $value["image"] ?>" alt="">
                         </div> 
                        <h3><?php echo $value["productName"] ?></h3>
                        <p id="prdgia">Giá: <?php echo $value["productPrice"] ?>$</p>
                   
                    <button id="mua_prd">Mua hàng</button> </a>
                </div>
                <?php endforeach?>
            </div>
           <div class="socmt" style="margin-top:50px;">
            <?php foreach($so_cmt as $value): ?>
            <h3>Bình luận( <?php echo $value["So_luong"]?> )</h3>
            <?php endforeach?>
           </div>
       
          <div class="box">
          
          <?php foreach($comments as $value): ?>
            
            <?php $_SESSION["idSP"] = $value["maSP"]?>
                <div class="showComment">
                    <div class="head">
                        <div class="avatar-comment">
                            <img src="<?php echo $value["avatar"]?>" alt="">
                        </div>
                        <div class="nameinfo">
                            <h5 class="namePerson"><?php echo $value["username"]?></h5>
                            <small class="timeComment"><?php echo $value["thoiGianBL"]?></small>
                        </div>
                    </div>
                    <div class="detail-comment">
                        <p class="textComment"><?php echo $value["noidung"]?></p>
                        
                        <?php  
                         if(!empty($_SESSION["id"])){
                            
                          if( $_SESSION["id"] ==$value["maKH"]){
                           ?>
                        <a href="./controller/delete_Detail_cmt.php?id=<?php echo $value["idBL"]?>">Xóa</a>
                       

                        <?php }else{?>
                            <button id="dialog">Trả lời</button> 

<form action="" id="reply" style="display: none;">
    <textarea name="" id="" cols="30" rows="7"></textarea>
    <button type="submit">Gửi</button>
</form>
                            <?php }?>
                            <?php }?>
                           
                    </div>
                </div>
            <?php endforeach ?>
    
          </div>
            <form action="./controller/save_cmt.php?id=<?php echo $id?>" method="POST">
               
                <label for="" style="font-size:20px ; font-weight: 600;">Viết bình luận của bạn</label> <br>
                
                <textarea style="padding: 20px; border: 2px dashed black; border-radius: 10px; margin-top: 10px; font-size: 20px;" name="cmt" id="" cols="70" rows="8" ></textarea>
                <?php if(empty($_SESSION["id"])){?>
                 <a href="./view/login.php" style="font-size:20px; padding:8px;" id="submit" >Gửi</a>  
                 <?php }else{?>
                <button id="submit" type="submit" style="font-size:20px; padding:8px">Gửi</button>
                <?php }?>
            </form>
            
          
          <footer style="margin-top:50px;">
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
     tippy('#user_hover', {
        content: '<a id="dangxuat" href="./controller/log_out.php">Đăng xuất</a> <br> <a id="ql_tk" href="./view/account.php">Quản lý tài khoản</a> ',
        allowHTML: true, 
        placement: 'bottom',
        delay: [0, 1000],
        duration: [0, 1000],
        interactive: true,
      });
      
      $(document).ready(function(){
        $("#dialog").click(function(){
            $("#reply").slideToggle()
        })
    })



  </script>
   <script src="./src/cart.js"></script>
   <script src="./src/sweetalert2.js"></script>
   
</body>


</script>
</html>