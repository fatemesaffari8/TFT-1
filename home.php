<html>
<head>
    <meta charset="utf-8">
    <title>Tehran Fun Tour</title>
    <link rel="shortcut icon" href="image/icon-index.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <style>
        @font-face {
            font-family: "aa";
            src: url("font/AdobeArabic.otf");
        }
        @font-face {
            font-family: "b";
            src: url("font/b.ttf");
        }
        @font-face {
            font-family: "ad";
            src: url("font/ArchitectsDaughter.ttf");
        }
        @font-face {
            font-family: "zangar";
            src: url("font/zangar.ttf");
        }
        @font-face {
            font-family: "salamat";
            src: url("font/Salamat.ttf");
        }
        .card {
            margin: 100px 25px 100px 25px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.5s;
            background-color: white;
            font-family:aa;
            font-size:30px;
            color: #663399;
        }
        .card:hover {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
        .mybutton {
            font-size: 25px;
            border-radius: 10px;
            width: 60%;
            transition: 0.3s;
            background-color: #9932CC;
            color: white;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }
        .mybutton:hover {
            color: white;
            background-color: #DA70D6;
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            padding: 0 4px;
        }
        .column {
            flex: 33%;
            max-width: 25%;
            padding: 0 4px;
        }
        .column img {
            margin-top: 8px;
            vertical-align: middle;
        }
        @media screen and (max-width: 800px) {
            .column {
                flex: 50%;
                max-width: 50%;
            }
        }
        @media screen and (max-width: 600px) {
            .column {
                flex: 100%;
                max-width: 100%;
            }
        }
        .paralex {
            background-image: url(image/milad.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            height: 100vh;
        }
    </style>
</head>
<body style="background-color: #f2f2f2">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php" style="font-family: ad">Tehran Fun Tour</a>
        </div>
        <ul class="nav navbar-nav navbar-right" style="font-family: aa;font-size: 30px;height: 45px;">
            <li><a href="loginSignupModiran.php"><span class="glyphicon"></span>ثبتنام-ورود مدیران مراکز</a></li>
            <li><a href=""><span class="glyphicon"></span>کاربر مهمان</a></li>
            <li><a href=""><span class="glyphicon"></span>ثبت نام-ورود کاربران</a></li>
        </ul>
    </div>
</nav>
<div class="row">
    <div class="column" style="margin-top: 45px">
        <img class="img img-responsive" src="image/food.jpg">
        <img class="img img-responsive" src="image/boling.jpg">
        <img class="img img-responsive" src="image/azadi.jpg">
    </div>
    <div class="column" style="margin-top: 45px">
        <img class="img img-responsive" src="image/dolfin.jpg">
        <img class="img img-responsive" src="image/paraglider.jpg">
        <img class="img img-responsive" src="image/Jurassic-park.jpg">
    </div>
    <div class="column" style="margin-top: 45px">
        <img class="img img-responsive" src="image/cafe.jpg">
        <img class="img img-responsive" src="image/sortme.jpg">
        <img class="img img-responsive" src="image/escapeme.jpg">
    </div>
    <div class="column" style="margin-top: 45px">
        <img class="img img-responsive" src="image/shahrebazi.jpg">
        <img class="img img-responsive" src="image/t.jpg">
        <img class="img img-responsive" src="image/sinama.jpg">
    </div>
</div>
<div class="paralex" dir="rtl">
    <div class="col-md-5" style="margin-top: 23vh">
        <p style="text-align: center; font-family: Salamat;font-size: 35px; color: white;">
            این سایت یک سایت پیشنهاد دهنده ی تفریح است!
            <br>
            به این صورت که شما علایق و روز و ساعت و موقعیت مکانی و

            نوع مرکز تفریحی و بودجه و ... وارد سایت میکنید
            <br>
سپس سایت به شما یک تفریح رو پیشنهاد میدهد!
            <br>
            امکان رزرو و خرید بلیط از سایت ما هم وجود دارد.
            <br>
            قابلیت جستجو بر اساس نوع مرکز تفریحی و موقعیت مکانی
        </p>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-5" style="margin-top: 35vh">
        <p style="text-align: center; font-family: zangar; font-size: 55px;color: white">
            سرگرمی تهران
            <br>
        </p>
    </div>
</div>
<div class="row">
<div class="col-md-6" dir="rtl">
    <div class="card container-fluid">
        <?php
        if(isset($_SESSION['islogin']) && $_SESSION['islogin']=='false')
        {
            echo
            '
<div dir="rtl" style="font-family:aa ;color:firebrick; font-size: 25px">
    <div class="panel panel-danger" >
    <div class="panel-heading">پیام</div >
    <div class="panel-body">نام کاربری یا رمز عبور اشتباه است</div>
    </div>
</div>
                ';
            $_SESSION['islogin']='empty';
        }
        if(isset($_SESSION['islogin']) && $_SESSION['islogin']=='logout')
        {
            echo
            '
<div dir="rtl" style="font-family:aa ;color:firebrick; font-size: 25px">
    <div class="panel panel-success" >
    <div class="panel-heading">پیام</div >
    <div class="panel-body">با موفقیت خارج شدید</div>
    </div>
</div>
             ';
            $_SESSION['islogin'] = 'empty';
        }
        ?>
        <p style="font-family:b; font-size: 40px">
        ورود کاربران
        <br>
        </p>
        <center>
        <form action="action-login.php" method="post">
            <br>
            <input type="text" placeholder="نام کاربری" name="user-name" style="width:70%">
            <br>
            <input type="password" placeholder="رمز عبور" name="password" style="width:70%">
            <br><br>
            <button type="submit" class="btn mybutton">تایید</button>
        </form>
        </center>
        <a href="" target="_blank" style="font-size:30px;color: #663399">
      ورود به عنوان کاربر مهمان
        </a>
        <br>
    </div>
</div>
    <div class="col-md-6" dir="rtl">
        <div class="card container-fluid">
            <?php
            if(isset($_SESSION['signup']) && $_SESSION['signup']=='success')
            {
                echo
                '
<div dir="rtl" style="font-family:aa ;color:firebrick; font-size: 25px">
    <div class="panel panel-success" >
    <div class="panel-heading">پیام</div >
    <div class="panel-body">ثبت نام با موفقیت انجام شد و اطلاعات ثبت شد</div>
    </div>
</div>
             ';
                $_SESSION['signup']='empty';
            }
            ?>
        <p style="font-family:b; font-size:40px">
            ثبت نام کاربران
            <br>
        </p>
            <center>
        <form action="" method="post">
            <br>
            <input type="text" placeholder="نام خود را وارد کنید" name="name" style="width:70%">
            <br>
            <input  type="text" placeholder="نام خانوادگی خود را وارد کنید" name="last-name" style="width:70%">
            <br>
            <input type="text" placeholder="نام کاربری خود را وارد کنید" name="user-name" style="width:70%">
            <br>
            <input type="password" placeholder="رمز عبور خود را وارد کنید" name="password" style="width:70%">
            <br>
            <input type="number" placeholder="شماره تلفن خود را وارد کنید" name="phone-number" style="width:70%">
            <br>
            <input type="email" placeholder="ایمیل خود را وارد کنید" name="email" style="width:70%">
            <br><br>
            <button type="submit" class="btn mybutton center-block">تایید</button>
        </form>
            </center>
        </div>
    </div>
</div>
</body>
</html>
