<?php
session_start();
include "../Model/model.php";

if(!isset($_POST['btn_enter'])){
    header('location: ../index.php');
    die;
}

if(empty($_POST['login']) || empty($_POST['password'])){
    $_SESSION['error'] = "Empty login or password.";
    header('location: ../index.php');
    die;
}

$login = $_POST['login'];
$pass = $_POST['password'];


$count = $model->admin($login,$pass);
//print_r($count);
if($count > 0) {
    $_SESSION['admin']=$login;
    header('location: ../View/home.php');
    die;
}


$_SESSION['error'] = "Wrong login or password";
header('location: ../index.php');













