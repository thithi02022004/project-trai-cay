<?php
namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\CartModel;
use App\Models\CategoryModel;
class CartController extends BaseController{
    function __construct(){
        $this->cart = new CartModel;
        $this->pro = new ProductModel;
        $this->cate = new CategoryModel;
    }
    function add_cart(){
        // var_dump($_REQUEST); die();
                if (isset($_SESSION['user'])) {
                    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
                    $ProductID = $_GET['id'];
                    // var_dump($slug); die();
                    $sp = $this->cart->add_one_product($ProductID);
                    $qty = $_POST['qty'] ?? 1;
                    $data = array(
                        'id' => $sp['ProductID'],
                        'slug' => $sp['Slug'],
                        'name' => $sp['ProductName'],
                        'price' => $sp['Price'],
                        'discount' => $sp['Discount'],
                        'img' => $sp['Image'],
                        'qty' => $qty,
                    );
                    if (!isset($_SESSION['cart'])) {
                        $_SESSION['cart'][] = $data;
                    } else {
                        $cart = $_SESSION['cart'];
                        $existing_product_key = null;
                        // Kiểm tra xem sản phẩm tương ứng đã tồn tại trong giỏ hàng chưa
                        foreach ($cart as $key => $item) {
                            if ($item['id'] == $data['id']) {
                                $existing_product_key = $key;
                                break;
                            }
                        }
                        if ($existing_product_key !== null) {
                            // Nếu sản phẩm tương ứng đã tồn tại, thì cập nhật số lượng
                            $cart[$existing_product_key]['qty'] += $data['qty'];
                        }else {
                            // Nếu sản phẩm tương ứng chưa tồn tại, thêm sản phẩm mới
                            $cart[] = $data;
                        }
                        $_SESSION['cart'] = $cart;
                    }
                    header("location: $referer");
                } else {
                    $_SESSION['message'] = "Vui lòng đăng nhập";
                    header("location: login");
                }
    }
    function cart(){
        $this->data['list_category'] = $this->cate->get_all_category();
        $this->renderView("cart",$this->titlepage,$this->data);
    }
    function update_cart(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $productModel = new ProductModel;
        $id_cart = $_POST['id_cart'];
        $qty_update = $_POST['qty_update'];
        $data = array();
        foreach ($id_cart as $key => $id) {
            $row = array(
                'id' => $id,
                'qty' => $qty_update[$key],
            );
            $data[] = $row;
        }
        $this->cart->update_cart($data);
        header("location: $referer");
    }
    function clear_cart(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        unset($_SESSION['cart']);
        header("location: $referer");
    }
    function checkout(){
        $this->data['list_category'] = $this->cate->get_all_category();
        // var_dump($_SESSION['cart']); die();
        $this->renderView("checkout",$this->titlepage,$this->data);
    }
    
}
?> 