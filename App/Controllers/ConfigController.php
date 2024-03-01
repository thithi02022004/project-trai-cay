<?php
namespace App\Controllers;

use App\Models\ConfigModel;

class ConfigController extends BaseController{
    function __construct(){
        $this->cf = new ConfigModel;
    }
    function list_config(){
        $this->titlepage="Danh sách Config";
        $this->data['list_config'] = $this->cf->list_config();
        // var_dump( $this->data['list_config']); die();
        $this->renderView("backend/config/list_config",$this->titlepage,$this->data);
    }
    function insert_config(){
        $this->titlepage="Thêm mới Config";
        $this->renderView("backend/config/add_config",$this->titlepage,$this->data);
    }
    function add_config(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $logo = $_FILES['img'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $status = $_POST['status'];
        $fileName = $_FILES['img']['name'];
        move_uploaded_file($logo['tmp_name'],'public/frontend/assets/images/products/'.$fileName );
        $this->cf->insert_config($fileName, $email, $phone, $address, $status);
        header("location: $referer"); 
    }
    function edit_config(){
        $id = $_GET['id'];
        $this->data['config'] = $this->cf->get_one_config($id);
        $this->renderView("backend/config/edit_config",$this->titlepage,$this->data);
    }
    function update_config(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $id = $_GET['id'];
        $logo = $_FILES['img'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $status = $_POST['status'];
        $fileName = $_FILES['img']['name'];
        move_uploaded_file($logo['tmp_name'],'public/frontend/assets/images/products/'.$fileName );
        $this->cf->update_config($fileName, $email, $phone, $address, $status, $id);
        header("location: $referer"); 
    }
    function delete_config(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $id = $_GET['id'];
        $this->cf->delete_config($id);
        header("location: $referer"); 
    }
    function update_status_cf(){
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home';
        $id = $_GET['id'];
        $sta = $_GET['sta'];
        if ($sta == 1) {
            $status = 2;
        }elseif ($sta == 2) {
            $status = 1;
        }
        $this->cf->update_status($status, $id);
        header("location: $referer"); 
    }
    
    

}
?> 