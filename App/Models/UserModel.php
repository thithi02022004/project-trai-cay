<?php
namespace App\Models;
 class UserModel{
    private $db;
    function __construct(){
        $this->db=new DatabaseModel;
    }
    function insert_user($name, $email, $password, $address, $phone){
        $sql = "INSERT INTO db_users (Fullname, Email, Password, Address, Phone) VALUES (?,?,?,?,?)";
        return $this->db->insert($sql, $name, $email, $password, $address, $phone);
    }
    function check_login($email, $password){
        $sql = 'SELECT * FROM db_users WHERE Email = "'.$email.'" AND Password = "'.$password.'"';
        return $this->db->get_one($sql);
    }
    function insert_whislist($userID, $productID){
        $sql = "INSERT INTO db_whislists (CustomerID, ProductID) VALUE(?,?)";
        return $this->db->insert($sql, $userID, $productID);
    }
    function get_all_whislist($userID){
        $sql = "SELECT wls.*, pro.ProductName as ProductName, pro.Price as Price, pro.Image as Image, pro.Slug as Slug
        FROM db_whislists as wls
        JOIN db_users as us ON us.CustomerID = wls.CustomerID
        JOIN db_products as pro ON pro.ProductID = wls.ProductID
        WHERE wls.CustomerID = $userID";
        return $this->db->get_all($sql);
    }
    function delete_wishlist($productID){
        $sql = "DELETE FROM db_whislists WHERE ProductID = $productID";
        return $this->db->update($sql);
    }
    }
?>