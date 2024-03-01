<?php
namespace App\Models;
 class BannerModel{
    private $db;
    function __construct(){
        $this->db=new DatabaseModel;
    }
    function get_all_banner(){
        $sql = "SELECT * FROM db_banners";
        return $this->db->get_all($sql);
    }
    function insert_banner($name, $fileName, $content, $url_name){
        $sql = "INSERT INTO db_banners(Title, ImageURL, Content, URL) VALUES(?,?,?,?)";
        return $this->db->insert($sql, $name, $fileName, $content, $url_name);
    }
    function get_one_banner($id){
        $sql ="SELECT * FROM db_banners WHERE BannerID = $id";
        return $this->db->get_one($sql);
    }
    function update_banner($name, $fileName, $content, $url_name, $status, $id){
        $sql = "UPDATE db_banners SET Title=?, ImageURL=? , Content=?, URL=? , Status=? WHERE BannerID = $id";
        return $this->db->update($sql, $name, $fileName, $content, $url_name, $status);
    }
    function update_banner_info($name, $content, $url_name, $status, $id){
        $sql = "UPDATE db_banners SET Title=?, Content=?, URL=? , Status=? WHERE BannerID = $id";
        return $this->db->update($sql, $name, $content, $url_name, $status);
    }
    function delete_banner($id){
        $sql = "DELETE FROM db_banners WHERE BannerID = $id";
        return $this->db->update($sql);
    }
    function update_status($status, $id){
        $sql = "UPDATE db_banners SET Status = $status WHERE BannerID = $id";
        return $this->db->update($sql);
    }
    
    }
?>