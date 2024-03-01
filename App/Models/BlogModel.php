<?php
namespace App\Models;
 class BlogModel{
    private $db;
    function __construct(){
        $this->db=new DatabaseModel;
    }
    function insert_blog($name, $slug, $content, $fileName1, $fileName2, $fileName3, $url_name, $status){
        $sql = "INSERT INTO db_blogs (Topic,Slug, Content, Image1, Image2, Image3, URL, Status) VALUES (?,?,?,?,?,?,?,?)";
        return $this->db->insert($sql, $name, $slug, $content, $fileName1, $fileName2, $fileName3, $url_name, $status);
    }
    function get_all_blog(){
        $sql = "SELECT * FROM db_blogs";
        return $this->db->get_all($sql);
    }
    function get_one_blog($id){
        $sql = "SELECT * FROM db_blogs WHERE BlogID = $id";
        return $this->db->get_one($sql);
    }
    function update_blog($name, $slug, $content, $fileName1, $fileName2, $fileName3, $url_name, $status, $id){
        $sql ="UPDATE db_blogs SET Topic=?, Slug=?, Content=?, Image1=?, Image2=?, Image3=?, URL=?, Status=? WHERE BlogID = $id";
        return $this->db->update($sql, $name, $slug, $content, $fileName1, $fileName2, $fileName3, $url_name, $status);
    }
    function delete_blog($id){
        $sql = "DELETE FROM db_blogs WHERE BlogID = $id";
        return $this->db->update($sql);
    }
    function update_status($status, $id){
        $sql = "UPDATE db_blogs SET Status = ? WHERE BlogID = $id";
        return $this->db->update($sql, $status);
    }
    function blog_detail($slug){
        $sql = 'SELECT * FROM db_blogs WHERE Slug = "'.$slug.'"';
        return $this->db->get_one($sql);
    }
    
    }
?>