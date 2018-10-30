<html>
<head>
    <meta charset="utf-8">
    <title>Profile</title>
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
            margin: 100px 20px 55px 20px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.5s;
            background-color: #696969;
            border-radius: 25px;
            opacity: 0.9;
            font-family:aa;
            font-size:30px;
            color: #f2f2f2;
        }
        .card:hover {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
        .mybutton {
            font-size: 25px;
            border-radius: 10px;
            width: 60%;
            transition: 0.3s;
            background-color: #D8BFD8;
            color: #696969;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }
        .mybutton:hover {
            color: white;
            background-color: palevioletred;
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }
        body{
            background-image: url(image/profile.jpg);
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
            <li><a href="admin.php"><span class="glyphicon"></span>یافتن تفریح</a></li>
            <li><a href="interest.php"><span class="glyphicon"></span>علایق</a></li>
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
<div class="row">
    <div class="col-md-4" dir="rtl">
        <div class="card container-fluid">
            <p style="font-family:b; font-size: 40px; color: #f2f2f2; margin-bottom: 50px">
                مراکز پیشنهادی:
                <br>
            </p>
            <?php
            $connection = mysqli_connect("localhost","root","","tft");

            if(!$connection)
                die("connection failed:".mysqli_error());
            mysqli_set_charset($connection,'utf8');
            $userName=$_SESSION['username'];
            $_SESSION['interest'] = 'empty';
            $userInterest='';
            $ad="yes";
            $string = "";

            $result = $connection->prepare("SELECT `interest` FROM `users` WHERE `user name`=?");
            $result->bind_param("s", $userName);
            $result->execute();
            $result->bind_result($interest);
            while ($result->fetch()) {
                $userInterest = $interest;
            }
            if ($userInterest!=NULL) {
                $result = $connection->prepare("SELECT `center-name`,`center-address`,`phone-number`,`sat-from`,`sat-to`,
          `sun-from`,`sun-to`,`mon-from`,`mon-to`,`tue-from`,`tue-to`,`wed-from`,`wed-to`,`thu-from`,`thu-to`,`fri-from`,`fri-to`
          FROM `centers` WHERE `category`=? and `ad`=?");
                $result->bind_param("ss", $userInterest, $ad);
                $result->execute();
                $result->bind_result($centerName, $centerAddress, $phoneNumber, $satFrom, $satTo, $sunFrom, $sunTo,
                    $monFrom, $monTo, $tueFrom, $tueTo, $wedFrom, $wedTo, $thuFrom, $thuTo, $friFrom, $friTo);
                while ($result->fetch()) {
                    $string = $string .
                        "نام مرکز: " . $centerName . "<br>"
                        . "آدرس: " . $centerAddress . "<br>"
                        . "شماره تماس: " . $phoneNumber . "<br>" . "ساعات کاری: " . "<br>";
                    if ($satFrom != 0 and $satTo != 0)
                        $string = $string . "شنبه ها: از ساعت " . $satFrom . " تا ساعت " . $satTo . "<br>";
                    if ($sunFrom != 0 and $sunTo != 0)
                        $string = $string . "یکشنبه ها: از ساعت " . $sunFrom . " تا ساعت " . $sunTo . "<br>";
                    if ($monFrom != 0 and $monTo != 0)
                        $string = $string . "دوشنبه ها: از ساعت " . $monFrom . " تا ساعت " . $monTo . "<br>";
                    if ($tueFrom != 0 and $tueTo != 0)
                        $string = $string . "سه شنبه ها: از ساعت " . $tueFrom . " تا ساعت " . $tueTo . "<br>";
                    if ($wedFrom != 0 and $wedTo != 0)
                        $string = $string . "چهارشنبه ها: از ساعت " . $wedFrom . " تا ساعت " . $wedTo . "<br>";
                    if ($thuFrom != 0 and $thuTo != 0)
                        $string = $string . "پنج شنبه ها: از ساعت " . $thuFrom . " تا ساعت " . $thuTo . "<br>";
                    if ($friFrom != 0 and $friTo != 0)
                        $string = $string . "جمعه ها: از ساعت " . $friFrom . " تا ساعت " . $friTo . "<br>";
                    $string = $string . "<br>";
                }
                echo $string;
            }
            ?>
        </div>
    </div>
    <div class="col-md-4" dir="rtl">
        <div class="card container-fluid">
            <p style="font-family:b; font-size: 40px; color: #f2f2f2; margin-bottom: 50px">
                یادآوری رویداد های شما:
                <br>
            </p>
        </div>
    </div>
    <div class="col-md-4" dir="rtl">
        <div class="card container-fluid">
            <p style="font-family:b; font-size: 40px; color: #f2f2f2; margin-bottom: 50px">
              پروفایل شما
            </p>
            <?php
            $connection = mysqli_connect("localhost","root","","tft");
            if(!$connection)
                die("connection failed:".mysqli_error());
            mysqli_set_charset($connection,'utf8');
            $username = $_SESSION['username'];
            $result = $connection->prepare("SELECT `name`,`last name`,`phone number`,`email`,`interest` FROM `users` WHERE  `user name`=?");
            $result->bind_param("s", $username);
            $result->execute();
            $result->bind_result($name,$lastname,$phoneNumber,$email,$interest);
            while ($result->fetch())
            {
                echo "<img src=\"image/person.png\" width=\"55px\" height=\"55px\" >".' نام: '.$name.'<br><br>';
                echo "<img src=\"image/lastname.png\" width=\"55px\" height=\"55px\">".' نام خانوادگی: '.$lastname.'<br><br>';
                echo "<img src=\"image/phone2.png\" width=\"55px\" height=\"55px\" class=\"img-circle\">".' شماره تلفن: '.$phoneNumber.'<br><br>';
                echo "<img src=\"image/email.png\" width=\"55px\" height=\"55px\" class=\"img-circle\">".' ایمیل: '.$email.'<br><br>';
                if ($interest == "restaurant"){$interest="رستوران و کافی شاپ";}
                if ($interest == "farhangi"){$interest="سینما،کنسرت و تئاتر";}
                if ($interest == "fan-fair"){$interest="شهربازی";}
                if ($interest == "shop-center"){$interest="مرکز خرید";}
                if ($interest == "gym"){$interest="مجموعه ورزشی";}
                if ($interest == "park"){$interest="پارک و فضای آزاد";}
                echo "<img src=\"image/interest.png\" width=\"55px\" height=\"55px\">".' علاقه: '.$interest.'<br>';
            }
            ?>
            <a href="editProfile.php">
                <button type="button" class="btn mybutton center-block">ویرایش اطلاعات</button>
                <br>
            </a>
        </div>
    </div>
</div>


</body>
</html>
