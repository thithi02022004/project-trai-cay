<?php
namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends BaseController{
    function __construct(){
        $this->cate = new CategoryModel;
    }
    function list_category(){
        $this->titlepage="Danh sách danh mục";
        $this->data['list_category'] = $this->cate->get_all_category();
        $this->renderView("backend/category/list_category",$this->titlepage,$this->data);
    }
    function add_category(){
        $this->titlepage="Thêm danh mục";
        $this->renderView("backend/category/add_category",$this->titlepage,$this->data);
    }
    function handle_cate(){
        $this->titlepage="Thêm danh mục";
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $desc = $_POST['desc'];
        $status = $_POST['status'];
        $this->data['insert_cate'] = $this->cate->insert_category($name, $slug, $desc, $status); 
        $this->renderView("backend/category/add_category",$this->titlepage,$this->data);
    }
    function edit_cate(){
        $CategoryId = $_GET['id'];
        $this->data['get_one_cate'] = $this->cate->get_one_category($CategoryId);
        $this->renderView("backend/category/edit_category",$this->titlepage,$this->data);
    }
    function update_cate(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $CategoryId = $_GET['id'];
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $desc = $_POST['desc'];
        $status = $_POST['status'];
        $this->data['update_category'] = $this->cate->update_category($CategoryId, $name, $slug, $desc, $status);
        header("location: $referer");  
    }
    function delete_cate(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $CategoryId = $_GET['id'];
        $this->data['delete_cate'] = $this->cate->delete_category($CategoryId);
        header("location: $referer");  
    }
    function update_status(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $CategoryId = $_GET['id'];
        $sta = $_GET['status'];
        if ($sta == 1) {
            $status = 2;
        }elseif ($sta == 2) {
            $status = 1;
        }
        $this->cate->update_status($CategoryId, $status);
        header("location: $referer");  
    }
    
}
?> 