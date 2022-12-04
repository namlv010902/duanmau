<?php
    include "./model/connect.php";
   
    session_start();
    if(empty($_SESSION["id"])){
        header("location:./view/login.php");
    };
     
   

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siêu thị điện máy API</title>
    <script src="https://kit.fontawesome.com/969bec5078.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="./src/images/logoap.png" type="image/x-icon" >
    <script src="https://kit.fontawesome.com/969bec5078.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css">
</head>
 <style>
    
   
    .nam_tich_xanh{
        display: flex;
        align-items: center;
    }
  #desc{
        height: 150px;
        display: inline-block;
        overflow: scroll;
        width: 200px;
        
    }
    td{
        text-align: center;
    }
    td img{
        height: 150px;
        width: 150px;
    }
    .right{
        display: flex;
        align-items: center;
    }
    form{
        display: flex;
        align-items: center;
        border: 1px solid black;
        border-radius: 10px;
    }
    #timkiem{
        border: none;
        background: none;
    }
   
    
  
    #container {
   
  height: 500px;
}

.highcharts-figure,
.highcharts-data-table table {
  min-width: 310px;
  max-width: 800px;
  margin: 1em auto;

}

#sliders td input[type="range"] {
  display: inline;
}

#sliders td {
  padding-right: 1em;
  white-space: nowrap;
}

#table, tr,td,th{
   border: none;
}
.banner{
  width: 100%;
  
}
.highcharts{
  background-color: red;
}
.bieudo{
 
 display: flex;
 width: 874px;
  
 justify-content: left;
}
.traib{
  /* box-shadow: 0 1rem 3rem #7380ec; */
  border-radius: 20px;
  width: 550px;
  height: 550px;;
  padding-left: 60px;
  background-color: white;
}
.traib strong{
  font-size: 20px;
  color: black;
  font-weight: 500;
  
}
.traib p{
  color: grey;
  margin-top: 10px;
  
}

.highcharts-figure{
 border-radius: 20px;
 width: 800px;
 margin-left: 100px;
}
aside{
 width: 1350px;
 padding-right: 30px;
background: rgba(248, 249, 250, 1);

}
article{
 
}


 </style>
<body>
    <div class="container">
        <main>
            <article>
                <div class="logo">
                    <img src="./src/images/logoap.png" alt="">
                </div>
                <h3>Admin tools</h3>
                <div class="infomation">
                <a href="./admin.php" id="but"><button style="background-color:#6C5DD3; cursor: pointer; border-left: 8px solid red; "><i class="fab fa-vaadin" style="margin-right:10px;"></i>Dashboard </button></a><br>

                <a href="./product.php" id="but"><button><i class="fab fa-sketch" style="margin-right:10px;"></i>Product </button></a><br>
                <a href="./view/category.php"><button><i class="fab fa-sellsy"  style="margin-right:10px;"></i>Categories </button></a> <br>

                <a href="./view/user.php"><button><i class="fa fa-user-nurse"  style="margin-right:10px;"></i> User </button> </a> <br>
                <a href="./view/comment.php"><button><i class="fa fa-comment-alt"  style="margin-right:10px;"></i></i>Comment</button></a>
                <a href="./view/thong_ke.php"><button><i class="fab fa-deezer" style="margin-right:10px;"></i>Statistics</button></a>
                <a href="./view/oder.php"><button><i class="fas fa-cart-plus" style="margin-right:10px;"></i>Oder</button></a>
               
                
                </div>
                <h2>Insights</h2>
                <div class="insi">
                <button><i class="fab fa-instalod" style="margin-right:10px;"></i>In box</button>
                <button><i class="fab fa-gitlab" style="margin-right:10px;"></i>Nofitication</button>
               
                </div>
           <button > <a href="./controller/log_out.php" style="color: white;"> <i style="color: white;margin-right: 10px;" class="fas fa-sign-out" style="margin-right:10px; "></i>Log Out</a> </button>  
            </article>
            <aside>
                <header>
                    <div class="left">
                    <img height="100px" width="150px" style="border-radius:50% ;" id="avatars" src="<?php echo $_SESSION["avatar"]?>" alt="">
                    <div class="nam_tich_xanh">
                    <h2>Hi, <?php echo $_SESSION["username"]?></h2>
                    <img height="22px" src="./src/images/tichxanh.jpg"  alt="">
                    </div>
                    
                        <h1>Welcome back</h1> 
                        
                    
                    </div>
                    <div class="right">                         
                     <form action="./admin.php" method="POST">
                   
                      <button type="submit"><i style="font-size: 25px;" class="fas fa-search"></i></button>
                      <input name="search" placeholder="Search..." type="text">
                     </form>
                     <div class="bell" style="display:flex;">
                     <i style="font-size:30px; margin-top:10px;" class="far fa-bell"></i>
                     <p style=" display: flex; align-items: center; justify-content: center;color: white ; background-color:#FF754C ; height: 25px ; width:25px; border-radius: 50%;">3</p>
                     </div>
                       
                       
                       
                    </div>
                </header>
                <div class="banner">
                    <div class="banner_left">
                    <h1>Your Products</h1>
                    <h4>Create Your Product Dashboard in Minutes</h4>
                    <button id="check">Check all seting</button>
                    </div>
                    <div class="image">
                    <img src="https://ui8-unity.herokuapp.com/img/banner-pic.png" alt="">
                    </div>
                </div>
                <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
 <div class="bieudo">
  <div class="traib">
    <h1 style="margin-top:30px; font-weight: 500;">Earnings by item</h1>
  <div class="chilren">
   <div class="chau" style="display:flex; align-items:center;">
    <div class="img" style="background-color: rgba(255, 162, 192, 1) ; border-radius: 20px; margin-top: 50px;">
    <img src="https://ui8-unity.herokuapp.com/img/figure-1.png" height="100px" alt=""></div>
    <div class="item" style="margin-left:30px;">
      <strong>Benta 3D Kit </strong>
      <p>lllustration</p>
    </div>
   </div>
  </div>
  <div class="chilren">
   <div class="chau" style="display:flex; align-items:center;">
    <div class="img" style="background-color: rgba(255, 206, 115, 1); border-radius: 20px; margin-top: 50px;">
    <img src="https://ui8-unity.herokuapp.com/img/figure-2.png" height="100px" alt=""></div>
    <div class="item" style="margin-left:30px;">
      <strong>Benta 3D Kit </strong>
      <p>lllustration</p>
    </div>
   </div>
  </div>
  <div class="chilren">
   <div class="chau" style="display:flex; align-items:center;">
    <div class="img" style="background-color: rgba(160, 215, 231, 1) ; border-radius: 20px; margin-top: 50px;">
    <img src="https://ui8-unity.herokuapp.com/img/figure-3.png" height="100px" alt=""></div>
    <div class="item" style="margin-left: 30px ;">
      <strong>Collab UI Kit </strong>
      <p>lllustration</p>
    </div>
   </div>
  </div>
  </div>
<figure class="highcharts-figure" >
  <div id="container"></div>
  
  <div id="sliders">
    <table id="table">
      <tbody><tr>
        <td><label for="alpha">Alpha Angle</label></td>
        <td><input id="alpha" type="range" min="0" max="45" value="15"> <span id="alpha-value" class="value"></span></td>
      </tr>
      <tr>
        <td><label for="beta">Beta Angle</label></td>
        <td><input id="beta" type="range" min="-45" max="45" value="15"> <span id="beta-value" class="value"></span></td>
      </tr>
      <tr>
        <td><label for="depth">Depth</label></td>
        <td><input id="depth" type="range" min="20" max="100" value="50"> <span id="depth-value" class="value"></span></td>
      </tr>
    </tbody></table>
  </div>
</figure>

 </div>   
            </aside>
        </main>
    </div>
</body>
<script>
  // Set up the chart
const chart = new Highcharts.Chart({
  chart: {
    renderTo: 'container',
    type: 'column',
    options3d: {
      enabled: true,
      alpha: 15,
      beta: 15,
      depth: 50,
      viewDistance: 25
    }
  },
  xAxis: {
    categories: ['Product', 'Category', 'User', 'Oders', 'Comment', 'Product',
      'Category', 'User', 'Oders', 'Comment']
  },
  yAxis: {
    title: {
      enabled: false
    }
  },
  tooltip: {
    headerFormat: '<b>{point.key}</b><br>',
    pointFormat: 'Cars sold: {point.y}'
  },
  title: {
    text: 'API 2022 Stats Chart'
  },
  subtitle: {
    text: 'Source: ' +
      '<a href="https://ofv.no/registreringsstatistikk"' +
      'target="_blank">OFV</a>'
  },
  legend: {
    enabled: false
  },
  plotOptions: {
    column: {
      depth: 25
    }
  },
  series: [{
    data: [1318, 1073, 1060, 813, 775, 745, 537, 444, 416, 395],
    colorByPoint: true
  }]
});

function showValues() {
  document.getElementById('alpha-value').innerHTML = chart.options.chart.options3d.alpha;
  document.getElementById('beta-value').innerHTML = chart.options.chart.options3d.beta;
  document.getElementById('depth-value').innerHTML = chart.options.chart.options3d.depth;
}

// Activate the sliders
document.querySelectorAll('#sliders input').forEach(input => input.addEventListener('input', e => {
  chart.options.chart.options3d[e.target.id] = parseFloat(e.target.value);
  showValues();
  chart.redraw(false);
}));

showValues();
</script>

</html>