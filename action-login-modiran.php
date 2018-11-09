<?php
$connection = mysqli_connect("localhost","root","","tft");

if(!$connection)
    die("connection failed:".mysqli_error());
mysqli_set_charset($connection,'utf8');

session_start();
$_SESSION['islogin']='empty';

$counter=0;
if(isset($_POST['user-name']) && !empty($_POST['user-name']))
{
    $counter++;
    if(isset($_POST['password']) && !empty($_POST['password']))
        $counter++;
}
if($counter==2)
{
    $userName=$_POST['user-name'];
    $password=$_POST['password'];

    $password=sha1($_POST['password']);

    $result = $connection->prepare("SELECT * FROM `managers` WHERE  `user name`=? AND `password`=?");
    $result->bind_param("ss", $userName , $password);
    $result->execute();
    $result = $result->get_result();
    if($result->num_rows==1)
    {
        $_SESSION['islogin'] = 'true';
        $_SESSION['username']=$userName;
    }
    else
        $_SESSION['islogin']='false';
}
if($_SESSION['islogin']=='true')
    header('Location: admin-center-manegr.php');
else
    header('Location: loginSignupModiran.php');
?>