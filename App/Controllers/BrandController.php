<?php
namespace App\Controllers;

use App\Models\BrandModel;

class BrandController extends BaseController{
    function __construct(){
        $this->br = new BrandModel;
    }
    function list_brand(){
        $this->titlepage="Danh sách thương hiệu";
        $this->data['list_brand'] = $this->br->get_all_brand();
        $this->renderView("backend/brand/list_brand",$this->titlepage,$this->data);
    }
    function add_brand(){
        $this->titlepage="Thêm thương hiệu";
        $this->renderView("backend/brand/add_brand",$this->titlepage,$this->data);
    }
    function insert_brand(){
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $desc = $_POST['desc'];
        $this->br->insert_brand($name, $slug, $desc);
        header("location: /php/PHP2/trai-cay/list_brand");
    }
    function edit_brand(){
        $id = $_GET['id'];
        $this->data['get_one_brand'] = $this->br->get_one_brand($id);
        $this->renderView("backend/brand/edit_brand",$this->titlepage,$this->data);
    }
    function update_brand(){
        $id = $_GET['id'];
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $desc = $_POST['desc'];
        $status = $_POST['status'];
        $this->br->update_brand($name, $slug, $desc, $status, $id);
        header("location: /php/PHP2/trai-cay/list_brand");
    }
    function delete_brand(){
        $id = $_GET['id'];
        $this->br->delete_brand($id);
        header("location: /php/PHP2/trai-cay/list_brand");
    }
    function update_status_br(){
        $id = $_GET['id'];
        $sta = $_GET['sta'];
        if ($sta == 1) {
            $status = 2;
        }elseif ($sta == 2) {
            $status = 1;
        }
        $this->br->update_status($id, $status);
        header("location: /php/PHP2/trai-cay/list_brand");
    }
    

}
?> 