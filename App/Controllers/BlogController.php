<?php
namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\BlogModel;
use App\Models\ConfigModel;
use App\Models\UserModel;
class BlogController extends BaseController{
    function __construct(){
        $this->cate = new CategoryModel;
        $this->pro = new ProductModel;
        $this->blog = new BlogModel;
        $this->cf = new ConfigModel;
        $this->user = new UserModel;
    }
    function list_blog(){
        $this->data['list_blog'] = $this->blog->get_all_blog();
        $this->renderView("backend/blog/list_blog",$this->titlepage,$this->data);
    }
    function insert_blog(){
        $this->renderView("backend/blog/add_blog",$this->titlepage,$this->data);
    }
    function add_blog(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $img1 = $_FILES['img1'];
        $img2 = $_FILES['img2'];
        $img3 = $_FILES['img3'];
        $content = $_POST['content'];
        $url_name = $_POST['url_name'];
        $status = $_POST['status'];
        $fileName1 = $_FILES['img1']['name'];
        $fileName2 = $_FILES['img2']['name'];
        $fileName3 = $_FILES['img3']['name'];
        move_uploaded_file($img1['tmp_name'],'public/frontend/assets/images/products/'.$fileName1 );
        move_uploaded_file($img2['tmp_name'],'public/frontend/assets/images/products/'.$fileName2 );
        move_uploaded_file($img3['tmp_name'],'public/frontend/assets/images/products/'.$fileName3 );
        $this->blog->insert_blog($name, $slug, $content, $fileName1, $fileName2, $fileName3, $url_name, $status);
        header("location: $referer"); 
    }
    function edit_blog(){
        $id = $_GET['id'];
        $this->data['blog'] = $this->blog->get_one_blog($id);
        $this->renderView("backend/blog/edit_blog",$this->titlepage,$this->data);
    }
    function update_blog(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $id = $_GET['id'];
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $img1 = $_FILES['img1'];
        $img2 = $_FILES['img2'];
        $img3 = $_FILES['img3'];
        $content = $_POST['content'];
        $url_name = $_POST['url_name'];
        $status = $_POST['status'];
        $fileName1 = $_FILES['img1']['name'];
        $fileName2 = $_FILES['img2']['name'];
        $fileName3 = $_FILES['img3']['name'];
        move_uploaded_file($img1['tmp_name'],'public/frontend/assets/images/products/'.$fileName1 );
        move_uploaded_file($img2['tmp_name'],'public/frontend/assets/images/products/'.$fileName2 );
        move_uploaded_file($img3['tmp_name'],'public/frontend/assets/images/products/'.$fileName3 );
        $this->blog->update_blog($name, $slug, $content, $fileName1, $fileName2, $fileName3, $url_name, $status, $id);
        header("location: $referer"); 
    }
    function delete_blog(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $id = $_GET['id'];
        $this->blog->delete_blog($id);
        header("location: $referer"); 
    }
    function update_status_bl(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $id = $_GET['id'];
        $sta = $_GET['sta'];
        if ($sta == 1) {
            $status = 2;
        }elseif ($sta == 2) {
            $status = 1;
        }
        $this->blog->update_status($status, $id);
        header("location: $referer"); 
    }
    function blog(){
        $this->titlepage="Bài viết";
        $userID = $_SESSION['user']['CustomerID'];
        $this->data['list_config'] = $this->cf->list_config();
        $this->data['whislist'] = $this->user->get_all_whislist($userID);
        $this->data['list_category'] = $this->cate->get_all_category();
        $this->data['list_blog'] = $this->blog->get_all_blog();
        $this->renderView("blog",$this->titlepage,$this->data);
    }
    function blog_detail(){
        $this->titlepage="Xem";
        $userID = $_SESSION['user']['CustomerID'];
        $this->data['list_config'] = $this->cf->list_config();
        $this->data['whislist'] = $this->user->get_all_whislist($userID);
        $this->data['list_blog'] = $this->blog->get_all_blog();
        $this->data['list_category'] = $this->cate->get_all_category();
        $url = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/home';
        $url_array = explode("/",$url);
        $slug=$url_array[count($url_array)-1];
        $this->data['blog_detail'] = $this->blog->blog_detail($slug);
        $this->renderView("blog_detail",$this->titlepage,$this->data);
    }
}
?> 