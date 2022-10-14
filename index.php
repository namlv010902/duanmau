<?php
     session_start();
 
     
     include "./model/connect.php";
  
if (empty($_POST["search"])) {
    $query = "select * from products where categoryId=3";
    $pho_bien = getAll($query);
} else {
    $search = $_POST["search"];
    $query = "select * from products where categoryId=3 and productName like '%$search%'";
    $pho_bien = getAll($query);
}

if (empty($_POST["search"])) {
    $query = "select * from products where categoryId=1";
    $giam_gia = getAll($query);
} else {
    $search = $_POST["search"];
    $query = "select * from products where categoryId=1 and productName like '%$search%'";
    $giam_gia = getAll($query);
}

if (empty($_POST["search"])) {
    $query = "select * from products where categoryId=2";
    $moi_nhat = getAll($query);
} else {
    $search = $_POST["search"];
    $query = "select * from products where categoryId=2 and productName like '%$search%'";
    $moi_nhat = getAll($query);
}

if (!empty($_POST["price"])) {
    $price = $_POST["price"];
    $query = "SELECT * FROM products where categoryId=3 and productPrice <= $price ";
    $pho_bien = getAll($query);
}
if (!empty($_POST["price"])) {
    $price = $_POST["price"];
    $query = "SELECT * FROM products where categoryId=1 and productPrice <= $price ";
    $giam_gia = getAll($query);
}
if (!empty($_POST["price"])) {
    $price = $_POST["price"];
    $query = "SELECT * FROM products where categoryId=2 and productPrice <= $price ";
    $moi_nhat = getAll($query);
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siêu thị điện máy API</title>
   
    <link rel="shortcut icon" href="./src/images/logoap.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/index.css">
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css"/>
    <script src="https://kit.fontawesome.com/969bec5078.js" crossorigin="anonymous"></script>
    
</head>
<style>
    #cart:hover {
        color: yellow;
    }

    #user:hover {
        color: lime;
    }

    .img_banner img {
        border-radius: 20px;
        height: 400px;
        margin: 0 3px;
    }

    .slick-prev {
        position: absolute;
        top: 44%;
        left: 0%;
        transform: translateX(-50%);
        z-index: 2;
        border-radius: 100%;
        padding: 10px;
        background: none;
        color: rebeccapurple;

    }

    .slick-next {
        position: absolute;
        top: 50%;
        right: 0%;
        transform: translateY(-50%);
        z-index: 2;
        border-radius: 100%;
        padding: 10px;
        background: none;
        transition: 2s;
    }

    .slick-next .fas,
    .slick-prev .fas {
        font-size: 30px;


    }

    .slick-dots li {
        display: inline-block;

    }

    .slick-dots .slick-active button {
        background-color: rgba(43, 193, 184, 1);
        transition: 2s;
    }

    .slick-dots button {
        font-size: 0;
        border-radius: 100%;
        height: 20px;
        width: 20px;
        border: none;
        background-color: lightgray;
    }

    .slick-dots {
        position: absolute;
        transform: translate(-50%, 30px);
        bottom: 0;
        left: 50%;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    article .fa{
       color: rgba(43, 193, 184, 1);
       

    }
    #avatar{
        border-radius: 50%;
       
    }
    #dangxuat{
        font-size: 18px;
        margin: 0 5px;
    }
    #user_hover{
        background: none;
    }
    #ql_tk{
        font-size: 18px;
    }
</style>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

<body>

    <div class="container">

        <header>
            <div class="tren">
                <div class="left">
                    <div class="logo">
                        <a href="./index.php"><img src="https://www.webomates.com/wp-content/uploads/2020/09/API-300x270.png" alt="" height="110px" width="120px"></a>
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
                    <form action="./index.php" method="POST">
                        <select name="" id="">
                            <option value="">Tất cả sản phẩm</option>
                        </select>
                        <input type="text" name="search" placeholder="Tìm kiếm sản phẩm...">
                        <button id="search" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="phai">
                    <?php if(empty($_SESSION)){ ?>
                        <a href="./view/login.php"><i class="fas fa-shopping-cart" id="cart"></i></a>
                    <a href="./view/login.php"><i class="fas fa-user" id="user"></i></a>
                   
                 
                    <?php }else{ ?>
                        <a href="./view/view-cart.php"> <i class="fas fa-shopping-cart" id="cart"></i></a>
                  
               <button id="user_hover"><img id="avatar" height="40px" width="60px" src="<?php echo $_SESSION["avatar"]?>" alt=""> </button> <br>
                 
                  <?php }?>
                  <a href=""><i class="fas fa-bell"></i></a>
                </div>
            </div>

        </header>
        <main>
            <article>
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
            <div class="main">
                <div class="img_banner">
                    <img id="banner" src="https://salt.tikicdn.com/ts/tmp/3f/2a/20/e10d195a4cd02ac4d7df832817e7b0d5.jpg" alt="">
                    <img id="banner" src="https://salt.tikicdn.com/ts/tmp/92/7c/f5/23e987969bb7998e3228270b0534b527.jpeg" alt="">
                    <img id="banner" src="https://dienmaythiennamhoa.vn/static/images/TASK%20371%20BANNER%20848X424.jpg" alt="">
                    <img id="banner" src="https://salt.tikicdn.com/ts/tmp/fd/25/6d/d763744c7d5422e67172d2ce95a277d5.jpg" alt="">
                    <img id="banner" src="http://file.hstatic.net/1000347078/collection/banner_apple_3c8f4302655746f794223bcf2d6ec1cc.jpg" alt="">

                </div>
                <div class="chitiet">
                    <div class="free200">
                        <i class="fa fa-map-marked-alt"></i>
                        <h1>Miễn phí giao hàng</h1>
                        <p>Đơn hàng trên 200k</p>
                    </div>
                    <div class="chamsoc">
                        <i class="fa fa-phone-volume"></i>
                        <h1>Chăm sóc khách hàng</h1>
                        <p>Liên tục 24/7/365</p>
                    </div>
                    <div class="khuyenmai">
                        <i class="fa fa-recycle"></i>
                        <h1>Đổi trả hàng</h1>
                        <p>Đổi trả hàng trong 7 ngày</p>
                    </div>
                </div>
            </div>
            <aside>
                <div class="sale">
                    <button id="giam">Giảm giá!</button>
                    <div class="tulanh">
                        <img src="https://sieuthidienmay2.shostweb.com/wp-content/uploads/2021/09/Group-7881-600x600-1.png" alt="">
                    </div>
                    <div class="item">
                        <h3>Tủ lạnh KF BCD446W</h3>
                        <div class="star">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>

                        </div>
                        <span><del>30.000.000đ</del> 25.000.000đ</span>

                        <button id="mua">Mua ngay</button>


                    </div>
                </div>
            </aside>
        </main>
        <div class="category">
            <div class="columcate">
                <div class="cateName">
                    <h3>Apple
                        <p>Hàng mới</p>
                    </h3>
                    <button>Mua ngay</button>
                </div>

                <img id="lap" src="https://sieuthidienmay2.shostweb.com/wp-content/uploads/2021/09/Surface-Studio.png" alt="">

            </div>
            <div class="columcate" id="catehai">
                <div class="cateName">
                    <h3>Drone

                        <p> Flycams</p>
                    </h3>
                    <button>Mua ngay</button>
                </div>
                <img src="https://sieuthidienmay2.shostweb.com/wp-content/uploads/2021/09/drone_PNG204.png" alt="">
            </div>
            <div class="columcate" id="cateba">
                <div class="cateName">
                    <h3>Dọn dẹp
                        <p> Nhà của bạn</p>
                    </h3>
                    <button>Mua ngay</button>
                </div>
                <img src="https://sieuthidienmay2.shostweb.com/wp-content/uploads/2021/09/Mask-Group-2.png" alt="">
            </div>
            <div class="columcate" id="catebon">
                <div class="cateName">
                    <h3>Cà phê
                        <p>
                            Xây tự động
                        </p>
                    </h3>
                    <button>Mua ngay</button>
                </div>
                <img src="https://sieuthidienmay2.shostweb.com/wp-content/uploads/2021/09/Group-7734.png" alt="">
            </div>

        </div>

        <h2>Lọc giá sản phẩm</h2>
        <form id="form" action="./index.php" method="POST" onchange="change()">
            <input id="locgia" type="range" name="price" id="" min="0" max="1000">
            <span id="price"></span>
            <button id="loc" type="submit">Lọc</button>
        </form>
        <div class="title">
            <h1>Phổ biến nhất</h1>
            <a href=""> <button>Xem thêm ></button></a>
        </div>
        <div class="product">
            <?php foreach ($pho_bien as $value) : ?>
                <div class="colum">
                    <a href="./detail.php?id=<?php echo $value["id"]?><?php ?>">
                       <div class="img_product">
                        <img src="<?php echo $value["image"] ?>" alt="">
                        </div> 
                        <h3><?php echo $value["productName"] ?></h3>
                        <div class="star">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            
                        </div> 
                        <p id="prdgia">Giá: $<?php echo $value["productPrice"] ?></p>
                    </a>
                    <button id="mua_prd">Mua hàng</button>

                </div>
            <?php endforeach ?>
        </div>
        <div class="title">
            <h1>Giảm giá</h1>
            <a href=""> <button>Xem thêm ></button></a>
        </div>
        <div class="product">
            <?php foreach ($giam_gia as $value) : ?>
                <div class="colum">
                <a href="./detail.php?id=<?php echo $value["id"]?>">
                    <div class="img_product">
                  <img src="<?php echo $value["image"] ?>" alt="">
                    </div>
                    <h3><?php echo $value["productName"] ?></h3>
                    <p id="prdgia">Giá: $<?php echo $value["productPrice"] ?></p>
                    <button id="mua_prd">Mua hàng</button>
                    </a> 

                </div>
            <?php endforeach ?>
        </div>
        <section>
            <div class="leftt">
                <h1>Apple
                    <p>
                        Theo dõi sức khỏe </p>
                </h1>
                <button>Mua ngay</button>
                <img src="https://sieuthidienmay2.shostweb.com/wp-content/uploads/2021/09/apple-watch.png" alt="">
            </div>
            <div class="center">
                <div class="red">
                    <div class="itemm">
                        <h1>Sản phẩm cao cấp
                            <p>Âm thanh sống động</p>
                        </h1>
                        <button>Mua ngay</button>
                    </div>
                    <img src="https://sieuthidienmay2.shostweb.com/wp-content/uploads/2021/09/headphone.png" alt="">
                </div>
                <div class="black">
                    <div class="itemm">
                        <h1>Thiết kế tối giản

                            <p> Cảm giác âm nhạc tốt hơn </p>
                        </h1>

                        <button>Mua ngay</button>
                    </div>
                    <img src="https://sieuthidienmay2.shostweb.com/wp-content/uploads/2021/09/am-thanh.png" alt="">
                </div>

            </div>
            <div class="rightt">
                <h1>Giấc mơ
                    <p> Nikon Ultimate Zoom Picture</p>
                </h1>
                <button>Mua ngay</button>
                <img src="https://sieuthidienmay2.shostweb.com/wp-content/uploads/2021/09/may-anh.png" alt="">
            </div>
        </section>
        <div class="title">
            <h1>Sản phẩm mới nhất</h1>
            <a href=""> <button>Xem thêm ></button></a>
        </div>
        <div class="product">
            <?php foreach ($moi_nhat as $value) : ?>
                <div class="colum">
                    <a href="./detail.php?id=<?php echo $value["id"] ?>">
                      <div class="img_product">
                         <img src="<?php echo $value["image"] ?>" alt="">
                         </div> 
                        <h3><?php echo $value["productName"] ?></h3>
                        <p id="prdgia">Giá: $<?php echo $value["productPrice"] ?></p>
                    </a>
                    <button id="mua_prd">Mua hàng</button>

                </div>
            <?php endforeach ?>
        </div>
        <div class="title">
            <h1>ƯU ĐÃI THANH TOÁN</h1>
        </div>
        <div class="thanhtoan">
            <div class="colum_tt">
                <img src="https://cdn.tgdd.vn/2022/06/banner/EXB-500k-380x200-2.png" alt="">
            </div>
            <div class="colum_tt">
                <img src="https://cdn.nguyenkimmall.com/images/companies/_1/PARTNERSHIP/Bank/BIDV/2022/BIDV_936x376.png" alt="">
            </div>
            <div class="colum_tt">
                <img src="https://cdn.nguyenkimmall.com/images/companies/_1/PNS/2022/T62022/Bank/Web-936x376_2.webp" alt="">
            </div>

            <div class="colum_tt">
                <img src="https://cdn.nguyenkimmall.com/images/companies/_1/PARTNERSHIP/Bank/VIB/VIB%20QR/936x376.jpg" alt="">
            </div>


            <div class="colum_tt">
                <img src="https://cdn.tgdd.vn/2022/09/banner/Desk-380x200-1.jpg" alt="">
            </div>
            <div class="colum_tt">
                <img src="https://cdn.tgdd.vn/2022/04/banner/VIB-380x200-1.png" alt="">
            </div>
        </div>
       
        <div class="doitac">
            <div class="img-doitac">
                <img src="https://sieuthidienmay2.shostweb.com/wp-content/uploads/2021/09/logo1.svg" alt="">
            </div>
            <div class="img-doitac">
                <img src="https://sieuthidienmay2.shostweb.com/wp-content/uploads/2021/09/logo2.svg" alt="">
            </div>
            <div class="img-doitac">
                <img src="https://sieuthidienmay2.shostweb.com/wp-content/uploads/2021/09/logo3.svg" alt="">
            </div>
            <div class="img-doitac">
                <img src="https://sieuthidienmay2.shostweb.com/wp-content/uploads/2021/09/logo4.png" alt="">
            </div>
            <div class="img-doitac">
                <img src="https://sieuthidienmay2.shostweb.com/wp-content/uploads/2021/09/logo5.svg" alt="">
            </div>

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
    <script src="./src/app.js"></script>
    <script src="./src/slider.js"></script>
   <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
   <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
   <script>
     tippy('#user_hover', {
        content: '<a id="dangxuat" href="./controller/log_out.php">Đăng xuất</a> <br> <a id="ql_tk" href="./view/account.php?id=<?php echo $_SESSION["id"]?>">Quản lý tài khoản</a> ',
        allowHTML: true, 
        placement: 'bottom',
        delay: [0, 1000],
        duration: [0, 1000],
        interactive: true,
      });
  </script>
</body>
<noscript>
    
<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WJZQSJF" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<script>
    $(document).ready(function() {
        $('.thanhtoan').slick({
            slidesToShow: 3,
            arrows: true, // mất button
            autoplay: true,
            autoplaySpeed: 2000,
            dots: true,

            prevArrow: `<button type='button' class='slick-prev pull-left'><i class="fas fa-chevron-left"></i></button>`,
            nextArrow: `<button type='button' class='slick-next pull-right'><i class="fas fa-chevron-right"></i></i></button>`


        });
    });
</script>

</html>