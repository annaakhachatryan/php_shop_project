<?php

session_start();
include '../Model/user_model.php';
$action = $_POST['action'];
if ($action === 'add') {
    if(!isset($_SESSION['user_id'])) {
        echo  json_encode(['success'=>false]);
        die;
    }
    $id = $_POST['id'];
    $user_id = $_SESSION['user_id'];
    $user_model->add_to_wish($user_id,$id);
    echo json_encode(['success'=>true]);
}

if ($action === 'delete'){
    $id = $_POST['id'];
    $user_model->delete_from_wish($id);
}