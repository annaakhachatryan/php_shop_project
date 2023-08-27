<?php
    session_start();
    include '../Model/user_model.php';

    if(empty($_POST['btn_login'])) die;
    $email = $_POST['email'];
    $pass = $_POST['pass'];


    if (empty($email) || empty($pass)) {
        $_SESSION['error'] = 'Empty field';
        header('location: ../View/login_form.php');
        die;
    }

    $user = $user_model->check_user($email,$pass);
    print_r($user);

    if(!$user) {
        $_SESSION['error'] = "Wrong login or password";
        header('location: ../View/login_form.php');
        die;
    }

    if(isset($_POST['inp_check'])) {
        setcookie('user_id', $user['id'], time() + (86400 * 5), "/");
        setcookie('user_email', $user['email'], time() + (86400 * 5), "/");
    }

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['email'];
    header('location: ../../index.php');