<?php
session_start();
include '../Model/user_model.php';
$action = $_POST['action'];
if ($action === 'add') {
    if(!isset($_SESSION['user_id'])) {
        echo json_encode(['success'=>false]);
        die;
    }
    $id = $_POST['id'];
    $user_id = $_SESSION['user_id'];
    $user_model->add_to_card($user_id,$id,"1");
    echo json_encode(['success'=>true]);
}

if ($action === 'update') {
    $id = $_POST['id'];
    $quantity = $_POST['quant'];
    $user_model->update($quantity,$id);
}

if ($action === 'delete') {
    $id = $_POST['id'];
    $user_model->delete($id);

}