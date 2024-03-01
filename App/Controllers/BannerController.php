<?php
namespace App\Controllers;

use App\Models\BannerModel;

class BannerController extends BaseController{
    function __construct(){
        $this->bn = new BannerModel;
    }
    function list_banner(){
        $this->titlepage="Danh sách quảng cáo";
        $this->data['list_banner'] = $this->bn->get_all_banner();
        $this->renderView("backend/banner/list_banner",$this->titlepage,$this->data);
    }
    function insert_banner(){
        $this->titlepage="Thêm banner quảng cáo";
        // $this->data['insert_banner'] = $this->bn->get_all_banner();
        $this->renderView("backend/banner/add_banner",$this->titlepage,$this->data);
    }
    function add_banner(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $name = $_POST['name'];
        $img = $_FILES['img'];
        $content = $_POST['content'];
        $url_name = $_POST['url_name'];
        $fileName = $_FILES['img']['name'];
        move_uploaded_file($img['tmp_name'],'public/frontend/assets/images/products/'.$fileName );
        $this->bn->insert_banner($name, $fileName, $content, $url_name);
        header("location: $referer");  
    }
    function edit_banner(){
        $this->titlepage="Chỉnh sửa Banner quảng cáo";
        $id = $_GET['id'];
        $this->data['one_banner'] = $this->bn->get_one_banner($id);
        // var_dump( $this->data['one_banner']); die();
        $this->renderView("backend/banner/edit_banner",$this->titlepage,$this->data);
    }
    function update_banner(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $id = $_GET['id'];
        $name = $_POST['name'];
        $img = $_FILES['img'];
        $content = $_POST['content'];
        $url_name = $_POST['url_name'];
        $fileName = $_FILES['img']['name'];
        // var_dump($_FILES['img']); die();
        $status = $_POST['status'];
            move_uploaded_file($img['tmp_name'],'public/frontend/assets/images/products/'.$fileName );
            $this->bn->update_banner($name, $fileName, $content, $url_name, $status, $id);
            // $this->bn->update_banner_info($name, $content, $url_name, $status, $id);
        header("location: $referer");  
    }
    function delete_banner(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $id = $_GET['id'];
        $this->bn->delete_banner($id);
        header("location: $referer");  
    }
    function update_status_bn(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $id = $_GET['id'];
        $sta = $_GET['sta'];
        if ($sta == 1) {
            $status = 2;
        }elseif ($sta == 2) {
            $status = 1;
        }
        $this->bn->update_status($status, $id);
        header("location: $referer"); 
    }
    

}
?> 