<?php
 session_start();
 include "../model/connect.php";
 $id_oder = $_GET["id"];
 $query = "SELECT * FROM oder join oder_detail on oder.id = oder_detail.id_oder
 Join products ON oder_detail.id_product = products.id
 where oder_detail.id_oder = $id_oder";
 $deatl = getAll($query);
   $query2 = "SELECT * FROM oder where id =$id_oder ";
   $info  = getOne($query2);
   
//    var_dump($id_oder);die;
// foreach($deatl as $value){
//    if($id_oder != $value["id_rder"]){
//     echo "Rỗng";
//    }
// }
//  echo "<prev>";
//  var_dump($dnam);die;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
        
    
   <p>Tên:<?php echo $info["name"] ?></p>
    <p>Sdt: <?php echo $info["phone"] ?></p>
    <p>Địa chỉ:<?php echo $info["adress"] ?></p>
    <p>Ngày đặt:<?php echo $info["date"] ?></p>
    <p>Trạng thái đơn hàng:
        <?php
        if($info["status"]==1){ ?>
            Đang xử lý
     <?php   }else if($info["status"]==2){ ?>
             Đang vận chuyển
   <?php  }else if($info["status"]==3){ ?>
            Đã nhận hàng
   <?php } else if($info["status"]==4){ ?>
          Đã hủy
  <?php } ?>
       

    </p>
    <form action="../controller/update_status.php?id=<?php echo $id_oder?>" method="POST">
        <select name="status" id="">

            <option value="1" hidden>Đang xử lý</option>
            <option value="2">Đang vận chuyển</option>
            <option value="3">Đã nhận hàng</option>
            <option value="4">Đã hủy</option>
            
        </select>
        <button>Cập nhật</button>
    </form>
     <a href="" >Thêm sản phẩm vào đơn hàng</a> 
     <table border="1" style="text-align:center;margin-top: 30px ;">
        <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>ảnh</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Xóa</th>
           
        </tr>
        </thead>
        <tbody>
       
   <?php foreach($deatl as $value):?>
            <tr>
                <td> <?php echo $value["productName"] ?></td>
                <td><img width="20%" src="<?php echo $value["image"] ?>" alt=""></td>
                <td> <?php echo $value["price"] ?></td>
              
                <td style="">
                    <a href="../controller/update_oder.php?id=<?php echo $value["id_oder"]?>&idsp=<?php echo $value["id"]?>&type=decre">-</a>
                  <?php echo $value["quantity"] ?>
                    <a href="../controller/update_oder.php?id=<?php echo $value["id_oder"]?>&idsp=<?php echo $value["id"]?>&type=incre">+</a></td>
                <td><a href="">Xóa</a></td>
            </tr>
            <?php endforeach?>
           <td style="text-align: center;" colspan="4">Tổng tiền hàng: <?php echo $info["total_product"]?></td>
        </tbody>
     </table>
     <h3>Phí vận chuyển: <?php echo $info["phi_van_chuyen"]?></h3>
     <h2 style="color:red">Tổng thanh toán: <?php echo $info["total"]?></h2>
     <a href="" style="font-size: 30px;color: green;">Cập nhật lại đơn hàng</a>
     <a style="font-size: 30px;" href="../controller/huy_don_hang.php?id=<?php echo $id_oder?>">Hủy đơn hàng</a>
       
</body>
</html>