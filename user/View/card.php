<?php
include 'header.php';
include '../Model/user_model.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = 'Please log in first';
    header('location: login_form.php');
    die;
}

$user_id = $_SESSION['user_id'];
$all = $user_model->get_card_items($user_id);
if (!count($all)) {
    echo "<h2>Your card is empty</h2>";
    die;
}
?>

<table>
    <tr>
        <th>Name</th>
        <th>Image</th>
        <th>Description</th>
        <th>Price</th>
        <th>Sum</th>
        <th>Remove</th>
    </tr>
    <?php
    $total = 0;
    for ($i = 0; $i < count($all); $i++) {
        $price = $all[$i]['price'];
        $quantity = $all[$i]['quantity'];
        $sum = $price * $quantity;
        $total += $sum;
        ?>
        <tr id="<?= $all[$i]['id'] ?>">
            <td class="td_name"><?= $all[$i]['name'] ?></td>
            <td><img src="../Assets/images/<?= $all[$i]['image'] ?>" width="80" height="80"></td>
            <td><p class="td_desc"><?= $all[$i]['description'] ?></p></td>
            <td><p class="p_price"><?= $price ?></p></td>
            <td>
                <button class="minus">-</button>
                <span class="quant"><?= $all[$i]['quantity'] ?></span>
                <button class="plus">+</button>
            </td>
            <td><input type="number" class="inp_quantity" value="<?= $quantity ?>"></td>
            <td><p class="sum">$ <?= $sum ?></p></td>
            <td>
                <button class="btn_remove">Remove</button>
            </td>
        </tr>

        <?php
    }
    echo "<tr><td colspan='6'>Total</td><td class='total'> $ $total</td></tr>";
    $_SESSION['total'] = $total;
    ?>
    <tr>
        <td colspan="7" align="right">
            <button class="btn_buy" name="btn_buy">
                <a style="color: white; text-decoration: none" href="../Controller/buy.php">Buy</a>
            </button>
        </td>
    </tr>
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
            padding-left: 20px;
        }
        td{
            font-size: 20px;
            color: black;
            padding-top: 20px;
            padding: 8px;
        }

        .btn_remove{
            padding: 10px;
            width: 100px;
            margin: 5px;
            border: none;
            background-color: rgba(122, 24, 24, 0.705);
            cursor: pointer;
            border-radius: 10px;
            color: #fff;
            font-size: 17px;
        }
        .btn_remove:hover{
            background-color: rgba(122, 24, 24, 0.405);
        }
        input{
            background-color: rgba(93, 20, 20, 0.302);
            padding: 10px;
            border-radius: 10px;
            border: none;
            border-bottom: 2px solid rgba(93, 20, 20, 0.992);
            width: 70px;
        }
        .plus, .minus{
            background-color: rgba(93, 20, 20, 0.992);
            border: none;
            border-radius: 5px;
            padding: 6px;
            color: #fff;
        }
        .plus:hover, .minus:hover{
            background-color: rgba(93, 20, 20, 0.482);
        }

        @media (max-width: 740px) and (min-width: 250px)  {
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
</table>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $(function () {
        $('.plus').click(function () {
            let price = $(this).parents('tr').find('.p_price').html()
            let quant = $(this).parents('tr').find('.quant').html()
            let total = $(this).parents('tr').find('.total').html()
            let id = $(this).parents('tr').attr('id')
            console.log(price + " " + quant + " " + total);
            quant++;
            $(this).parents('tr').find('.qunat').html(quant);
            $('tr').find('.total').html(quant * price);
            $.ajax({
                url: "../Controller/add_to_card.php",
                method: 'post',
                data: {
                    quant,id,
                    action: 'update'
                },
                success:function (res) {
                    location.reload();
                }
            })
        })


        $('.minus').click(function () {
            let price = $(this).parents('tr').find('.p_price').html()
            let quant = $(this).parents('tr').find('.quant').html()
            let total = $(this).parents('tr').find('.total').html()
            let id = $(this).parents('tr').attr('id')
            // console.log(price + " " + quant + " " + total);
            if (quant > 1) {
                quant--;
                $(this).parents('tr').find('.qunat').html(quant);
                $('tr').find('.total').html(quant * price);
                $.ajax({
                    url: "../Controller/add_to_card.php",
                    method: 'post',
                    data: {
                        quant, id,
                        action: 'update'
                    },
                    success: function (res) {
                        location.reload();
                    }
                })
            }
        })

        $('.btn_remove').click(function () {
            let id = $(this).parents('tr').attr('id')
            $.ajax({
                url: "../Controller/add_to_card.php",
                method: 'post',
                data: {
                    id,
                    action: 'delete'
                },
                success:function () {
                    location.reload();
                }
            })
        })
    })
</script>

<?php
include 'footer.php';
?>