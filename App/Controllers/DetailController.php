<?php
namespace App\Controllers;
use App\Models\BrandModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ConfigModel;
use App\Models\UserModel;
class DetailController extends BaseController{
    function __construct(){
        $this->pro = new ProductModel;
        $this->cate = new CategoryModel;
        $this->br = new BrandModel;
        $this->cf = new ConfigModel;
        $this->user = new UserModel;
    }
    function product_detail(){
        $this->titlepage="Chi tiết sản phẩm";
        $userID = $_SESSION['user']['CustomerID'];
        $this->data['list_config'] = $this->cf->list_config();
        $this->data['whislist'] = $this->user->get_all_whislist($userID);
        $this->data['list_category'] = $this->cate->get_all_category();
        $url = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/home';
        $url_array = explode("/",$url);
        $slug=$url_array[count($url_array)-1];
        $this->data['product_detail'] = $this->pro->product_detail($slug);
        $id = $this->data['product_detail']['ProductID'];
        $this->data['product_img'] = $this->pro->product_detail_img($id);
        $this->data['product_random'] = $this->pro->get_random_product();
        $this->pro->view_add($slug);
        $this->renderView("product_detail",$this->titlepage,$this->data);
    }
    
}
?> 