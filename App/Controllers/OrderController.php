<?php
namespace App\Controllers;
use App\Models\OrderModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ConfigModel;
use App\Models\UserModel;
class OrderController extends BaseController{
    function __construct(){
        $this->cate = new CategoryModel;
        $this->ord = new OrderModel;
        $this->pro = new ProductModel;
        $this->cf = new ConfigModel;
        $this->user = new UserModel;
    }
    function insert_order(){
        // $id_user = $_POST['id_user'];
        // $name = $_POST['name'];
        // $phone = $_POST['phone'];
        // $email = $_POST['email'];
        // $address = $_POST['address'];
        // $total = $_POST['total'];
        // $created_at = date('Y-m-d H:i:s');
        // $exported_at = date('Y-m-d H:i:s');
        // $this->ord->insert_order($id_user, $name, $phone, $email, $address, $total, $created_at, $exported_at);
        // unset($_SESSION['cart']);
        // header("location: home");

        if (isset($_POST['momo'])) {
            $productID = $_POST['productID'];
            $id_user = $_POST['id_user'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $total = $_POST['total'];
            $created_at = date('Y-m-d H:i:s');
            $exported_at = date('Y-m-d H:i:s');
            $momostatus = $_POST['momostatus'];
            $this->ord->insert_order($id_user, $name, $phone, $email, $address, $total, $created_at, $exported_at, $momostatus);
            $this->pro->sold_add($productID);
            unset($_SESSION['cart']);
            $this->data['order_momo'] = $this->ord->get_order_momo();
            $this->renderView("pay",$this->titlepage,$this->data);
        }elseif (isset($_POST['pay_atm'])) {
            $productID = $_POST['productID'];
            $id_user = $_POST['id_user'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $total = $_POST['total'];
            $created_at = date('Y-m-d H:i:s');
            $exported_at = date('Y-m-d H:i:s');
            $momostatus = $_POST['momostatus'];
            $this->ord->insert_order($id_user, $name, $phone, $email, $address, $total, $created_at, $exported_at, $momostatus);
            $this->pro->sold_add($productID);
            unset($_SESSION['cart']);
            $this->data['order_momo'] = $this->ord->get_order_momo();
            $this->renderView("pay_atm",$this->titlepage,$this->data);
        }else {
            $id_user = $_POST['id_user'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $total = $_POST['total'];
            $created_at = date('Y-m-d H:i:s');
            $exported_at = date('Y-m-d H:i:s');
            $this->ord->insert_order($id_user, $name, $phone, $email, $address, $total, $created_at, $exported_at);
            $productID = $_POST['productID'];
            $this->pro->sold_add($productID);
            unset($_SESSION['cart']);
            // header("location: home");
        }

    }
    function list_order(){
        $this->data['list_order'] = $this->ord->list_order();
        $this->data['list_category'] = $this->cate->get_all_category();
        // var_dump($this->data['list_order']); die();
        $this->renderView("backend/order/list_order",$this->titlepage,$this->data);
    }
    function order_detail(){
        $id = $_GET['id'];
        $this->data['list_order'] = $this->ord->list_order();
        $this->data['order_detail'] = $this->ord->order_detail($id);
        // $this->data['order_detail'] = $details;
        // var_dump($this->data['order_detail']); die();
        $this->renderView("backend/order/order_detail",$this->titlepage,$this->data);
    }
    function ShippingStatus(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'list_order';
        $id = $_GET['id'];
        $row = $this->ord->order_rowid($id);
            if ($row['ShippingStatus'] == 1) {
                $stag = ($row['ShippingStatus'] == 1) ? 2 : 1;
                $stage = $stag;
                $this->ord->order_confirm($stage, $id);
            }elseif ($row['ShippingStatus'] == 2) {
                $stag = ($row['ShippingStatus'] == 2) ? 3 : 2;
                $stage = $stag;
                $this->ord->order_confirm($stage, $id);
            }elseif ($row['ShippingStatus'] == 3) {
                $stag = ($row['ShippingStatus'] == 3) ? 4 : 3;
                $stage = $stag;
                $this->ord->order_confirm($stage, $id);
            }elseif ($row['ShippingStatus'] == 4) {
                $stag = ($row['ShippingStatus'] == 4) ? 5 : 4;
                $stage = $stag;
                $this->ord->order_confirm($stage, $id);
            }
        header("location: $referer"); 
    }
    function trash_order(){
        $this->data['list_order'] = $this->ord->list_order();
        $this->renderView("backend/order/trash",$this->titlepage,$this->data);
    }
    function thankyou(){
        $userID = $_SESSION['user']['CustomerID'];
        $this->data['list_config'] = $this->cf->list_config();
        $this->data['whislist'] = $this->user->get_all_whislist($userID);
        $this->data['list_category'] = $this->cate->get_all_category();
        if (isset($_GET['partnerCode'])) {
            $this->ord->order_status_success();
        }
        $this->renderView("thankyou",$this->titlepage,$this->data);
    }
}
?> 