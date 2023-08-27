<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        nav ul{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            background-color: rgba(122, 24, 24, 0.300);
        }
        ul li{
            display: inline-block;
            padding: 20px;
            font-size: 20px;
        }
        ul li a{
            color: rgba(93, 20, 20, 0.952);
            text-decoration: none;
        }
        ul li a:hover{
            color: black;
            text-decoration: underline;
        }

        
    </style>
</head>
<body>


    <?php
    session_start();
    if(isset($_COOKIE['user_email'])) {
        $_SESSION['user_email'] = $_COOKIE['user_email'];
        $_SESSION['user_id'] = $_COOKIE['user_id'];
    }
    ?>


    <nav>
        <ul>
            <li><a href="http://localhost/shop" class="active">Home</a></li>
            <li><a href="http://localhost/shop/user/View/card.php">Card</a></li>
            <li><a href="http://localhost/shop/user/View/wish.php">Wish list</a></li>

            <?php
            if (isset($_SESSION['user_email'])) {?>
                <li><a href="http://localhost/shop/user/Controller/log_out.php">Log Out</a></li>
                <li><a href="#"><?=$_SESSION['user_email']?></a></li>
            <?php
            }else{
            ?>
                <li><a href="http://localhost/shop/user/View/login_form.php">Login</a></li>
                <li><a href="http://localhost/shop/user/View/reg_form.php">Registration</a></li>
            <?php } ?>
        </ul>
    </nav>

