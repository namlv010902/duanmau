<?php
    include "../model/connect.php";
    $query="SELECT * FROM category";
    $category=getAll($query);
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
       
    if(!empty($_POST["names"]) && !empty($_FILES["images"]["name"]) && !empty($_POST["price"]) && !empty($_POST["sale_off"]) && !empty($_POST["categoryId"]) && !empty($_POST["desc"]) && !empty($_POST["trang_thai"])){
        $name=$_POST["names"];
        $image=$_FILES["images"]["name"];
        $price = $_POST["price"];
        $sale_off = $_POST["sale_off"];      
        $category=$_POST["categoryId"];
        $desc = $_POST["desc"];
        $trang_thai= $_POST["trang_thai"];
        $query="INSERT INTO products(image,productName,productPrice,sale_off,categoryId,productDesc,dac_biet) values('./src/images/$image','$name','$price','$sale_off','$category','$desc','$trang_thai')";
        connect($query);
        move_uploaded_file($_FILES["images"]["tmp_name"],"../src/images/".$_FILES["images"]["name"]);
        header("location:../admin.php");
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
    <?php var_dump($_POST)?>
    <h1>Add new products</h1>
    <form action="./add-product.php" method="POST" enctype="multipart/form-data">

     <label for="">Product Name</label><br>
     <input type="text" name="names"><br>
     <span id="err"><?php echo $nameErr?></span><br>
    
     <label for="">Image</label><br>
     <input type="file" name="images"><br>
     <span id="err"><?php echo $imageErr?></span><br>

     <label for="">Price</label><br>
     <input type="number" name="price" min="0"><br>
     <span id="err"><?php echo $priceErr?></span><br>

     <label for="">Sale Off</label><br>
     <input type="text" name="sale_off"><br>
     <span id="err"><?php echo $sale_offErr?></span><br>
     <label for="">Hàng đặc biệt ?</label> <br>
     <input type="radio" name="trang_thai" id="" value="Bình thường"> Bình thường
     <input type="radio" name="trang_thai" id="" value="Đặc biệt"> Đặc biệt <br>
     <span id="err"><?php echo $trang_thaiErr?></span> <br>
     <label for="">Category</label><br>
     <select name="categoryId" id="">
        <option value="" hidden>Lựa chọn danh mục</option>
        <?php foreach($category as $value):?>
        <option value="<?php echo $value["id"]?>"><?php echo $value["categoryName"]?></option>
        <?php endforeach?>
     </select><br>
     <span id="err"><?php echo $categErr?></span><br>
      <label for="">Product Desc</label> <br>
    <textarea name="desc" id="" cols="70" rows="10"></textarea> <br>
    <span id="err"><?php echo $descErr?></span> <br>
      <button type="submit" name="login">Submit</button>

    </form>
</body>
</html>