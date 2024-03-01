<?php
namespace App\Models;

use PDO;
use PDOException;

class DatabaseModel{
    // private $dbhost='localhost';
    // private $dbname='tank';
    // private $dbuser='root';
    // private $dbpass='';
    private $dbhost=DB_HOST;
    private $dbname=DB_NAME;
    private $dbuser=DB_USER;
    private $dbpass=DB_PASS;
    private $conn;
    private $stmt;
    function __construct(){
        try {
            $this -> conn= new PDO("mysql:host=".$this->dbhost.";dbname=".$this->dbname,$this->dbuser,$this->dbpass);
            $this -> conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
        } catch (PDOException $e) {
            // Xử lý lỗi kết nối cơ sở dữ liệu ở đây (ví dụ: log lỗi, hiển thị thông báo...)
            die("Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage());
        }
    }
    function get_all($sql){
        $this->stmt =$this->conn->prepare($sql);
        $this->stmt->execute();
        $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $this->stmt->fetchAll();
    }
    function get_one($sql){
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute();
            $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $this->stmt->fetch();
    }
    function insert($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = $this->__construct();;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
    }
    function update($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $conn = $this->__construct();;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($sql_args);
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
        }
    function count($sql){
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $this->stmt->fetch();
        return $result["tong_sl"];

    }
}
?>