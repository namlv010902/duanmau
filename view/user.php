<?php
    include "../model/connect.php";
   
    session_start();
   
   
        $query ="select * from users";
  
        $user = getAll($query);
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siêu thị điện máy API</title>
    <link rel="shortcut icon" href="../src/images/logoap.png" type="image/x-icon" >
    <script src="https://kit.fontawesome.com/969bec5078.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css">
</head>
 <style>
    .nam_tich_xanh{
        display: flex;
        align-items: center;
    }
  #desc{
        height: 30px;
        overflow: hidden scroll;
    }
    table{
        
        text-align: center;
    }
    #img_user{
        width: 200px;
        height: 100px;
    }
    td img{
        width: 100%;
    }
    #action{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #delete{
        color: red;
    }
    #update{
        color: darkorange;
        margin-right: 10px;
    }
    th,td{
        padding: 6px;
    }
    #name{
        width: 220px;
    }
    
 </style>
<body>
    <div class="container">
        <main>
            <article>
                <div class="logo">
                    <img src="../src/images/logoap.png" alt="">
                </div>
                <h3>Admin tools</h3>
                <div class="infomation">
                <a href="./admin.php" id="but"><button><img src="../src/images/label.png" alt="">Product </button></a><br>
                <a href="./categories.php"><button><img src="../src/images/label.png" alt="">Categories </button></a> <br>

                <a href="./users.php"><button><img src="../src/images/label.png" alt="">User </button> </a> <br>
                <a href=""><button><img src="../src/images/caidat.png" alt=""> Settings</button></a>
               
                
                </div>
                <h2>Insights</h2>
                <div class="insi">
                <button><img src="../src/images/inbox.png" alt="">In box</button>
                <button><img src="../src/images/bell.png" alt="">Nofitication</button>
                <button><img src="../src/images/coment.png" alt="">Comment</button>
                </div>
                <button><img src="../src/images/help.png" alt=""> Helps</button>
            </article>
            <aside>
                <header>
                    <div class="left">
                    <img id="avatar" src=".<?php echo $_SESSION["avatar"]?>" alt="">
                    <div class="nam_tich_xanh">
                    <h2>Hi, <?php echo $_SESSION["username"]?></h2>
                    <img height="22px" src="../src/images/tichxanh.jpg"  alt="">
                    </div>
                    <div class="comback">
                        <h1>Welcome back</h1> 
                        <img src="../src/images/medal.png" alt="">
                    </div>
                    </div>
                    <div class="right">                         
                        
                        <button id="out">
                      <a onclick="return confirm('Bạn có muốn đăng xuất không')" href="../controller/log_out.php">Log Out</a> 
                        </button>
                       
                    </div>
                </header>
                <div class="banner">
                    <div class="banner_left">
                    <h1>Your user</h1>
                    <h4>Create Your Product Dashboard in Minutes</h4>
                    <button id="check">Check all seting</button>
                    </div>
                    <div class="image">
                    <img src="https://ui8-unity.herokuapp.com/img/banner-pic.png" alt="">
                    </div>
                </div>
                <a href="./add_user.php"><button id="add">Add New User</button></a>
                <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Avatar</th>
                <th>Code login</th>
                <th id="name">User Name</th>             
                <th>Password</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>        
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($user as $key => $value):?>
            <tr>
                <td><?php echo $key + 1?></td>
                <td id="img_user"><img src=".<?php echo $value["avatar"]?>" alt=""></td>
                <td id="name"><?php echo $value["id"]?></td>
                <td id="name"><?php echo $value["username"]?></td>
                <td><?php echo $value["password"]?></td>
                <td id="mail"><?php echo $value["email"]?></td>
                <td><?php echo $value["vaitro"]?></td>
                <td><?php echo $value["kichhoat"]?></td>
                <td id="action">
                    <a id="update" href="./update_user.php?id=<?php echo $value["id"]?>"><i class="fas fa-edit"></i></a>
                    <a id="delete" onclick="return confirm('Bạn có muốn xóa không ')" href="../controller/delete_user.php?id=<?php echo $value["id"]?>"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
            </aside>
        </main>
    </div>
</body>

</html>