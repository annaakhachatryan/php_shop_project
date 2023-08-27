<!doctype html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="../Assets/JS/script.js">

    </script>

    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background-color: rgba(122, 24, 24, 0.309);
        }
        .log_out{
            text-decoration: none;
            color: red;
            font-size: 20px;
            display: flex;
            align-self: center;
            justify-content: center;
            padding: 15px;
        }
        .log_out:hover{
            color: blue;
        }
        table, .div{
            display: flex;
            align-self: center;
            justify-content: center;
        }
        #inp{
            padding: 8px;
            width: 170px;
            background-color: rgba(122, 24, 24, 0.309);
        }
        #inp::placeholder{
            color: white;
        }
        #btn_add, .btn_upd, .btn_del{
            border: none;
            border-radius: 10px;
            background-color: rgba(122, 24, 24, 0.309);
            width: 80px;
            padding: 5px;
            margin-left: 10px;
            cursor: pointer;
            color: white;
        }
        #btn_add:hover, .btn_upd:hover, .btn_del:hover{
            background-color: rgba(122, 24, 24, 0.509);
        }
        .show{
            text-decoration: none;
            color: #442000;
            margin-left: 7px;
        }
        .show:hover{
            text-decoration: dashed;
            color: rgba(122, 24, 24, 0.609);
        }
        th{
            padding: 5px;
            font-size: 18px;
        }
        td{
            padding: 2px;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <a href="../Controller/logout.php" class="log_out">Log Out</a>
    <?php
        session_start();
        include "../Model/model.php";
        $model = new Model();

        if(!isset($_SESSION['admin'])){
            header('location: ../index.php');
            die;
        }

        echo "<p style='color: #442000; font-size: 25px; padding: 10px; text-align: center;'> Welcome home " . $_SESSION['admin'] .'!'. "<br><br> </p>";
    ?>



    <?php
        $all = $model->get_categories();
    ?>

    <div class="big_div">
    <div class="div">
        <input type="text" id="inp" placeholder="Add products">
        <button id="btn_add" name="add">Add</button>
        <p id="p_mess"></p>
    </div>

    <div>
    <table>
        <tr>
            <th>Name</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php
        for($i = 0; $i < count($all); $i++) { ?>
            <tr id="<?= $all[$i]['id']?>">
                <td contenteditable="true"><?=$all[$i]['name']?></td>
                <td><button class="btn_upd">Update</button></td>
                <td><button class="btn_del">Delete</button></td>
                <td><a href="products.php?cat_id=<?=$all[$i]['id']?>" class="show">Show</a></td>
            </tr>

        <?php } ?>



    </table>
    </div>
    </div>









</body>
</html>
