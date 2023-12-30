<?php 
    include_once("../db/db.php");
    function getProducts($page = 1, $limit = 12) {
        if(!isset($page) || !$page) {
            $page = 1;
        }

        if(!isset($limit) || !$limit) {
            $limit = 12;
        }

        $offset = ($page - 1) * $limit;

        $sql = "SELECT * FROM products ORDER BY product_id DESC LIMIT ".$limit." OFFSET ".$offset;
        
        $products = find($sql);
        return $products;
    };
    function getProductsByCategory($categoryId, $page = 1, $limit = 12) {
        if(!isset($page) || !$page) {
            $page = 1;
        }
        if(!isset($limit) || !$limit) {
            $limit = 12;
        }
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM products WHERE product_category = ".$categoryId." ORDER BY product_id DESC LIMIT ".$limit." OFFSET ".$offset;
        $products = find($sql);
        return $products;
    }

?>