<?php

class Model
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


    public function admin($login, $pass)
    {
        $query = "SELECT * FROM admin WHERE login='$login' AND password='$pass'";
        $res = mysqli_query($this->conn, $query);
        // veradarcnum e ardyunqi togheri qanaky
        return mysqli_num_rows($res);
    }

    // category

    public function add_category($name)
    {
        $query = "INSERT INTO categories(name) VALUES ('$name')";
        $res = mysqli_query($this->conn, $query);
    }

    public function get_categories()
    {
        $query = "SELECT * FROM categories";
        $res = mysqli_query($this->conn, $query);
        $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
        return $result;
    }

    public function update($name, $id) {
        $query = "UPDATE categories SET name='$name' WHERE id = '$id'";
        $res = mysqli_query($this->conn,$query);
    }

    public function delete($id) {
        $query = "DELETE FROM categories WHERE id = '$id'";
        $res = mysqli_query($this->conn,$query);
    }


    // product

    public function add_products($cat_id,$name,$price,$desc,$img) {
        $query = "INSERT INTO products VALUES (null,'$name','$desc','$cat_id','$img','$price')";
        $res = mysqli_query($this->conn,$query);
    }

    public function get_products($cat_id) {
        $query = "SELECT * FROM products WHERE  cat_id = '$cat_id'";
        $res = mysqli_query($this->conn,$query);
        return mysqli_fetch_all($res,MYSQLI_ASSOC);
    }


    public function update_product($name,$desc,$price,$id) {
        $query = "UPDATE products SET name = '$name', description = '$desc',price = '$price' WHERE id = '$id'";
        $res = mysqli_query($this->conn,$query);
    }


    public function delete_product($id) {
        $query = "DELETE FROM products WHERE id = '$id'";
        $res = mysqli_query($this->conn,$query);

    }



}

$model = new Model();