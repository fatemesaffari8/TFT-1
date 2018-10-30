<?php
$connection = mysqli_connect("localhost","root","","tft");
if(!$connection)
    die("connection failed:".mysqli_error());
mysqli_set_charset($connection,'utf8');
$counter=0;
session_start();
$_SESSION['signup']='empty';
$_SESSION['photo']='empty';

if(isset($_POST['name']) && !empty($_POST['name']))
    $counter++;
if(isset($_POST['last-name']) && !empty($_POST['last-name']))
    $counter++;
if(isset($_POST['user-name']) && !empty($_POST['user-name']))
    $counter++;
if(isset($_POST['password']) && !empty($_POST['password']))
    $counter++;
if(isset($_POST['phone-number']) && !empty($_POST['phone-number']))
    $counter++;
if(isset($_POST['email']) && !empty($_POST['email']))
    $counter++;
if(isset($_FILES['photo']) && !empty($_FILES['photo']))
    $counter++;
//if(isset($_POST['gender']) && !empty($_POST['gender']))
//  $counter++;

if($counter==7)
{
    $name=$_POST['name'];
    $lastName=$_POST['last-name'];
    $userName=$_POST['user-name'];
    $password=sha1($_POST['password']);
    $phoneNumber=$_POST['phone-number'];
    $email=&$_POST['email'];

    $result = $connection->prepare("SELECT * FROM `users` WHERE `user name`=?");
    $result->bind_param("s", $userName);
    $result->execute();
    $result=$result->get_result();
    if(($result->num_rows)==1)
        $_SESSION['signup']='similarUserName';
    else
    {
        $target_dir = "uploads/";
        $target_file = $target_dir.basename($_FILES["photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
        {
            $_SESSION['photo']='notAllowedَ';
            $uploadOk = 0;
        }
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if($check == false)
        {
            $_SESSION['photo']='notImage';
            $uploadOk = 0;
        }
        if ($uploadOk == 1)
        {
            move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
            $result = $connection->prepare("INSERT INTO `users`(`name`, `last name`, `user name`,`password`, `phone number`, `email`) VALUES (?,?,?,?,?,?)");
            $result->bind_param("ssssss", $name, $lastName, $userName, $password, $phoneNumber, $email);
            $result->execute();
            $result = $result->get_result();
            $_SESSION['signup'] = 'success';
        }
    }
}
header('Location: home.php');
?>