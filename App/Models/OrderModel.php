<?php
namespace App\Models;
 class OrderModel{
    private $db;
    function __construct(){
        $this->db=new DatabaseModel;
    }
    function get_last_order_id(){
        $sql = "SELECT * FROM db_orders ORDER BY OrderID DESC LIMIT 1";
        $result = $this->db->get_one($sql);
        return $result["OrderID"];
    }
    function insert_order($id_user, $name, $phone, $email, $address, $total, $created_at, $exported_at, $momostatus){
        
        // var_dump($id_order);
        $sql = "INSERT INTO db_orders (CustomerID, TotalAmount, OrderDate, Status ) VALUES(?,?,?,?)";
        $this->db->insert($sql, $id_user, $total, $created_at, $momostatus);
        $id_order = $this->get_last_order_id();
        foreach ($_SESSION['cart'] as $key => $item) {
            $sql_order_detail = "INSERT INTO db_orderdetails (OrderID, ProductName, Image, Quantity, UnitPrice, Discount, Subtotal)
                                VALUES(?,?,?,?,?,?,?)";
        $this->db->insert($sql_order_detail, $id_order, $item['name'], $item['img'], $item['qty'], $item['price'], $item['discount'], ($item['price']*$item['qty']) / $item['discount']);
        }
    }
    function list_order(){
        $sql = "SELECT od.*, us.FullName as customerName,  us.Email as customerEmail, us.Phone as customerPhone, us.Address as customerAddress
        FROM db_orders as od
        JOIN db_users as us ON od.CustomerID = us.CustomerID";
        return $this->db->get_all($sql);
    }
    function order_detail($id){
        $sql = "SELECT * FROM db_orderdetails WHERE OrderID = $id";
        return $this->db->get_all($sql);
    }
    function order_rowid($id) {
        $sql = "SELECT * FROM db_orders WHERE OrderID = $id";
        return $this->db->get_one($sql);
    }
    function order_confirm($stage, $id){
        $sql = "UPDATE db_orders SET ShippingStatus=? WHERE OrderID=?";
        return $this->db->update($sql, $stage, $id);
    }
    function get_order_momo(){
        $id_order = $this->get_last_order_id();
        $sql = "SELECT * FROM db_orders WHERE OrderID = $id_order";
        return $this->db->get_one($sql);
    }
    function order_status_success(){
        $id_order = $this->get_last_order_id();
        $sql = "UPDATE db_orders SET Status = 1 WHERE OrderID = $id_order";
        return $this->db->update($sql);
    }
    }
?>