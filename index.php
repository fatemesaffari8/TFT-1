<?php
session_start();

$_SESSION['islogin']='empty';
$_SESSION['signup']='empty';


header('Location: home.php');
?>