<?php
    include 'User/View/header.php';
    include 'User/Model/user_model.php';
?>

<div>
    <?php
        $all = $user_model->get_categories();
//        echo '<pre>';
//        print_r($all);
    ?>

    <table>
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
            padding: 10px;
            color: rgba(93, 20, 20, 0.992);
        }
        td{
            font-size: 20px;
            color: black;
            padding-top: 20px;
            border-bottom: 2px solid rgba(93, 20, 20, 0.702);
            padding: 8px;
        }
        a{
            text-decoration: none;
            color: rgba(93, 20, 20, 0.999);
        }
        a:hover{
            color: rgba(93, 20, 20, 0.502);
        }
        </style>
        <tr>
            <th class="th_categories" style="font-size: 30px;">Categories</th>
        </tr>

    <?php
    for($i = 0; $i < count($all);$i++){?>
        <tr id="<?=$all[$i]['id']?>">
            <td class="td_categories"><?=$all[$i]['name']?></td>
            <td><a href="user/View/products.php?cat_id=<?=$all[$i]['id']?>">Show</a></td>
        </tr>
    <?php } ?>

    </table>
</div>
