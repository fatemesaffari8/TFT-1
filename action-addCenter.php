<?php
$connection = mysqli_connect("localhost","root","","tft");

if(!$connection)
  die("connection failed:".mysqli_error());
mysqli_set_charset($connection,'utf8');

session_start();

$counter=0;
if(isset($_POST['center-name']) && !empty($_POST['center-name']))
    $counter++;
if(isset($_POST['center-address']) && !empty($_POST['center-address']))
    $counter++;
if(isset($_POST['phone-number']) && !empty($_POST['phone-number']))
    $counter++;
if(isset($_POST['email']) && !empty($_POST['email']))
    $counter++;
if(isset($_POST['category']) && !empty($_POST['category']))
    $counter++;
if(isset($_POST['ad']) && !empty($_POST['ad']))
    $counter++;
if(isset($_POST['ticket']) && !empty($_POST['ticket']))
    $counter++;
if(isset($_POST['account-number']) && !empty($_POST['account-number']))
    $counter++;
if(isset($_POST['description']) && !empty($_POST['description']))
    $counter++;

if(isset($_POST['sat-from']) && !empty($_POST['sat-from']))
    $counter++;
if(isset($_POST['sat-to']) && !empty($_POST['sat-to']))
    $counter++;

if(isset($_POST['sun-from']) && !empty($_POST['sun-from']))
    $counter++;
if(isset($_POST['sun-to']) && !empty($_POST['sun-to']))
    $counter++;

if(isset($_POST['mon-from']) && !empty($_POST['mon-from']))
    $counter++;
if(isset($_POST['mon-to']) && !empty($_POST['mon-to']))
    $counter++;

if(isset($_POST['tue-from']) && !empty($_POST['tue-from']))
    $counter++;
if(isset($_POST['tue-to']) && !empty($_POST['tue-to']))
    $counter++;

if(isset($_POST['wed-from']) && !empty($_POST['wed-from']))
    $counter++;
if(isset($_POST['wed-to']) && !empty($_POST['wed-to']))
    $counter++;

if(isset($_POST['thu-from']) && !empty($_POST['thu-from']))
    $counter++;
if(isset($_POST['thu-to']) && !empty($_POST['thu-to']))
    $counter++;

if(isset($_POST['fri-from']) && !empty($_POST['fri-from']))
    $counter++;
if(isset($_POST['fri-to']) && !empty($_POST['fri-to']))
    $counter++;

if($counter!=0)
{
    $centerName=$_POST['center-name'];
    $centerAddress=$_POST['center-address'];
    $phoneNumber=$_POST['phone-number'];
    $email=$_POST['email'];
    $category=$_POST['category'];
    $ad=$_POST['ad'];
    $ticket=$_POST['ticket'];
    $accountNumber=$_POST['account-number'];
    $description=$_POST['description'];

    $satFrom=$_POST['sat-from'];
    $satTo=$_POST['sat-to'];

    $sunFrom=$_POST['sun-from'];
    $sunTo=$_POST['sun-to'];

    $monFrom=$_POST['mon-from'];
    $monTo=$_POST['mon-to'];

    $tueFrom=$_POST['tue-from'];
    $tueTo=$_POST['tue-to'];

    $wedFrom=$_POST['wed-from'];
    $wedTo=$_POST['wed-to'];

    $thuFrom=$_POST['thu-from'];
    $thuTo=$_POST['thu-to'];

    $friFrom=$_POST['fri-from'];
    $friTo=$_POST['fri-to'];

    $result = $connection->prepare("INSERT INTO `centers`(`center-name`,`center-address`,`phone-number`,`email`,`category`,`ad`,`ticket`,`account-number`,`description`
            ,`sat-from`,`sat-to`,`sun-from`,`sun-to`,`mon-from`,`mon-to`,`tue-from`,`tue-to`,`wed-from`,`wed-to`,`thu-from`,`thu-to`
            ,`fri-from`,`fri-to`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $result->bind_param("ssdsssddsdddddddddddddd", $centerName, $centerAddress, $phoneNumber, $email, $category, $ad, $ticket, $accountNumber, $description, $satFrom,
        $satTo, $sunFrom, $sunTo, $monFrom, $monTo, $tueFrom, $tueTo, $wedFrom, $wedTo, $thuFrom, $thuTo, $friFrom, $friTo);
    $result->execute();
    $result = $result->get_result();
    $_SESSION['addCenter'] = 'success';
}
header('Location: addCenter.php');
?>
