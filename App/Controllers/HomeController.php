<?php
namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\BannerModel;
use App\Models\ConfigModel;
use App\Models\UserModel;
use App\Models\BlogModel;
class HomeController extends BaseController{
    function __construct(){
        $this->cate = new CategoryModel;
        $this->pro = new ProductModel;
        $this->bn = new BannerModel;
        $this->cf = new ConfigModel;
        $this->user = new UserModel;
        $this->blog = new BlogModel;
    }
    function home(){
        // var_dump($_SESSION['user']); die();
        $this->titlepage="Trang chủ";
        $view = $_GET['page'] ?? 1;
        $userID = $_SESSION['user']['CustomerID'];
        $this->data['list_blog'] = $this->blog->get_all_blog();
        $this->data['list_category'] = $this->cate->get_all_category();
        $this->data['list_product'] = $this->pro->get_all_product($view, SHOP_LIMIT);
        $this->data['quantitysold'] = $this->pro->quantitysold();
        $this->data['discount'] = $this->pro->discount();
        $this->data['view'] = $this->pro->view();
        $this->data['new'] = $this->pro->new();
        $this->data['count'] = $this->pro->count();
        $this->data['list_banner'] = $this->bn->get_all_banner();
        $this->data['list_config'] = $this->cf->list_config();
        $this->data['whislist'] = $this->user->get_all_whislist($userID);
        $this->renderView("home",$this->titlepage,$this->data);
    }
}
?> 