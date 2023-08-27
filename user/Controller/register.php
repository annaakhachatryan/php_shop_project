<?php
session_start();
include '../Model/user_model.php';

if(empty($_POST['btn_reg'])) die;

$name = $_POST['name'];
$login= $_POST['login'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$conf_pass = $_POST['conf_pass'];


if(empty($name) || empty($login) || empty($email) || empty($pass) || empty($conf_pass)) {
    $_SESSION['error'] = "Empty field";
    header('location: ../View/reg_form.php');
    die;
}


if($pass != $conf_pass) {
    $_SESSION['error'] = "Passwords are not the same";
    header('location: ../View/reg_form.php');
    die;
}


//filter_var() - stugum e emaili hascen vaver e te voch
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "Invalid email";
    header('location: ../View/reg_form.php');
    die;
}


$user_model->add_user($name,$login,$pass,$email);


header('location: ../View/login_form.php');
