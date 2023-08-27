<?php
include 'header.php';
?>

<div class="div_big1">
    <div class="div_form">
        <form action="../Controller/login.php" method="post">
            <input type="email" name="email" placeholder="Email" class="inputs">
            <input type="password" name="pass" placeholder="Password" class="inputs"><br>
            <input type="checkbox" name="inp_check" class="checkbox" class="inputs"><br>
            <button name="btn_login" value="btn" class="btn">Login</button>
        </form>
        <p style="text-align: center"></p>
        <?php
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
        ?>
    </div>
    <style>
         *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background-color: rgba(93, 20, 20, 0.302);
        }
        .div_big1{
            width: 500px;
            padding: 90px;
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            background-color: #fff;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.651);
            background-color: rgba(93, 20, 20, 0.202);
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .div_form{
            padding: 10px;
        }
        .inputs{
            padding: 10px;
            margin: 10px;
            border: none;
            border-bottom: 2px solid;
            background-color: rgba(93, 20, 20, 0.202);
            border-radius: 10px;
        }
        input::placeholder{
            color: white;
        }
        .btn{
            padding: 10px;
            width: 100px;
            margin: 10px;
            border: none;
            background-color: rgba(93, 20, 20, 0.752);
            cursor: pointer;
            border-radius: 10px;
            color: #fff;
            font-size: 17px;
        }
        .checkbox{
            margin: 10px;
        }
        .btn:hover{
            background-color: rgba(93, 20, 20, 0.502);
        }
    </style>
</div>

<?php
include "footer.php";
?>