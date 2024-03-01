<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Models\OrderModel;
use App\Models\CategoryModel;
use App\Models\ConfigModel;

class UserController extends BaseController{
    function __construct(){
        $this->user = new UserModel;
        $this->ord = new OrderModel;
        $this->cate = new CategoryModel;
        $this->cf = new ConfigModel;
    }
    function login(){
        $this->titlepage="Đăng nhập";
        $this->data['list_config'] = $this->cf->list_config();
        $this->data['list_category'] = $this->cate->get_all_category();
        $this->renderView("login",$this->titlepage,$this->data);
    }
    function login_add(){
        unset($_SESSION['message']);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->user->check_login($email, $password);
        if (isset($user)) {
            $_SESSION['user'] = $user;
            header("location: /php/PHP2/trai-cay/");
        }else {
            header("location: login");
        }
    }
    function register(){
        $this->titlepage="Đăng ký";
        $this->data['list_config'] = $this->cf->list_config();
        $this->data['list_category'] = $this->cate->get_all_category();
        $this->renderView("register",$this->titlepage,$this->data);
    }
    function register_add(){
        // var_dump($_REQUEST); die();
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $this->user->insert_user($name, $email, $password, $address, $phone);
        header("location: login");
    }
    function account(){
        $this->titlepage="Tài khoản của bạn";
        $userID = $_SESSION['user']['CustomerID'];
        $this->data['list_config'] = $this->cf->list_config();
        $this->data['whislist'] = $this->user->get_all_whislist($userID);
        $this->data['list_category'] = $this->cate->get_all_category();
        $this->renderView("account",$this->titlepage,$this->data);
    }
    function logout(){
        unset($_SESSION['user']);
        header("location: login");
    }
    function order_history(){
        $this->data['list_order'] = $this->ord->list_order();
        $userID = $_SESSION['user']['CustomerID'];
        $this->data['list_config'] = $this->cf->list_config();
        $this->data['whislist'] = $this->user->get_all_whislist($userID);
        $this->data['list_category'] = $this->cate->get_all_category();
        $this->renderView("order_history",$this->titlepage,$this->data);
    }
    function order_detail_user(){
        $id = $_GET['id'];
        $userID = $_SESSION['user']['CustomerID'];
        $this->data['list_config'] = $this->cf->list_config();
        $this->data['whislist'] = $this->user->get_all_whislist($userID);
        $this->data['list_category'] = $this->cate->get_all_category();
        $this->data['order_detail'] = $this->ord->order_detail($id);
        $this->renderView("order_detail",$this->titlepage,$this->data);
    }
    function order_success(){
        $userID = $_SESSION['user']['CustomerID'];
        $this->data['list_config'] = $this->cf->list_config();
        $this->data['whislist'] = $this->user->get_all_whislist($userID);
        $this->data['list_category'] = $this->cate->get_all_category();
        $this->data['list_order'] = $this->ord->list_order();
        $this->renderView("order_success",$this->titlepage,$this->data);
    }
    function add_whislist(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $productID = $_GET['id'];
        $userID = $_SESSION['user']['CustomerID'];
        $this->user->insert_whislist($userID, $productID);
        header("location: $referer"); 
    }
    function whislist(){
        $userID = $_SESSION['user']['CustomerID'];
        $userID = $_SESSION['user']['CustomerID'];
        $this->data['list_config'] = $this->cf->list_config();
        $this->data['list_category'] = $this->cate->get_all_category();
        $this->data['whislist'] = $this->user->get_all_whislist($userID);
        // var_dump($this->data['whislist']); die();
        $this->renderView("whislist",$this->titlepage,$this->data);
    }
    function delete_wishlist(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $productID = $_GET['id'];
        $this->user->delete_wishlist($productID);
        header("location: $referer"); 
    }
}
?> 