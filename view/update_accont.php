<?php
include "../model/connect.php";
session_start();
$id= $_SESSION["id"];
$query = "SELECT * FROM users where id like n'$id' ";
$user= getOne($query);
$nameErr = $passErr=$codeErr = $emailErr = "";
$name = $pass =$email=$code="";
if (isset($_POST["btn-add"])) {
    if(empty($_POST["code"]) || empty($_POST["names"]) || empty($_POST["code"]) || empty($_POST["pass"]) || empty($_POST["email"]) ){
    if (empty($_POST["code"])) {
        $codeErr = "Mã đăng nhập is required";
    } else {
        $code = ($_POST["code"]);
    };
    if (empty($_POST["names"])) {
        $nameErr = "Name is required";
    } else {
        $name = ($_POST["names"]);
    };
    if (empty($_POST["pass"])) {
        $passErr = "Pass is required";
    } else {
        $pass = ($_POST["pass"]);
    };
    
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = ($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

   
}else{
    $code= $_POST["code"];
    $userName = $_POST["names"];
    $password = $_POST["pass"];
    $email = $_POST["email"];
    if(empty($_FILES["image"]["name"])){
        $avatar = $user["avatar"];
     }else{
        $avatar ='./src/images/'.$_FILES["image"]["name"];
        $_SESSION["avatar"]=$avatar;
     }
     
    $query = "UPDATE users SET id='$code', username='$userName', password='$password',email='$email', avatar='$avatar' where id like n'$id' ";
    $_SESSION["id"]=$code;
    $_SESSION["username"]=$userName;
    $_SESSION["email"]=$email;
    
  
    connect($query);
    move_uploaded_file($_FILES["image"]["tmp_name"],"../src/images/".$_FILES["image"]["name"]);
    header("location:./account.php"); 
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
</style>

<body>
    <a href="./account.php">Trở về</a>
    <div class="container">
        <h1>Chỉnh sửa hồ sơ</h1>
        <div class="form">
            <form action="./update_accont.php" method="POST" enctype="multipart/form-data">
                <label for="">Mã đăng nhập*</label> <br>
                <input type="text" name="code" id="" value="<?php echo $user["id"]?>"> <br>
                <span id="err"><?php echo $codeErr?></span> <br>
                <label for="">Tên đăng nhập*</label> <br>
                <input type="text" name="names" id=""  value="<?php echo $user["username"]?>"> <br>
                <span id="err"><?php echo $nameErr ?></span> <br>
                <label for="">Ảnh đại diện*</label> <br>
                <input type="file" name="image"  value="<?php echo $user["avatar"]?>"><br>
          
                <label for="">Password*</label> <br>
                <input type="password" name="pass" id=""  value="<?php echo $user["password"]?>"> <br>
                <span id="err"><?php echo $passErr ?></span> <br>
                <label for="">Email*</label><br>
                <input type="text" name="email" id=""  value="<?php echo $user["email"]?>"> <br>
                <span id="err"><?php echo $emailErr ?></span> <br>

                <button type="submit" name="btn-add">Submit</button>

            </form>
        </div>
    </div>
</body>

</html>