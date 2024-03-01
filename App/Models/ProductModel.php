<?php
namespace App\Models;
 class ProductModel{
    private $db;
    function __construct(){
        $this->db=new DatabaseModel;
    }
        function get_all_product($view, $limit){
            $limit1 = ($view - 1)*$limit;
            $sql = "SELECT pro.*, cate.CategoryName as cateName, br.BrandName as brName, pro.Image as pro_image, cate.CategoryID as CateID
            FROM db_products as pro 
            JOIN db_categories as cate ON cate.CategoryID = pro.CategoryID
            JOIN db_brands as br ON br.BrandID = pro.BrandID
            ORDER BY ProductID DESC LIMIT $limit1,$limit";
            return $this->db->get_all($sql);
        }
        function get_all_where_discount(){
            $sql = "SELECT pro.*, cate.CategoryName as cateName, br.BrandName as brName, pro.Image as pro_image, cate.CategoryID as CateID
                    FROM db_products as pro 
                    JOIN db_categories as cate ON cate.CategoryID = pro.CategoryID
                    JOIN db_brands as br ON br.BrandID = pro.BrandID 
                    WHERE pro.Status = 1 
                    ORDER BY Discount DESC";
            return $this->db->get_all($sql);
        }
        function insert_product($category, $brand, $name, $slug, $img , $price, $desc, $quantity, $discount, $status){
            $sql = "INSERT INTO db_products (CategoryID, BrandID, ProductName, Slug, Image, Price, Description, StockQuantity, Discount, Status) VALUES (?,?,?,?,?,?,?,?,?,?)";
            return $this->db->insert($sql, $category, $brand, $name, $slug, $img , $price, $desc, $quantity, $discount, $status);
        }
        function get_id_product(){
            $sql = "SELECT ProductID FROM db_products ORDER BY ProductID DESC LIMIT 1";
            return $this->db->get_one($sql);
        }
        function insert_img($image){
            $ProductID = $this->get_id_product();
            $sql = "INSERT INTO db_imgs (ProductID, Image) VALUES (?,?)";
            return $this->db->insert($sql,$ProductID['ProductID'],$image );
        }
        function get_one_product($id){
            $sql = "SELECT * FROM db_products WHERE ProductID = $id";
            return $this->db->get_one($sql);
        }
        function product_img_delete($id){
            $sql = 'DELETE FROM db_imgs WHERE ProductID = ?';
            return $this->db->update($sql, $id);
        }
        function product_update_img($img){
            $ProductID = $this->get_id_product();
            $sql = "INSERT INTO db_imgs (ProductID, Image) VALUES (?,?)";
            return $this->db->insert($sql,$ProductID['ProductID'],$img );
        }
        function product_update_info($category, $brand, $name, $slug, $img, $price, $desc, $quantity, $discount, $status, $id){
            $sql = "UPDATE db_products SET CategoryID=?, BrandID=?, ProductName=?, Slug=?, Image=?, Price=?, Description=?, StockQuantity=?, Discount=?, Status=? WHERE ProductID = ?";
            return $this->db->update($sql, $category, $brand, $name, $slug, $img, $price, $desc, $quantity, $discount, $status, $id);
        }
        function product_update_info1($category, $brand, $name, $slug, $price, $desc, $quantity, $discount, $status, $id){
            $sql = "UPDATE db_products SET CategoryID=?, BrandID=?, ProductName=?, Slug=?, Price=?, Description=?, StockQuantity=?, Discount=?, Status=? WHERE ProductID = ?";
            return $this->db->update($sql, $category, $brand, $name, $slug, $price, $desc, $quantity, $discount, $status, $id);
        }
        function update_status_product($ProductID, $status){
            $sql = "UPDATE db_products SET Status = $status WHERE ProductID = $ProductID";
            return $this->db->update($sql);
        }
        // Hàm đếm đẻ phân trang
        function count(){
            $sql = "SELECT COUNT(*) FROM db_products";
            return $this->db->get_all($sql);
        }
        // Bán chạy
        function quantitysold(){
            $sql = "SELECT * FROM db_products ORDER BY QuantitySold DESC";
            return $this->db->get_all($sql);
        }
        // giảm giá
        function discount(){
            $sql = "SELECT * FROM db_products ORDER BY Discount DESC";
            return $this->db->get_all($sql);
        }
        // Lượt xem
        function view(){
            $sql = "SELECT * FROM db_products ORDER BY Views DESC";
            return $this->db->get_all($sql);
        }
        // Mới cập nhật
        function new(){
            $sql = "SELECT * FROM db_products ORDER BY ProductID DESC";
            return $this->db->get_all($sql);
        }
        // Chi tiết sản phẩm
        function product_detail($slug){
            $sql = "SELECT * FROM db_products WHERE Slug = '$slug'";
            return $this->db->get_one($sql);
        }
        function product_detail_img($id){
            $sql = "SELECT * FROM db_imgs WHERE ProductID = $id";
            return $this->db->get_all($sql);
        }
        function get_random_product(){
            $sql="SELECT * FROM db_products ORDER BY RAND() LIMIT 4";
            return $this->db->get_all($sql);
        }
        // lọc Bán chạy trang shop
        function shop_quantitysold($view, $limit){
            $limit1 = ($view - 1)*$limit;
            $sql = "SELECT * FROM db_products ORDER BY QuantitySold DESC LIMIT $limit1,$limit";
            return $this->db->get_all($sql);
        }
        // giảm giá trang shop
        function shop_discount($view, $limit){
            $limit1 = ($view - 1)*$limit;
            $sql = "SELECT * FROM db_products ORDER BY Discount DESC LIMIT $limit1,$limit";
            return $this->db->get_all($sql);
        } 
        // Lượt xem trang shop
        function shop_view($view, $limit){
            $limit1 = ($view - 1)*$limit;
            $sql = "SELECT * FROM db_products ORDER BY Views DESC LIMIT $limit1,$limit";
            return $this->db->get_all($sql);
        }
        // Mới cập nhật trang shop
        function shop_new($view, $limit){
            $limit1 = ($view - 1)*$limit;
            $sql = "SELECT * FROM db_products ORDER BY ProductID DESC LIMIT $limit1,$limit";
            return $this->db->get_all($sql);
        }
        // Giá cao đến thấp
        function high_to_low($view, $limit){
            $limit1 = ($view - 1)*$limit;
            $sql = "SELECT * FROM db_products ORDER BY Price DESC LIMIT $limit1,$limit";
            return $this->db->get_all($sql);
        }
        // Giá thấp đến cao
        function low_to_high($view, $limit){
            $limit1 = ($view - 1)*$limit;
            $sql = "SELECT * FROM db_products ORDER BY Price ASC LIMIT $limit1,$limit";
            return $this->db->get_all($sql);
        }
        // khi thanh toán thành công sẽ + sold
        function sold_add($productID){
            $sql = "UPDATE db_products SET QuantitySold = QuantitySold + 1 WHERE ProductID = $productID";
            return $this->db->update($sql);
        }
        // khi vào chi tiết sản phẩm sẽ + view
        function view_add($slug){
            $sql = "UPDATE db_products SET Views = Views + 1 WHERE Slug = ?";
            return $this->db->update($sql, $slug);
        }
        // lọc theo danh mục
        function product_where_category($slug, $view, $limit){
            $limit1 = ($view - 1) * $limit;
            $sql = 'SELECT * 
                    FROM db_products as pro
                    JOIN db_categories as cate ON cate.CategoryID = pro.CategoryID
                    WHERE cate.CategorySlug = "'.$slug.'" ORDER BY ProductID DESC LIMIT '.$limit1.','.$limit;
            return $this->db->get_all($sql);
        }       
        function search($key){
            $sql = "SELECT * FROM db_products WHERE ProductName LIKE '%$key%' OR Slug LIKE '%$key%'";
            return $this->db->get_all($sql);
        }
    }
?>