<?php

class user_model
{
    public $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect('localhost', 'root', '', 'shop');
        if (!$this->conn) {
            die(mysqli_connect_error($this->conn));
        }
    }

    public function __destruct()
    {
        mysqli_close($this->conn);
    }


    public function add_user($name, $login, $pass, $email)
    {
        $query = "INSERT INTO users VALUES('null','$name','$login','$pass','$email')";
        $res = mysqli_query($this->conn, $query);
    }

    public function check_user($email, $pass)
    {
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
        $res = mysqli_query($this->conn, $query);
        $result = mysqli_num_rows($res);
        if ($result > 0) {
            return mysqli_fetch_assoc($res);
        }
        return false;
    }

    public function get_categories()
    {
        $query = "SELECT * FROM categories";
        $res = mysqli_query($this->conn, $query);
        return mysqli_fetch_all($res, MYSQLI_ASSOC);

    }

    public function get_products($cat_id)
    {
        $query = "SELECT * FROM products WHERE cat_id = '$cat_id'";
        $res = mysqli_query($this->conn, $query);
        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }

    public function add_to_wish($user_id, $prod_id)
    {
        $query = "INSERT INTO wish VALUES('null','$user_id', '$prod_id') ";
        $res = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($res) > 0) {
            return;
        }
    }

    public function get_wish_items($user_id) {
        $query = "SELECT name,price,image,description,wish.id,product_id FROM wish JOIN products ON product_id=products.id WHERE  user_id = '$user_id'";
        $res = mysqli_query($this->conn,$query);
        return mysqli_fetch_all($res,MYSQLI_ASSOC);
    }

    public function delete_from_wish($id)
    {
        $query = "DELETE FROM wish WHERE id = '$id'";
        $res = mysqli_query($this->conn, $query);

    }

    public function add_to_card($user_id, $prod_id, $quantity)
    {
        $query1 = "INSERT INTO card VALUES ('null', '$user_id','$prod_id','$quantity')";
        $res = mysqli_query($this->conn, $query1);
        $query2 = "SELECT * FROM card WHERE  user_id = '$user_id' AND product_id = '$prod_id'";
        $res2 = mysqli_query($this->conn, $query2);
        if (mysqli_num_rows($res2) > 0) {
            return;
        }
    }


    public function update($quantity, $id)
    {
        $query = "UPDATE card SET quantity = '$quantity' WHERE  id = '$id'";
        $res = mysqli_query($this->conn, $query);
    }

    public function delete($id)
    {
        $query = "DELETE FROM card WHERE  id = '$id'";
        $res = mysqli_query($this->conn, $query);
    }


    public function clear_card($user_id)
    {
        $query = "DELETE FROM card WHERE user_id = '$user_id'";
        $res = mysqli_query($this->conn, $query);
    }

    public function get_card_items($user_id) {
        $query = "SELECT name,price,image,quantity,description,card.id,product_id FROM card JOIN products ON product_id=products.id WHERE  user_id = '$user_id'";
        $res = mysqli_query($this->conn,$query);
        $result = mysqli_fetch_all($res,MYSQLI_ASSOC);
        return $result;
    }


    public function add_to_order($user_id, $total)
    {
        $query = "SELECT * FROM card WHERE user_id = '$user_id'";
        $res = mysqli_query($this->conn, $query);
        $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
        foreach ($result as $row) {
            $prod_id = $row['product_id'];
            $quantity = $row['quantity'];
            $user_id =$row['user_id'];
            $query = "INSERT INTO order_items VALUES('null', '$user_id','$prod_id', '$quantity')";
            $res = mysqli_query($this->conn, $query);
        }
        return $result;
    }


}

$user_model = new user_model();

