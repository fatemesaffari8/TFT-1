<?php
session_start();
$_SESSION['islogin']='empty';
$_SESSION['username']='logout';
header('Location: home.php');
?>