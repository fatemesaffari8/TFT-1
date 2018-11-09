<?php
$connection = mysqli_connect("localhost","root","","tft");
if(!$connection)
    die("connection failed:".mysqli_error());
mysqli_set_charset($connection,'utf8');
$counter=0;
session_start();
$_SESSION['signup']='empty';

if(isset($_POST['name']) && !empty($_POST['name']))
    $counter++;
if(isset($_POST['user-name']) && !empty($_POST['user-name']))
    $counter++;
if(isset($_POST['password']) && !empty($_POST['password']))
    $counter++;
if(isset($_POST['phone-number']) && !empty($_POST['phone-number']))
    $counter++;
if(isset($_POST['email']) && !empty($_POST['email']))
    $counter++;

if($counter==5)
{
    $name=$_POST['name'];
    $userName=$_POST['user-name'];
    $password=sha1($_POST['password']);
    $phoneNumber=$_POST['phone-number'];
    $email=&$_POST['email'];

    $result = $connection->prepare("SELECT * FROM `managers` WHERE `user name`=?");
    $result->bind_param("s", $userName);
    $result->execute();
    $result=$result->get_result();
    if(($result->num_rows)==1)
        $_SESSION['signup']='similarUserName';
    else
    {
        $result = $connection->prepare("INSERT INTO `managers`(`name`, `user name`,`password`, `phone number`, `email`) VALUES (?,?,?,?,?)");
        $result->bind_param("sssss", $name, $userName, $password, $phoneNumber, $email);
        $result->execute();
        $result = $result->get_result();
        $_SESSION['signup'] = 'success';
    }
}
header('Location: loginSignupModiran.php');
?>
