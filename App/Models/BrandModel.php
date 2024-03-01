<?php
namespace App\Models;
 class BrandModel{
    private $db;
    function __construct(){
        $this->db=new DatabaseModel;
    }
    function insert_brand($name, $slug, $desc){
        $sql = "INSERT INTO db_brands (BrandName, Slug, Description) VALUES(?,?,?)";
        return $this->db->insert($sql, $name, $slug, $desc);
    }
    function get_all_brand(){
        $sql = "SELECT * FROM db_brands";
        return $this->db->get_all($sql);
    }
    function get_one_brand($id){
        $sql = "SELECT * FROM db_brands WHERE BrandID = $id";
        return $this->db->get_one($sql);
    }
    function update_brand($name, $slug, $desc, $status, $id){
        $sql = "UPDATE db_brands SET BrandName=?, Slug=?, Description=?, Status=? WHERE BrandID = $id";
        return $this->db->update($sql, $name, $slug, $desc, $status);
    }
    function delete_brand($id){
        $sql = "DELETE FROM db_brands WHERE BrandID = $id";
        return $this->db->update($sql);
    }
    function update_status($id, $status){
        $sql = "UPDATE db_brands SET Status = $status WHERE BrandID = $id";
        return $this->db->update($sql);
    }
    
    }
?>