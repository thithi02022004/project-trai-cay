<?php
namespace App\Controllers;
use App\Models\BrandModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ConfigModel;
use App\Models\UserModel;
class ShopController extends BaseController{
    function __construct(){
        $this->pro = new ProductModel;
        $this->cate = new CategoryModel;
        $this->br = new BrandModel;
        $this->cf = new ConfigModel;
        $this->user = new UserModel;
    }
    function shop(){
        $this->titlepage="Shop";
        $view = $_GET['page'] ?? 1;
        $userID = $_SESSION['user']['CustomerID'];
        $this->data['list_config'] = $this->cf->list_config();
        $this->data['whislist'] = $this->user->get_all_whislist($userID);
        $this->data['list_category'] = $this->cate->get_all_category();
        $this->data['shop'] = $this->pro->get_all_product($view, SHOP_LIMIT);
        $this->data['shop_discount'] = $this->pro->shop_discount($view, SHOP_LIMIT);
        $this->data['shop_sold'] = $this->pro->shop_quantitysold($view, SHOP_LIMIT);
        $this->data['shop_view'] = $this->pro->shop_view($view, SHOP_LIMIT);
        $this->data['shop_new'] = $this->pro->shop_new($view, SHOP_LIMIT);
        $this->data['high_to_low'] = $this->pro->high_to_low($view, SHOP_LIMIT);
        $this->data['low_to_high'] = $this->pro->low_to_high($view, SHOP_LIMIT);
        $this->data['count'] = $this->pro->count();
        // $slug = $_GET['slug'] ?? "";
        // $this->data['pro_where_cate'] = $this->pro->product_where_category($slug);
        // var_dump($this->data['pro_where_cate']); die();
        $this->renderView("product",$this->titlepage,$this->data);
    }
    function product(){
        $this->titlepage="Shop";
        $userID = $_SESSION['user']['CustomerID'];
        $this->data['list_config'] = $this->cf->list_config();
        $this->data['whislist'] = $this->user->get_all_whislist($userID);
        $url = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/home';
        $url_array = explode("/",$url);
        $slug=$url_array[count($url_array)-1];
        $this->data['slug'] = $slug;
        $view = $_GET['page'] ?? 1;
        $this->data['list_category'] = $this->cate->get_all_category();
        $this->data['pro_where_cate'] = $this->pro->product_where_category($slug, $view, SHOP_LIMIT);
        $this->data['shop_discount'] = $this->pro->shop_discount($view, SHOP_LIMIT);
        $this->data['count'] = $this->pro->count();
        $this->renderView("product_filter",$this->titlepage,$this->data);
    }
    
}
?> 