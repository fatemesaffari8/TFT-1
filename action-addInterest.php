<?php
$connection = mysqli_connect("localhost","root","","tft");

if(!$connection)
  die("connection failed:".mysqli_error());
mysqli_set_charset($connection,'utf8');

session_start();

$counter=0;
if(isset($_POST['category']) && !empty($_POST['category']))
    $counter++;

if($counter==1)
{
    $category = $_POST['category'];
    $userName = $_SESSION['username'];

    $result = $connection->prepare("UPDATE `users` SET `interest`=? WHERE  `user name`=?");
    $result->bind_param("ss", $category, $userName);
    $result->execute();
    $result = $result->get_result();
    $_SESSION['addInterest'] = 'success';
}
header('Location: interest.php');
?>
