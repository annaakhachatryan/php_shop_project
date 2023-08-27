<?php
include 'header.php';
include '../Model/user_model.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = 'Please log in first';
    header('location: login_form.php');
    die;
}

$user_id = $_SESSION['user_id'];
$all = $user_model->get_wish_items($user_id);
if (!count($all)) {
    echo "<h2>Your wish-list is empty</h2>";
    die;
}
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
        .btn_buy{
            background-color: rgba(93, 20, 20, 0.902); 
            padding: 5px; width: 70px; 
            border-radius: 10px;
            border: none;
        }
        .btn_buy:hover{
            background-color: rgba(93, 20, 20, 0.402);
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
        }
        td{
            font-size: 20px;
            color: black;
            padding-top: 20px;
        }
        .btn_wish_to_card, .btn_remove{
            padding: 10px;
            width: 120px;
            margin: 5px;
            border: none;
            background-color: rgba(122, 24, 24, 0.705);
            cursor: pointer;
            border-radius: 10px;
            color: #fff;
            font-size: 17px;
        }
        .btn_wish_to_card:hover, .btn_remove:hover{
            background-color: rgba(122, 24, 24, 0.405);
        }
        @media (max-width: 580px) and (min-width: 250px)  {
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
        <th>Add to cart</th>
        <th>Remove</th>
    </tr>
    <?php
    $total = 0;
    for ($i = 0; $i < count($all); $i++) {
        $price = $all[$i]['price'];
        $prod_id = $all[$i]['product_id'];
        ?>
        <tr id="<?= $all[$i]['id'] ?>">
            <td class="td_name"><?= $all[$i]['name'] ?></td>
            <td><img src="../Assets/images/<?= $all[$i]['image'] ?>" width="90" height="90"></td>
            <td><p class="td_desc"><?= $all[$i]['description'] ?></p></td>
            <td><p class="p_price"><?= $price ?></p></td>
            <td>
                <button id="<?= $prod_id ?>" class="btn_wish_to_card">Add to card</button>
                <button class="btn_remove">Remove</button>
            </td>
        </tr>

    <?php } ?>


    <!--</table>-->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(function () {
            $('.btn_remove').click(function () {
                let id = $(this).parents('tr').attr('id')
                $.ajax({
                    url: "../Controller/add_to_wish.php",
                    method: 'post',
                    data: {
                        id,
                        action: 'delete'
                    },
                    success: function () {
                        location.reload();
                    }
                })
            })

            $('.btn_wish_to_card').click(function () {
                let id = $(this).attr('id');
                $.ajax({
                    url: "../Controller/add_to_card.php",
                    method: 'post',
                    dataType: 'json',
                    data: {
                        id,
                        action: 'add'
                    },
                    success: function (res) {
                        if (!res.success) {
                            location.href = 'login_form.php'
                        }
                    }
                })
            })
        })
    </script>

