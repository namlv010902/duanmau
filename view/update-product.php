<?php
    include "../model/connect.php";
    $id= $_GET["id"];
    $query="SELECT * FROM category";
    $category=getAll($query);
    $query1 = "SELECT * FROM products where id=$id";
    $product = getOne($query1);
    
    $nameErr=$imageErr=$categErr=$priceErr=$sale_offErr=$descErr=$trang_thaiErr="";
    $name=$image=$cate=$price=$sale_off=$desc=$trang_thai="";
    if(isset($_POST["login"])){
        if(empty($_POST["names"])){
            $nameErr="Name is required";
        }else{
            $name=$_POST["names"];
        }
        if(empty($_FILES["images"]["name"])){
            $imageErr="Image is required";  
        }else{
            $image=$_FILES["images"]["name"];
        }
        if(empty($_POST["price"])){
            $priceErr="Price is required";
        }else{
            $price=$_POST["price"];
        }
        if(empty($_POST["sale_off"])){
            $sale_offErr="Sale Off is required";
        }else{
            $sale_off=$_POST["sale_off"];
        }
        
        if(empty($_POST["categoryId"])){
            $categErr="Category is required";
        }else{
            $cate=$_POST["categoryId"];
        }
        if(empty($_POST["desc"])){
            $descErr="Desc is required";
        }else{
            $desc=$_POST["desc"];
        }
        if(empty($_POST["trang_thai"])){
            $trang_thaiErr="Trạng thái is required";
        }else{
            $trang_thai=$_POST["trang_thai"];
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
</head>
<style>
    #err{
        color: red;
        font-size: 20px;
    }
</style>
<body>
    <h1>Update products</h1>
    <form action="../controller/save-update-product.php"method="POST" enctype="multipart/form-data">
     <input type="text" name="id" hidden value="<?php echo $product["id"]?>"> <br>
     <label for="">Product Name</label><br>
     <input type="text" name="names" value="<?php echo $product["productName"] ?>"><br>
     <span id="err"><?php echo $nameErr?></span><br>

     <label for="">Image</label><br>
     <input type="file" name="images" value="<?php echo $product["image"]?>"><br>
     <span id="err"><?php echo $imageErr?></span><br>

     <label for="">Price</label><br>
     <input type="number" name="price" min="0" value="<?php echo $product["productPrice"]?>"><br>
     <span id="err"><?php echo $priceErr?></span><br>

     <label for="">Sale Off</label><br>
     <input type="text" name="sale_off" value="<?php echo $product["sale_off"]?>"><br>
     <span id="err"><?php echo $sale_offErr?></span><br>

     <label for="">Hàng đặc biệt ?</label> <br>
     <input type="radio" name="trang_thai" id="" value="Bình thường" checked> Bình thường
     <input type="radio" name="trang_thai" id="" value="Đặc biệt"> Đặc biệt <br>
     <span id="err"><?php echo $trang_thaiErr?></span> <br>

     <label for="">Category</label><br>
     <select name="categoryId" id="">
        <?php foreach($category as $value):?> 
        <option value="<?php echo $value["id"]?>"><?php echo $value["categoryName"]?></option>
        <?php endforeach?>
     </select><br>
     <span id="err"><?php echo $categErr?></span><br>

      <label for="">Product Desc</label> <br>
    <textarea name="desc" id="" cols="70" rows="10"><?php echo $product["productDesc"]?></textarea> <br>
    <span id="err"><?php echo $descErr?></span> <br>

      <button type="submit" name="login">Submit</button>

    </form>
</body>
</html>