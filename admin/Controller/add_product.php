<?php
session_start();
include '../Model/model.php';
$model = new Model();


$action = $_POST['action'];


if($action == 'add') {
    $cat_id = $_SESSION['cat_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $img = $_FILES['img']['name'];
    echo($_FILES['img']['tmp_name']);
    //['tmp_name'] - jamanakavor anuny,vor anunov pahvel e nkary
    //temporary files - jamanakavor fail
    move_uploaded_file($_FILES['img']['tmp_name'], "../Assets/images/$img");
    $model->add_products($cat_id,$name,$price,$desc,$img);
    header('location: ../View/products.php');
}


if($action === 'delete') {
    $id = $_POST['id'];
    $model->delete_product($id);
}

if($action === 'update') {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $id = $_POST['id'];
    $model->update_product($name,$desc,$price,$id);
}




