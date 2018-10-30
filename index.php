<?php
session_start();

$_SESSION['islogin']='empty';
$_SESSION['username']='empty';
$_SESSION['signup']='empty';
$_SESSION['photo']='empty';

header('Location: home.php');
?>