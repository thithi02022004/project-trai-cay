<?php
namespace App\Controllers;

use App\Models\BannerModel;
use App\Models\ConfigModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\BrandModel;
use App\Models\CountryModel;
use App\Models\OrderModel;
use App\Models\UserModel;
 class BaseController{
    protected $titlepage="";
    protected $data=[];
    function renderView($viewpage,$titlepage, $data=[]){
        $viewfile="app/Views/".$viewpage.".php";
        if(is_file($viewfile)){
        include_once $viewfile;
        }else{
            echo"File không tồn tại";
        }
    }   
    function load_config(){
        $configModel = new ConfigModel;
        $this->data["config"] = $configModel->get_config();
    }
    function load_category(){
        $categoryModel = new CategoryModel;
        $this->data['category'] = $categoryModel->get_category();
        $this->data['category_limit'] = $categoryModel->get_category_limit();
    }
    function load_banner(){
        $bannerModel = new BannerModel;
        $this->data['banner'] = $bannerModel->get_banner();
    }
    function load_product(){
        $productModel = new ProductModel;
        $view = $_GET['page'] ?? 1;
        $this->data['product'] = $productModel->get_product($view, SHOP_LIMIT);
        $this->data['product_promotion'] = $productModel->get_product_promotion();
        $this->data['product_new'] = $productModel->get_product_new();
        $this->data['product_view'] = $productModel->get_product_view();
        $this->data['product_where_category'] = $productModel->get_product_where_category();
        $this->data['product_price_high'] = $productModel->get_product_where_price_high($view, SHOP_LIMIT);
        $this->data['product_price_low'] = $productModel->get_product_where_price_low($view, SHOP_LIMIT);
        $this->data['count'] = $productModel->count();
    }
    function load_brand(){
        $brandModel = new BrandModel;
        $this->data['brand'] = $brandModel->get_brand();
        $this->data['brand_limit'] = $brandModel->get_brand_limit();
    }
    function load_country(){
        $countryModel = new CountryModel;
        $this->data['country'] = $countryModel->get_country();
    }
    




    // BACKEND ================================== BACKEND
    function load_order(){
        $orderModel = new OrderModel;
        $this->data['order'] = $orderModel->list_order();
        
    }
}
?>