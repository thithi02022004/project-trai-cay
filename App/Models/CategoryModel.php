<?php
namespace App\Models;
 class CategoryModel{
    private $db;
    function __construct(){
        $this->db=new DatabaseModel;
    }
    function insert_category($name, $slug, $desc, $status){
        $sql = "INSERT INTO db_categories (CategoryName, CategorySlug, Description, Status) VALUES (?,?,?,?)";
        return $this->db->insert($sql, $name, $slug, $desc, $status);
    }
    function get_all_category(){
        $sql = "SELECT * FROM db_categories";
        return $this->db->get_all($sql);
    }
    function get_one_category($CategoryId){
        $sql = "SELECT * FROM db_categories WHERE CategoryID = $CategoryId";
        return $this->db->get_one($sql);
    }
    function update_category($CategoryId, $name, $slug, $desc, $status){
        $sql = "UPDATE db_categories SET CategoryName=?, CategorySlug=?, Description=?, Status=? WHERE CategoryID = $CategoryId";
        return $this->db->update($sql, $name, $slug, $desc, $status);
    }
    function delete_category($CategoryId){
        $sql = "DELETE FROM db_categories WHERE CategoryID = $CategoryId";
        return $this->db->update($sql);
    }
    function update_status($CategoryId, $status){
        $sql = "UPDATE db_categories SET Status = $status WHERE CategoryID = $CategoryId";
        return $this->db->update($sql);
    }
    
    }
?>