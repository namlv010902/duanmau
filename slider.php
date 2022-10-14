<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/969bec5078.js" crossorigin="anonymous"></script>
    <style>
        .product img{
            width: 100%;
        }
        .colum{
            border: 2px solid red;
            margin: 10px;
        }
        .slick-prev{
            position: absolute;
            top: 50%;
            left: 0%;
            transform: translateY(-50%);
            z-index: 2;
            border: 1px solid rebeccapurple;
            border-radius: 100%;
            padding: 10px;
            background: none;
            color: rebeccapurple;
            
        }
        .slick-next{
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
        .fas{
            font-size: 30px;
            
            
        }
        .slick-dots li{
            display: inline-block;
            
            
           
        }
        .slick-dots .slick-active button{
            background-color: red;
            transition: 2s;
        }
        .slick-dots button{
            font-size: 0;
            border-radius: 100%;
            height: 20px;
            width: 20px;
            border: none;
        }
        .slick-dots{
            position: absolute;
            transform: translate(-50%, 100px);
            bottom: 0;
            left: 50%;
            display: flex;
            align-items: center;
            gap: 10px;
        }
       



    </style>
</head>
<body>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
      />
      <div class="product">
        <div class="colum">
            <img src="https://cdn.nguyenkimmall.com/images/thumbnails/600/336/detailed/649/10045580-noi-chien-khong-dau-ferroli-4l-faf-4-0-m-1.jpg" alt="">
        </div>
        <div class="colum">
            <img src="https://cdn.nguyenkimmall.com/images/thumbnails/600/336/detailed/647/10045580-noi-chien-khong-dau-ferroli-4l-faf-4-0-m-2.jpg" alt="">
        </div>
        <div class="colum">
            <img src="https://cdn.nguyenkimmall.com/images/detailed/52/10007579-sieu-sac-thuoc-van-an-va61-1.jpg" alt="">
        </div>
        <div class="colum">
            <img src="https://cdn.nguyenkimmall.com/images/thumbnails/600/336/detailed/649/10045580-noi-chien-khong-dau-ferroli-4l-faf-4-0-m-1.jpg" alt="">
        </div>
        <div class="colum">
            <img src="https://cdn.nguyenkimmall.com/images/thumbnails/600/336/detailed/649/10045580-noi-chien-khong-dau-ferroli-4l-faf-4-0-m-1.jpg" alt="">
        </div>
      </div>
      <script src="./slider.js"></script>
</body>
</html>