<?php
ob_start();
include "../model/connect.php";
session_start();
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    if (!empty($_SESSION["cart"])) {
        $cart = $_SESSION["cart"];
    }
}
$phi_van_chuyen = 10;
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    if (isset($_POST["submit"])) {
        if (!empty($_POST["ten"]) && !empty($_POST["sdt"]) && !empty($_POST["diachi"])) {
            $price = $product["productPrice"];
            $ten = $_POST["ten"];
            $sdt = $_POST["sdt"];
            $diachi = $_POST["diachi"];
            $pay = $_POST["pay"];
            $satus = $_POST["status"];
            $total = $_SESSION["total"];
            $count_money2 = $_SESSION["money"] ;
            $query5 = "INSERT INTO oder(name,adress,phone,pay,status,total,id_user,phi_van_chuyen,total_product) 
                    values('$ten', '$diachi', '$sdt','$pay','$satus','$total','$id','$phi_van_chuyen','$count_money2')";
            connect($query5);
            if (!empty($query5)) {
                $sql = "SELECT * from oder where name like n'$ten' and phone like '$sdt' ";
                $order = getOne($sql);
                $id_oder = $order["id"];

                foreach ($cart as $value) {

                    $query6 = "INSERT INTO oder_detail(id_oder,id_product,quantity,price)
                         values('$id_oder', '$value[id]', '$value[quantity]','$value[productPrice]')";
                    connect($query6);
                    unset($_SESSION["cart"]);
                    header("location:./thongbaodh.php");
                }
            }
        }
    }
}
$tong_tien = 0;
$tong_tien2 = 0;

$count_money = 0;

$query2 = "SELECT * FROM products where categoryId = 1";
$product = getAll($query2);

$ten = $sdt = $diachi = "";
$tenErr = $sdtErr = $diachiErr = "";
if (isset($_POST["submit"])) {

    if (empty($_POST["ten"])) {
        $tenErr = "Nhập tên";
    }
    if (empty($_POST["sdt"])) {
        $sdtErr = "Nhập sdt";
    }
    if (empty($_POST["diachi"])) {
        $diachiErr = "Nhập địa chỉ";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gio hàng</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../src/css/index.css">
    <script src="https://kit.fontawesome.com/969bec5078.js" crossorigin="anonymous"></script>


</head>
<style>
    #nhan2, #nhan{
        color: white;
        
        background-color: #7380ec;
        
    }
    article .fa {
        color: rgba(43, 193, 184, 1);
    }

    .detail_img {
        border-radius: 30px;
        border: 2px solid rgba(43, 193, 184, 1);
        width: 400px;
        margin-right: 40px;
        margin-left: 80px;
    }

    .detail_item {
        width: 620px;
    }

    .detail_img img {
        width: 100%;
        border-radius: 30px;
    }

    #avatar {
        border-radius: 50%;
    }

    #dangxuat {
        font-size: 18px;
        margin: 0 5px;
    }

    #cartt {
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

    footer {
        margin-top: 50px;
    }

    table,
    tr,
    td,
    th {
        border-collapse: collapse;
        text-align: center;
        padding: 10px;


    }

    table,
    tr,
    th,
    td {
        border: none;
    }

    td {
        background-color: white;

    }

    tr {
        border-bottom: 5px solid rgba(230, 234, 241, 1);
    }

    table {
        width: 70%;
        margin-left: 30px;
    }

    #img {
        width: 200px;
        height: 50px;

    }

    td img {
        width: 50%;


    }

    td {
        height: 70px;

        font-size: 20px;
    }

    #tt {
        height: 30px;
    }

    th {
        background-color: rgba(108, 93, 211, 1);
        color: white;
        border: none;
    }

    #update a {
        border: 1px solid gray;
        padding: 0 5px;
        font-size: 20px;
        color: black;

    }

    #update {
        display: flex;
        align-items: center;
        justify-content: center;

    }

    #ql_tk {
        font-size: 18px;
    }

    .cart_right input {
        background-color: white;
        width: 500px;
        font-size: 20px;
        padding: 10px;
        color: black;
        border: 2px solid #7380ec;
        border-radius: 5px;

    }

    .cart_right label {
        font-size: 25px;

    }

    #img {
        height: 10px;
    }

    #err {
        color: red;
        font-size: 18px;
    }

    #tencart {
        text-align: left;
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
                    <?php if (empty($_SESSION["id"])) { ?>
                        <a href="./login.php"><i class="fas fa-shopping-cart" id="cart"></i></a>
                        <a href="./login.php"><i class="fas fa-user" id="user"></i></a>


                    <?php } else { ?>
                        <a href="./view-cart.php"> <i class="fas fa-shopping-cart" id="cart"></i></a>

                        <img id="avatar" class="user_hover" height="40px" width="60px" src=".<?php echo $_SESSION["avatar"] ?>" alt=""> <br>


                    <?php } ?>
                    <a href=""><i class="fas fa-bell"></i></a>
                </div>
            </div>

        </header>
        < <main>

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

            <?php if (!empty($cart)) { ?>

                <div class="cart_right" style="width: 80%; display: flex; ">

                    <div class="show_form">
                        <h1 style="text-align:center; margin-bottom: 20px; ">Thông tin địa chỉ nhận hàng</h1>
                        <form action="" method="post" id="info">

                            <label for="">Họ & tên:</label> <br>
                            <input type="text" name="ten" id="" value="<?php echo $_SESSION["username"] ?>"> <br>

                            <label for="">Số điện thoại:</label> <br>
                            <input type="number" name="sdt" id=""> <br>
                            <span id="err"><?php echo $sdtErr ?></span> <br>
                            <label for="">Địa chỉ cụ thể:</label> <br>
                            <input type="text" name="diachi" id=""> <br>
                            <span id="err"><?php echo $diachiErr ?></span> <br>
                            <input type="text" name="pay" id="" value="1" hidden>
                            <input type="text" name="status" id="" value="1" hidden>
                            <label for="">Chọn hình thức thanh toán</label> <br>
                            <input type="radio" name="oder" value="" id="truc_tuyen">Thanh toán trực tuyến <br>
                             <p style="display: none;" id="nhan" >Thanh toán qua ví điện tử</p>
                            <input type="radio" name="oder" id="truc_tuyen2">Nhận hàng rồi thanh toán <br>
                            <p style="display: none;" id="nhan2">Nhận hàng, kiểm tra rồi ms thanh toán</p>
                            <button onclick="return confirm('Bạn chắc chứ ')" type="submit" name="submit" style="font-size:20px; padding: 10px 15px; background: linear-gradient(90deg,#97c93d,#4fba69);

                             color: white; margin-top: 20px; border:none">Đặt hàng</button>
                        </form>
                    </div>
                    <div class="showtien">
                        <h1 style="text-align: center;">Giỏ hàng</h1>
                        <table border="1" style="width: 100%;">
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

                                <?php foreach ($cart as $id => $product) : ?>
                                    <tr>
                                        <td><img src="<?php echo $product["images"] ?>"></td>
                                        <td><?php echo $product["productName"] ?></td>
                                        <td><?php echo $product["productPrice"] ?></td>
                                        <td id="update"><a id="delete" href="./update_cart.php?id=<?php echo $id ?>&type=decre">-</a> <?php echo $product["quantity"] ?>
                                            <a href="./update_cart.php?id=<?php echo $id ?>&type=incre">+</a>
                                        </td>
                                        <td><?php $result = $product["productPrice"] * $product["quantity"];
                                            echo $result ?></td>
                                        <td> <a href="./delete_cart.php?id=<?php echo $id ?>">X</a> </td>
                                    </tr>
                                    <?php $count_money = $count_money + $result ?>
                                <?php endforeach ?>
                                <tr>
                                    <th id="tt" colspan="6">Tổng tiền: _ $<?php echo $count_money; 
                                    $_SESSION["money"]=$count_money ?></th>

                                </tr>


                            </tbody>
                        </table>
                        <h3>Phí vận chuyển: <?php echo $phi_van_chuyen ?></h3>

                        <?php $tong_tien = $count_money + $phi_van_chuyen ?>

                        <form action="" method="POST">
                            Nhập mã voucher 
                            <input type="text" name="voucher" value="" id="voucher" oninput="return ca()">
                            <?php if(!empty($_POST["voucher"])){?>
                            <button name="ap_ma" >áp mã</button>
                            <?php }else{ ?>
                                <button name="ap_ma" id="ap" disabled  style="background-color:lavender; font-size: 20px;padding: 5px;">áp mã</button>

                                <?php }?>
                        </form>

                        <?php

                        $query = "SELECT * FROM voucher";
                        $voucher = getAll($query);
                        $index = 0;
                        if (isset($_POST["ap_ma"])) {
                            if(!empty($_POST["voucher"])){
                               
                            
                            foreach ($voucher as $value) {
                                //   var_dump($value["giam"]);

                                if ($_POST["voucher"] == $value["id"]) {
                                    $giam = $value["giam"];
                                    echo "$giam";
                                    $tong_tien2 = $tong_tien - $giam;
                                    $index += 1;
                                    $_SESSION["total"] = $tong_tien2;
                                }
                            }
                            if ($index == 0) {
                                echo "Mã ko trùng";
                                $tong_tien2 = $tong_tien;

                            }
                        }
                       
                    }else {
                        $tong_tien2 = $tong_tien;
                        $_SESSION["total"] = $tong_tien2;
                    }


                        ?>


                        <span style="display: flex; justify-content:right; margin-right:100px; font-size:30px; color: red;">
                            Tổng tiền tạm tính: $<?php echo $tong_tien2 ?></span>

                        <?php

                       

                        ?>
                    </div>

                </div>
            <?php } ?>

            </main>




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
<script>
    $(document).ready(function(){
        $("#truc_tuyen").click(function(){
            $("#nhan").slideToggle()
        })
    })
    $(document).ready(function(){
        $("#truc_tuyen2").click(function(){
            $("#nhan2").slideToggle()
        })
    })
 
    var button = document.querySelector("#ap");
    var input = document.querySelector("#voucher");
    function ca() {
      console.log(input);
      console.log(button.disabled);
      if(input.value!=""){
        button.disabled = false;
      }else{
        button.disabled=true;
      }
      
    }
   
    </script>
</html>