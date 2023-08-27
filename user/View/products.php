<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<?php
    include 'header.php';
    include '../Model/user_model.php';

    if (isset($_GET['cat_id'])) {
        $_SESSION['cat_id'] = $_GET['cat_id'];
    }

    $all = $user_model->get_products($_SESSION['cat_id']);
//    echo "<pre>";
//    print_r($all)
?>

<style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background-color: rgba(93, 20, 20, 0.302);
        }

        table{
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: rgba(93, 20, 20, 0.992);
        }
        th{
            font-size: 25px;
            padding-left: 20px;
        }
        td{
            font-size: 20px;
            color: black;
            padding-top: 20px;
            padding: 8px;
        }

        .btn_add, .btn_wish{
            padding: 10px;
            width: 150px;
            margin: 7px;
            border: none;
            background-color: rgba(122, 24, 24, 0.705);
            cursor: pointer;
            border-radius: 10px;
            color: #fff;
            font-size: 17px;
        }
        .btn_add:hover, .btn_wish:hover{
            background-color: rgba(122, 24, 24, 0.405);
        }

        @media (max-width: 760px) and (min-width: 250px)  {
            table{
            padding: 10px;
        }
        th{
            font-size: 20px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }
        td{
            font-size: 17px;
            padding-top: 15px;
        }
        td{
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }
        }
</style>
<table>
    <tr>
        <th>Name</th>
        <th>Image</th>
        <th>Description</th>
        <th>Price</th>
    </tr>

    <?php
    for($i = 0;$i < count($all); $i++) { ?>
    <tr id="<?=$all[$i]['id']?>">
        <td class="td_name"><?=$all[$i]['name']?></td>
        <td><img src="../Assets/images/<?=$all[$i]['image']?>" width="100" height="100"></td>
        <td><p class="td_desc"><?=$all[$i]['description']?></p></td>
        <td><p class="p_price"><?=$all[$i]['price']?></p></td>
        <td><button class="btn_add">Add to card</button></td>
        <td><button class="btn_wish">Add to wish list</button></td>
    </tr>
    <?php } ?>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $(function (){
        $('.btn_add').click(function (){
            let id = $(this).parents('tr').attr('id');
            // alert(id)
            $.ajax({
                url: "../Controller/add_to_card.php",
                method: "post",
                dataType: 'json',
                data: {
                    id,
                    action: 'add'
                },
                success: function (res) {
                    if (!res.success){
                        location.href = 'login_form.php'
                    } else {
                        console.log(res)
                    }
                }
            })
        })

            $('.btn_wish').click(function (){
                let id = $(this).parents('tr').attr('id');
                alert(id)
                $.ajax({
                    url: "../Controller/add_to_wish.php",
                    method: "post",
                    dataType: 'json',
                    data: {
                        id,
                        action: 'add'
                    },
                    success: function (res) {
                        if (!res.success){
                            location.href = 'login_form.php'
                        } else {
                            console.log(res)
                        }
                    }
                })
            })
    })



</script>
</body>
</html>
