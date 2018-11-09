<?php
$connection = mysqli_connect("localhost","root","","tft");

if(!$connection)
    die("connection failed:".mysqli_error());
mysqli_set_charset($connection,'utf8');
session_start();

$_SESSION['day']='empty';
$_SESSION['centerInf']='empty';
$counter=0;
if(isset($_POST['day']) && !empty($_POST['day']))
    $counter++;
if(isset($_POST['time']) && !empty($_POST['time']))
    $counter++;
if(isset($_POST['budget']) && !empty($_POST['budget']))
    $counter++;

if($counter>=2)
{
    $day=$_POST['day'];
    $time=$_POST['time'];
    $budget=$_POST['budget'];

    $time = strtotime($time);
    $time=date('H', $time);
    $string = "";

    $result = $connection->prepare("SELECT `id`, `center-name`,`center-address`,`phone-number`,`sat-from`,`sat-to`,
          `sun-from`,`sun-to`,`mon-from`,`mon-to`,`tue-from`,`tue-to`,`wed-from`,`wed-to`,`thu-from`,`thu-to`,`fri-from`,`fri-to`
          FROM `centers`");
    $result->bind_param();
    $result->execute();
    $result->bind_result($id, $centerName, $centerAddress, $phoneNumber, $satFrom, $satTo, $sunFrom, $sunTo,
        $monFrom, $monTo, $tueFrom, $tueTo, $wedFrom, $wedTo, $thuFrom, $thuTo, $friFrom, $friTo);
    while ($result->fetch())
    {
        if(( $day=='saturday'   and $time>=$satFrom and $time<=$satTo)   or
            ($day=='sunday'    and $time>=$sunFrom and $time<=$sunTo)    or
            ($day=='monday'    and $time>=$monFrom and $time<=$monTo)    or
            ($day=='tuesday'   and $time>=$tueFrom and $time<=$tueTo)    or
            ($day=='wednesday' and $time>=$wedFrom and $time<=$wedTo)    or
            ($day=='thursday'  and $time>=$thuFrom and $time<=$thuTo)    or
            ($day=='friday'    and $time>=$friFrom and $time<=$friTo))
        {
            $string= $string .
                "نام مرکز: ".$centerName ."<br>"
                ."آدرس: ".$centerAddress ."<br>"
                ."شماره تماس: ".$phoneNumber ."<br>"."ساعات کاری: "."<br>";
            if($satFrom!=0 and $satTo!=0)
                $string= $string ."شنبه ها: از ساعت ". $satFrom ." تا ساعت ". $satTo."<br>";
            if($sunFrom!=0 and $sunTo!=0)
                $string= $string ."یکشنبه ها: از ساعت ". $sunFrom ." تا ساعت ". $sunTo."<br>";
            if($monFrom!=0 and $monTo!=0)
                $string= $string ."دوشنبه ها: از ساعت ". $monFrom ." تا ساعت ". $monTo."<br>";
            if($tueFrom!=0 and $tueTo!=0)
                $string= $string ."سه شنبه ها: از ساعت ". $tueFrom ." تا ساعت ". $tueTo."<br>";
            if($wedFrom!=0 and $wedTo!=0)
                $string= $string ."چهارشنبه ها: از ساعت ". $wedFrom ." تا ساعت ". $wedTo."<br>";
            if($thuFrom!=0 and $thuTo!=0)
                $string= $string ."پنج شنبه ها: از ساعت ". $thuFrom ." تا ساعت ". $thuTo."<br>";
            if($friFrom!=0 and $friTo!=0)
                $string= $string ."جمعه ها: از ساعت ". $friFrom ." تا ساعت ". $friTo."<br>";
            $string= $string ." 
        <form  action=\"action-centers.php\" method=\"post\">
            <input  type=\"hidden\" name=\"id\" value=".$id.">
            <button type=\"submit\" class=\" btn mybutton center-block\">اطلاعات بیشتر</button>
        </form>";
        }
    }
    $_SESSION['day'] = $string;
}
header('Location: admin.php');
?>