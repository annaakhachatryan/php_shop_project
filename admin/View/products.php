<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>


<?php
include '../Model/model.php';
session_start();
if(isset($_GET['cat_id'])){
    $_SESSION['cat_id'] = $_GET['cat_id'];
}


?>
<form action="../Controller/add_product.php" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="desc" placeholder="Description">
    <input type="text" name="price" placeholder="Price">
    <input type="file" name="img">
    <button name="action" value="add" class="add">Add product</button>
</form>

<style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background-color: rgba(122, 24, 24, 0.109);
        }
        form{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: wrap;
        }
        
        input{
            padding: 10px;
            margin: 10px;
            border: none;
            border-bottom: 1px solid brown;
            color: white;
            display: flex;
            flex-direction: wrap;
            background-color: rgba(122, 24, 24, 0.109);
            border-radius: 10px;
        }
        input::placeholder{
            color: black;
        }
</style>

<?php
$model = new Model();
$all = $model->get_products($_SESSION['cat_id']);
// print_r($all);
?>




<table>
    <tr>
        <th>Name</th>
        <th>Image</th>
        <th>Description</th>
        <th>Price</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php

    for($i=0;$i<count($all);$i++){?>
        <tr id="<?=$all[$i]['id']?>">
            <td class="td_name" contenteditable>
                <?=$all[$i]['name']?></td>
            <td><img src="../Assets/images/<?=$all[$i]['image']?>" width="80" height="80"></td>

            <td ><p class="td_desc"contenteditable><?=$all[$i]['description']?></p></td>
            <td><p contenteditable class="p_price"><?=$all[$i]['price']?></p></td>
            <td><button class="btn_upd">Update</button></td>
            <td><button class="btn_del">Delete</button></td>
            <style>
                .add, .btn_upd, .btn_del{
                    border: none;
                    border-radius: 10px;
                    background-color: rgba(122, 24, 24, 0.309);
                    width: 90px;
                    padding: 5px;
                    margin-left: 10px;
                    cursor: pointer;
                    color: white;
                }
                .add{
                    width: 120px;
                }
                .add:hover,.btn_upd:hover, .btn_del:hover{
                    background-color: rgba(122, 24, 24, 0.509);
                }
                tr{
                    text-align: center;
                }
                th{
                    font-size: 20px;
                    color: rgb(122, 24, 24);
                }
                td,th{
                    padding: 8px;
                    border-bottom: 2px solid;
                    border-color: rgba(122, 24, 24, 0.609);

                }
                table{
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-top: 50px;
                }
            </style>
        </tr>

    <?php } ?>

</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn_upd').click(function(){

            let self = $(this).parents('tr');
            let id = self.attr('id');
            let name = self.find('.td_name').text();
            let desc = self.find('.td_desc').text();
            let price = self.find('.p_price').text();

            $.ajax({
                url: '../Controller/add_product.php',
                method: 'post',
                data: {
                    name,
                    desc,
                    price,
                    id,
                    action: 'update',
                },
                success: function(){
                    location.reload();
                },
            })
        });

        $('.btn_del').click(function(){
            let id = $(this).parents('tr').attr('id');
            $.ajax({
                url: '../Controller/add_product.php',
                method: 'post',
                data: {
                    id,
                    action: 'delete',
                },
                success: function(){
                    location.reload();
                },

            })
        });

    });
</script>
</body>
</html>
