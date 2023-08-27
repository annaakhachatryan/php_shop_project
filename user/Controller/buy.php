<?php
include '../View/header.php';
include '../Model/user_model.php';


$user_id = $_SESSION['user_id'];
$total = $_SESSION['total'];
$n = $user_model->add_to_order($user_id,$total);
echo "<pre>";
print_r($n);
$user_model->clear_card($user_id);
header('location: ../../index.php');