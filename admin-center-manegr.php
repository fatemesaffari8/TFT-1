<?php
session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="image/icon-index.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

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
            margin: 0 10px 10px 10px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.5s;
            background-color: white;
            border-radius: 25px;
            font-family:aa;
            font-size:30px;
            color: grey;
        }
        .mybutton {
            font-size: 25px;
            border-radius: 10px;
            width: 60%;
            transition: 0.3s;
            background-color: #696969;
            color: white;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }
        .mybutton:hover {
            color: white;
            background-color: #FFA07A;
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
</head>
<body style="background-color: #8E98A1">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php" style="font-family: ad">Tehran Fun Tour</a>
        </div>
        <ul class="nav navbar-nav navbar-right" style="font-family: aa;font-size: 30px;height: 45px">
            <li><a href="addCenter.php"><span class="glyphicon"></span>افزودن مرکز</a></li>
            <li class="dropdown" dir="rtl">
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">تنظیمات<span class="caret"></span></a>
                <ul class="dropdown-menu" style="font-size: large">
                    <li><a href="changeEmail.php">تغییر ایمیل</a></li>
                    <li><a href="changePassword.php">تغییر رمز عبور</a></li>
                </ul>
            </li>
            <li><a href="exit.php" dir="rtl">خروج</a></li>
            <p class="navbar-text" dir="rtl" style="margin-right: 20px">
                <?php
                echo
                    " نام کاربری شما: ".$_SESSION['username'];
                ?>
            </p>
        </ul>
    </div>
</nav>
<div class="row" style="margin-top: 45px">
    <img src="image/manage.jpg" class="img-responsive">
    <div class="col-md-2 card" dir="rtl" style="margin-left: 30px">
        <br>
        <img src="image/addCener.png" width="224px" height="224px" style="margin: 30px 0 30px 0">
        <br>
        <a href="addCenter.php">
            <button type="button" class="btn mybutton center-block" style="margin-top: 45px; font-size: 35px ;background-color: #FFC20E">افزودن مرکز</button>
            <br>
        </a>
    </div>
    <div class="col-md-3 card" dir="rtl">
        <p style="font-family:b; font-size: 40px">
            پرپروک شعبه سعادت آباد
            <br>
        </p>
        <img src="image/Location_Icon.png" width="50px" height="50px">
        آدرس:
        <br>
        خیابان سرو غربی، خیابان ریاضی بخشایش، پلاک 18
        <br>
        <img src="image/phone.png" width="50px" height="50px">
        تلفن تماس:
        <br>
        021 22093205 - 021 22078109
        <br>
        <img src="image/clock.png" width="50px" height="50px">
        ساعت سرویس دهی:
       <br>
        شنبه تا جمعه - 00:01 تا 23:59
<br>
        <a href="editCenter.php">
            <button type="button" class="btn mybutton center-block">ویرایش اطلاعات</button>
            <br>
        </a>
    </div>
    <div class="col-md-3 card" dir="rtl">
        <p style="font-family:b; font-size: 40px">
            پرپروک شعبه ولنجک
            <br>
        </p>
        <img src="image/Location_Icon.png" width="50px" height="50px">
        آدرس:
        <br>
        بلوار دانشجو، روبروی مرکز خرید ولنجک، نبش گلستان سوم
        <br>
        <img src="image/phone.png" width="50px" height="50px">
        تلفن تماس:
        <br>
        021 26802680 - 021 26802690
        <br>
        <img src="image/clock.png" width="50px" height="50px">
        ساعت سرویس دهی:
        <br>
        شنبه تا جمعه - 00:01 تا 23:59
        <br>
        <a href="editCenter.php">
            <button type="button" class="btn mybutton center-block">ویرایش اطلاعات</button>
            <br>
        </a>
    </div>
    <div class="col-md-3 card" dir="rtl">
        <p style="font-family:b; font-size: 40px">
            پرپروک شعبه پاسداران
            <br>
        </p>
        <img src="image/Location_Icon.png" width="50px" height="50px">
        آدرس:
        <br>
        خیابان داوود اسلامی، نبش گلستان پنجم، شماره 60
        <br>
        <img src="image/phone.png" width="50px" height="50px">
        تلفن تماس:
        <br>
        021 22599553 - 021 22599554
        <br>
        <img src="image/clock.png" width="50px" height="50px">
        ساعت سرویس دهی:
        <br>
        شنبه تا جمعه - 00:01 تا 23:59
        <br>
        <a href="editCenter.php">
            <button type="button" class="btn mybutton center-block">ویرایش اطلاعات</button>
            <br>
        </a>
    </div>
</div>
</body>
</html>
