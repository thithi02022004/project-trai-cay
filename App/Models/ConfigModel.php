<?php
namespace App\Models;
 class ConfigModel{
    private $db;
    function __construct(){
        $this->db=new DatabaseModel;
    }
    function insert_config($fileName, $email, $phone, $address, $status){
        $sql = 'INSERT INTO db_configs (Logo, ContactEmail, ContactPhone, Address, Status) VALUES("'.$fileName.'","'.$email.'","'.$phone.'","'.$address.'", "'.$status.'")';
        return $this->db->insert($sql);
    }
    function list_config(){
        $sql ="SELECT * FROM db_configs";
        return $this->db->get_all($sql);
    }
    function get_one_config($id){
        $sql ="SELECT * FROM db_configs WHERE ConfigID = $id";
        return $this->db->get_one($sql);
    }
    function update_config($fileName, $email, $phone, $address, $status, $id){
        $sql = 'UPDATE db_configs SET Logo="'.$fileName.'", ContactEmail="'.$email.'", ContactPhone="'.$phone.'", Address="'.$address.'", Status="'.$status.'" WHERE ConfigID = "'.$id.'"';
        return $this->db->update($sql);
    }
    function delete_config($id){
        $sql = "DELETE FROM db_configs WHERE ConfigID = $id";
        return $this->db->update($sql);
    }
    function update_status($status, $id){
        $sql = "UPDATE db_configs SET Status = $status WHERE ConfigID = $id";
        return $this->db->update($sql);
    }
    
    }
?>