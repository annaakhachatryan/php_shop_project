<!doctype html>
<html lang="en">
<head>
    <title>Shop</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        form{
            display: flex;
            align-items: center;
            justify-content: center;
            top: 40%;
            left: 40%;
            position: absolute;
            border-radius: 10px;
            padding: 2px;
            background-color: rgba(0, 0, 0, 0.220);
        }
        input{
            padding: 10px;
            margin: 10px;
            border: none;
            border-bottom: 1px solid;
            background-color: rgba(0, 0, 0, 0.220);
            color: white;
        }
        input::placeholder{
            color: white;
        }
        div{
            padding: 30px;
        }
        .div{
            background-image: url("../admin/Assets//images/login.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
        }
        button{
            border: rgb(54, 7, 7);
            background-color: rgb(54, 7, 7);
            color: white;
            padding: 7px;
            width: 100px;
            text-align: center;
            margin: 10px;
            cursor: pointer;
        }

        @media (max-width: 770px) and (min-width: 300px)  {
            form{
                top: 40%;
                left: 25%;
            }
        }
        @media (max-width: 400px) and (min-width: 250px)  {
            input{
                padding: 5px;
                margin: 5px;
            }
            form{
                top: 40%;
                left: 10%;
            }
            button{
            padding: 5px;
            width: 80px;
            margin: 5px;
        }
        }

    </style>
</head>
<body>
    <div class="div">
    <form action="Controller/login_check.php" method="post">
        <div>
        <input type="text" name="login" placeholder="Login"> <br>
        <input type="text" name="password" placeholder="Password"><br>
        <button name="btn_enter" value="enter">Enter</button>
        </div>
    </form>
    </div>
    <?php
        session_start();
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
    ?>
</body>
</html>