<?php
  session_start();
  include "../model/connect.php";
  $id = $_SESSION["id"];
//   var_dump($id);die;
  $name =  $_SESSION["username"] ;
   $query = "SELECT * FROM oder where id_user like n'$id' ";
   $oder = getAll($query);

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
    <?php if(!empty($oder)){?>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã hóa đơn</th>
                <th>Thanh toán</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($oder as $value):?>
            <tr>
               <td></td>
                <td><?php echo $value["id"]?></td>
                <td>
                    <?php if($value["pay"]==1){?>
                      Chưa thanh toán
                    <?php  } ?>
                     </td>
                <td><?php if($value["status"]==1){?>
                      Đang xử lý
                    <?php  } ?></td>
                <td><a title="Xem chi tiết" href="./oder_detal.php?id=<?php echo $value["id"]?>">Chi tiết</a></td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
    <?php }else{ ?>

        <h3>TRống</h3>
        <?php } ?>
</body>
</html>