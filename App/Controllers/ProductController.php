<?php
namespace App\Controllers;
use App\Models\BrandModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
class ProductController extends BaseController{
    function __construct(){
        $this->pro = new ProductModel;
        $this->cate = new CategoryModel;
        $this->br = new BrandModel;
    }
    function list_product(){
        $view = $_GET['page'] ?? 1;
        $this->data['list_product'] = $this->pro->get_all_product($view, SHOP_LIMIT);
        $this->data['count'] = $this->pro->count();
        $this->renderView("backend/product/list_product",$this->titlepage,$this->data);
    }
    function add_product(){
        $this->data['list_category'] = $this->cate->get_all_category();
        $this->data['list_brand'] = $this->br->get_all_brand();
        $this->renderView("backend/product/add_product",$this->titlepage,$this->data);
    }
    function insert_product(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $category = $_POST['category'];
        $brand = $_POST['brand'];
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $imgs = $_FILES['img']['name'];
        $img = $imgs[0];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $discount = $_POST['discount'];
        $desc = $_POST['desc'];
        $status = $_POST['status'];
        // var_dump($desc); die();
        // $id = $this->pro->get_id_product();
        //Thêm hình ảnh vào thư mục
        $files = $_FILES['img']; 
        $fileName = $files['name'];
        foreach ($fileName as $key => $fName) {
            move_uploaded_file($files['tmp_name'][$key],'public/frontend/assets/images/products/'.$fName );
        }
        $this->pro->insert_product($category, $brand, $name, $slug, $img , $price, $desc, $quantity, $discount, $status);
        foreach ($imgs as $key => $image) {
            $this->pro->insert_img($image);
        }
        header("location: $referer");
    }
    function edit_product(){
        $id = $_GET['id'];
        $this->data['one_product'] = $this->pro->get_one_product($id);
        $this->data['list_category'] = $this->cate->get_all_category();
        $this->data['list_brand'] = $this->br->get_all_brand();
        $this->renderView("backend/product/edit_product",$this->titlepage,$this->data);
    }
    function update_product(){
        // $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $category = $_POST['category'];
        $brand = $_POST['brand'];
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $imgs = $_FILES['img']['name'];
        $img = $imgs[0];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $discount = $_POST['discount'];
        $desc = $_POST['desc'];
        $status = $_POST['status'];
        $id = $_GET['id'];
        // var_dump($slug); die();
        if (count($_FILES['img']['name']) > 1) {
                $this->pro->product_img_delete($id);
                $files = $_FILES['img'];
                $imgs = $files['name'];
                foreach ($imgs as $key => $fName) {
                    move_uploaded_file($files['tmp_name'][$key],'public/frontend/assets/images/products/'.$fName );
                }
                $this->pro->product_update_info($category, $brand, $name, $slug, $img, $price, $desc, $quantity, $discount, $status, $id);
                foreach ($imgs as $key => $img) {
                    $this->pro->product_update_img($img, $id);
                }
        }else {
                $this->pro->product_update_info1($category, $brand, $name, $slug, $price, $desc, $quantity, $discount, $status, $id);
        }
        header("location: list_product");
    }
    function trash(){
        $view = $_GET['page'] ?? 1;
        $this->data['list_product'] = $this->pro->get_all_product($view, SHOP_LIMIT);
        $this->data['count'] = $this->pro->count();
        $this->renderView("backend/product/trash",$this->titlepage,$this->data);
    }
    function deltrash(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $ProductID = $_GET['id'];
        $sta = $_GET['status'];
        if ($sta == 1) {
            $status = 3;
        }elseif ($sta == 3) {
            $status = 2;
        }
        $this->pro->update_status_product($ProductID, $status);
        header("location: $referer");
    }
    function retrash(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $ProductID = $_GET['id'];
        $sta = $_GET['status'];
        if ($sta == 3) {
            $status = 2;
        }
        $this->pro->update_status_product($ProductID, $status);
        header("location: $referer");
    }
    function search(){
        // var_dump($_REQUEST); die();
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $key = $_GET['search'];
            $this->data['search'] = $this->pro->search($key);
            // var_dump($this->data['search']); die();
        }
        $this->renderView("product",$this->titlepage,$this->data);
    }
    
    
}
?> 