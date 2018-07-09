<html>
<head>
    <meta charset="utf-8">
    <title>Interests</title>
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
        .bg {
            background-image: url(image/australia-workshop-banner.png);
            height: 50%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        h1 {
            color: brown;
            text-align: center;
            font-family: "salamat";
            font-size: 40px;
        }
        .button {
            display: inline-block;
            background-color: #ffa31a;
            border-radius: 4px;
            border: none;
            color: black;
            text-align: center;
            text-decoration: none;
            font-family: "salamat";
            font-size: 25px;
            margin: 3px;
            cursor: pointer;
            transition: all 0.5s;
            height: 20%;
            width: 90%;

        }

        .button:hover {
            background-color:#c2c2a3;
        }
        .button:active {
            background-color: #3e8e41;
            transform: translateY(4px);
        }
        .button2 {background-color:#ff3377;}
        .button3 {background-color:#d633ff;}
        .button4 {background-color:#29a3a3 ;}
        .button5 {background-color:#33cc33 ;}
        .button6 {background-color:#ff3300 ;}
    </style>
</head>
<body style="background-color: #f2f2f2">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php" style="font-family: ad">Tehran Fun Tour</a>
        </div>
        <ul class="nav navbar-nav navbar-right" style="font-family: aa;font-size: 30px;height: 45px">
            <li><a href="admin.php"><span class="glyphicon"></span>یافتن تفریح</a></li>
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
                session_start();
                echo
                   " نام کاربری شما: ".$_SESSION['username'];
                ?>
            </p>
        </ul>
    </div>
</nav>
<h1 style="margin-top: 75px">:مکان های مورد علاقه خود را انتخاب کنید </h1>
<p style="font-family: salamat;text-align: center;font-size: 30px">.با وارد کردن مکان های مورد علاقه خود از اضافه شدن مکان های جدید،تخفیف ها و... مطلع شوید</p>

<div class="bg"></div>
<div class="row center-block" style="margin-top: 25px">
    <?php
    if(isset($_SESSION['addInterest']) && $_SESSION['addInterest'] == 'success')
    {
        echo
        '
<div dir="rtl" style="font-family:salamat ;color:brown; font-size: 25px;width: 95%" class="center-block">
    <div class="panel panel-success" >
    <div class="panel-heading">پیام</div >
    <div class="panel-body">با موفقیت انجام شد و اطلاعات ثبت شد</div>
    </div>
</div>
             ';
        $_SESSION['addInterest']='empty';
    }
    ?>
    <form action="action-addInterest.php" method="post" class="col-md-2">
        <input type="hidden" name="category"  value="restaurant">
        <button type="submit" class="button">رستوران و کافی شاپ</button>
    </form>
    <form action="action-addInterest.php" method="post" class="col-md-2">
        <input type="hidden" name="category"  value="farhangi">
        <button type="submit" class="button button2">سینما،کنسرت و تئاتر</button>
    </form>
    <form action="action-addInterest.php" method="post" class="col-md-2">
        <input type="hidden" name="category"  value="fan-fair">
        <button type="submit" class="button button3">شهربازی</button>
    </form>
    <form action="action-addInterest.php" method="post" class="col-md-2">
        <input type="hidden" name="category"  value="shop-center">
        <button type="submit" class="button button4">مرکز خرید</button>
    </form>
    <form action="action-addInterest.php" method="post" class="col-md-2">
        <input type="hidden" name="category"  value="gym">
        <button type="submit" class="button button5">مجموعه ورزشی</button>
    </form>
    <form action="action-addInterest.php" method="post" class="col-md-2">
        <input type="hidden" name="category"  value="park">
        <button type="submit" class="button button6">پارک و فضای آزاد</button>
    </form>

</div>
</body>
</html>
