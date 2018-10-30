<html>
<head>
    <meta charset="utf-8">
    <title>Add Center</title>
    <link rel="shortcut icon" href="image/icon-index.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
            margin: 60px 100px 15px 100px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.5s;
            background-color: white;
            border-radius: 25px;
            opacity: 0.8;
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
        body{
            background-image: url(image/event.jpg);
            background-size: cover;
            background-attachment: fixed;
        }

    </style>
</head>
<body style="background-color: #f2f2f2">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php" style="font-family: ad">Tehran Fun Tour</a>
        </div>
        <ul class="nav navbar-nav navbar-right" style="font-family: aa;font-size: 30px;height: 45px">
            <li><a href="admin-center-manegr.php"><span class="glyphicon"></span>داشبورد</a></li>
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
                //    echo
                //      " نام کاربری شما: ".$_SESSION['username'];
                ?>
            </p>
        </ul>
    </div>
</nav>

<div class="row" dir="rtl">
    <div class="card container-fluid">



        <?php
        session_start();
        if(isset($_SESSION['addCenter']) && $_SESSION['addCenter']=='success')
        {
            echo
            '
<div dir="rtl">
<br>
    <div class="panel panel-success" >
    <div class="panel-heading">پیام</div >
    <div class="panel-body">اطلاعات مرکز جدید ثبت شد. پس از بررسی توسط مدیر سیستم به لیست مراکز اضافه خواهد شد</div>
    </div>
</div>
                ';
        }
        $_SESSION['addCenter']='empty';
        ?>




        <p style="font-family:b; font-size: 35px">
            ثبت نام مدیران مراکز
            <br>
        </p>
            <form action="action-addCenter.php" method="post">
                نام مرکز تفریحی یا رویداد:
                <br>
                <input  type="text" placeholder="نام مرکز تفریحی یا رویداد خود را وارد کنید" name="center-name" class="center-block" style="width:70%">
                آدرس مرکز:
                <br>
                <input  type="text" placeholder="آدرس مرکز تفریحی یا رویداد خود را وارد کنید" name="center-address" class="center-block" style="width:70%">
                شماره تماس:
                <br>
                <input type="number" placeholder="شماره تماس با مرکز را وارد کنید" name="phone-number" class="center-block" style="width:70%">
                ایمیل:
                <br>
                <input type="email" placeholder="ایمیل خود را وارد کنید" name="email" class="center-block" style="width:70%">
نوع مرکز یا رویداد را انتخاب کنید:
                <br>
                <input type="radio" name="category" value="restaurant" style="margin-right: 30px"> رستوران و کافی شاپ
                <input type="radio" name="category" value="farhangi" style="margin-right: 30px"> سینما و تئاتر و کنسرت
                <input type="radio" name="category" value="fan-fair" style="margin-right: 30px"> شهربازی
                <input type="radio" name="category" value="shop-center" style="margin-right: 30px"> مرکز خرید
                <input type="radio" name="category" value="gym" style="margin-right: 30px"> مجموعه ی ورزشی
                <input type="radio" name="category" value="park" style="margin-right: 30px">پارک و فضای آزاد
                <input type="radio" name="category" value="other" style="margin-right: 30px"> سایر
                <br>
                آیا مایل به تبلیغ مرکز خود هستید؟
                <input type="radio" name="ad" value="yes" style="margin-right: 30px">بله
                <input type="radio" name="ad" value="no" style="margin-right: 30px">خیر
                <br>
هزینه ی بلیط (در صورت دارا بودن به ریال)
                <br>
                <input type="number" placeholder="هزینه ی بلیط را وارد کنید" name="ticket" class="center-block" style="width:70%">
                شماره ی حساب:
                <input type="number" placeholder="شماره ی حساب یا شماره ی کارت بانکی را وارد کنید" name="account-number" class="center-block" style="width:70%">
                شرح مکان تفریحی یا رویداد:
                <br>
                <textarea placeholder="مکان تفریحی یا رویداد را شرح دهید" name="description" class="center-block" style="height: 150px;width: 70%"></textarea>
ساعت کاری:
                <br><input type="checkbox" name="time" value="saturday" style="margin-right: 30px">شنبه
                از ساعت                <input type="number" name="sat-from" style="width:50px">
                تا ساعت                <input type="number" name="sat-to" style="width:50px">
                <input type="checkbox" name="time" value="sunday" style="margin-right: 125px">یک شنبه
                از ساعت                <input type="number" name="sun-from" style="width:50px">
                تا ساعت                <input type="number" name="sun-to" style="width:50px">
                <input type="checkbox" name="time" value="monday" style="margin-right: 125px">دوشنبه
                از ساعت                <input type="number" name="mon-from" style="width:50px">
                تا ساعت                <input type="number" name="mon-to" style="width:50px">
                <br><br>

                <input type="checkbox" name="time" value="tuesday" style="margin-right: 30px">سه شنبه
                از ساعت                <input type="number" name="tue-from" style="width:50px">
                تا ساعت                <input type="number" name="tue-to" style="width:50px">
                <input type="checkbox" name="time" value="wednesday" style="margin-right: 100px">چهارشنبه
                از ساعت                <input type="number" name="wed-from" style="width:50px">
                تا ساعت                <input type="number" name="wed-to" style="width:50px">
                <input type="checkbox" name="time" value="thursday" style="margin-right: 125px">پنج شنبه
                از ساعت                <input type="number" name="thu-from" style="width:50px">
                تا ساعت                <input type="number" name="thu-to" style="width:50px">
                <br><br>
                <center>
                <input type="checkbox" name="time" value="friday">جمعه
                از ساعت                <input type="number" name="fri-from" style="width:50px">
                تا ساعت                <input type="number" name="fri-to" style="width:50px">
                </center>
                <br>
            <button type="submit" class="btn mybutton center-block">تایید</button>
            </form>
    </div>
</div>
</body>
</html>
