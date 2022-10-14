<?php
include "../model/connect.php";
$nameErr = $imageErr = $passErr=$re_passErr = $emailErr =$codeErr= "";
$name = $image = $pass =$email=$re_pass=$code="";
if (isset($_POST["btn-add"])) {
    if (empty($_POST["code"])) {
        $codeErr = "Mã đăng nhập không được bỏ trống";
    } else {
        $code = ($_POST["code"]);
    };
    if (empty($_POST["names"])) {
        $nameErr = "Tên không được bỏ trống";
    } else {
        $name = ($_POST["names"]);
    };

    if (empty($_FILES["image"]["name"])) {
        $imageErr = "Ảnh đại diện không được bỏ trống";
    } else {
        $image = $_FILES["image"]["name"];
    };

    if (empty($_POST["pass"])) {
        $passErr = "Mật khẩu không được bỏ trống";
    } else {
        $pass = ($_POST["pass"]);
    };
   
    if (empty($_POST["email"])) {
        $emailErr = "Email không được bỏ trống";
    } else {
        $email = ($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Sai định dạng mail";
        }
    }

    if (empty($_POST["re_pass"])) {
        $re_passErr = "Xác nhận mật khẩu không được bỏ trống";
    } else if (($_POST["pass"]) != ($_POST["re_pass"])) {
        $re_passErr = "Mật khẩu không trùng khớp";
    } else {
        $re_pass = ($_POST["re_pass"]);
    };
}
if(!empty($_POST["names"]) && !empty( $_FILES["image"]["name"]) && !empty($_POST["pass"]) && !empty($_POST["code"]) && !empty($_POST["re_pass"]) && !empty($_POST["email"])){
    $name = $_POST["names"];
    $query= "select * from users where userName like '$name'";
    $users = getAll($query); 
    if(count($users) != 0){
        $nameErr="Tài khoản đã tồn tại";

    }else{
   $code=$_POST["code"];

    $userName = $_POST["names"];
    $avatar = $_FILES["image"]["name"];
    $password = $_POST["pass"];
  
    $email = $_POST["email"];
    $query = "insert into users(id,username,avatar,password,email) values('$code','$userName','./src/images/$avatar','$password','$email') ";
    connect($query);
    move_uploaded_file($_FILES["image"]["tmp_name"],"../src/images/".$_FILES["image"]["name"]);

    header("location:../admin.php"); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../src/css/sign_up.css">
</head>
<style>
    #err {
        color: red;
        font-size: 20px;
    }
    #dk{
        color: white;
    }
    #dk:hover{
    border: 1px solid red;
    color: red;
    }
</style>

<body>
    <div class="container">
        <h1>Đăng Ký Users</h1>
        <div class="form">
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="">Mã đăng nhập*</label> <br>
                <input type="text" name=" code" id=""> <br>
                <span id="err"><?php echo $codeErr?></span> <br>
                <label for="">Tên người dùng*</label><br>
                <input type="text" name="names" id=""> <br>
                <span id="err"><?php echo $nameErr ?></span> <br>
                <label for="">Ảnh đại diện*</label> <br>
                <input type="file" name="image"><br>
                <span id="err"><?php echo $imageErr ?></span> <br>
                <label for="">Mật khẩu*</label> <br>
                <input type="password" name="pass" id=""> <br>
                <span id="err"><?php echo $passErr ?></span> <br>
                <label for="">Xác nhận mật khẩu*</label> <br>
                <input type="password" name="re_pass" id=""> <br>
                <span id="err"><?php echo $re_passErr ?></span> <br>
                <label for="">Email*</label><br>
                <input type="text" name="email" id=""> <br>
                <span id="err"><?php echo $emailErr ?></span> <br>

                <button id="dk" type="submit" name="btn-add">Đăng ký ngay</button>

            </form>
        </div>
    </div>
</body>

</html>