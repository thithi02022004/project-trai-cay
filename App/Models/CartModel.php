<?php
namespace App\Models;
 class CartModel{
    private $db;
    function __construct(){
        $this->db=new DatabaseModel;
    }
    // thêm sản phẩm vào giỏ hàng
    function add_one_product($ProductID){
        $sql = "SELECT * FROM db_products WHERE ProductID = $ProductID";
        return $this->db->get_one($sql);
    }
    function cart_content(){
        if (isset($_SESSION['cart'])) {
            $cart = array_values($_SESSION['cart']); //Row cart là mảng 2 chiều
            return $cart;
        }
        return NULL;
    }
    function update_cart($data){
        $cart = $this->cart_content();
        foreach ($cart as $key => $item) {
            if ($item['id'] == $data[$key]['id']) {
                if ($data[$key]['qty'] == 0) {
                    unset($_SESSION['cart']);
                } else {
                    $cart[$key]['qty'] = $data[$key]['qty']; //Thay đổi số lượng sp 
                }
            }
        }
        $_SESSION['cart'] = array_values($cart);
    }
    }
?>