<?php
session_start();

include '../Model/model.php';
$action = $_POST['action'];
$name = $_POST["name"];





if($action == 'add'){
    if(empty($name)){
        echo 'error';
    }
    $model->add_category($name);


}
if($action=='update'){
    $name=$_POST['name'];
    $id = $_POST['id'];
    $model->update($name,$id);
}

if($action=='delete'){
    $id = $_POST['id'];
    $model->delete($id);
}






?>