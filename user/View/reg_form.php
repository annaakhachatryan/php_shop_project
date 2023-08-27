<?php
include 'header.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .div_form{
            margin-top: 10vh;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        body{
            background-color: rgba(122, 24, 24, 0.250);
        }
        .inputs{
            width: 40vh;
            padding: 10px;
            margin: 7px;
            border-radius: 10px;
            border-color: rgba(122, 24, 24, 0.805);
            background-color: rgba(122, 24, 24, 0.205);
        }
        .inputs::placeholder{
            color: white;
        }
        .btn{
            padding: 10px;
            width: 130px;
            margin: 7px;
            border: none;
            background-color: rgba(122, 24, 24, 0.705);
            cursor: pointer;
            border-radius: 10px;
            color: #fff;
            font-size: 17px;
        }
        .btn:hover{
            background-color: rgba(122, 24, 24, 0.405);
        }
        @media (max-width: 500px) and (min-width: 250px)  {
            .inputs{
                width: 30vh;
                padding: 7px;
                margin: 7px;
            }
        }
    </style>
</head>
<body>
<div class="div_big" >
    <div class="div_form">
        <form action="../Controller/register.php" method="post">
            <input type="text" name="name" placeholder="Name" class="inputs"><br>
            <input type="text" name="login" placeholder="Login" class="inputs"><br>
            <input type="email" name="email" placeholder="Email" class="inputs"><br>
            <input type="password" name="pass" placeholder="Password" class="inputs"><br>
            <input type="password" name="conf_pass" placeholder="Confirm password" class="inputs"><br>
            <button name="btn_reg" value="btn" class="btn">Registration</button>
        </form>

        <div style="text-align:center; color: red;">
            <?php
                if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
            ?>
        </div>
    </div>
</div>
</body>
</html>