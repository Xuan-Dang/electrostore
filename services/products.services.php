<?php 
    include_once("../db/db.php");
    function getProducts($page = 1, $limit = 9) {
        if(!isset($page) || !$page) {
            $page = 1;
        }

        if(!isset($limit) || !$limit) {
            $limit = 9;
        }

        $offset = ($page - 1) * $limit;

        $sql = "SELECT * FROM products INNER JOIN images ON products.product_image = images.image_id ORDER BY product_id DESC LIMIT ".$limit." OFFSET ".$offset;
        
        $products = find($sql);
        return $products;
    };
    function getProductsByCategory($categoryId, $page = 1, $limit = 9) {
        if(!isset($page) || !$page) {
            $page = 1;
        }
        if(!isset($limit) || !$limit) {
            $limit = 9;
        }
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM products INNER JOIN images ON products.product_image = images.image_id WHERE product_category = ".$categoryId." ORDER BY product_id DESC LIMIT ".$limit." OFFSET ".$offset;
        $products = find($sql);
        return $products;
    }
    function countProducts() {
        $sql = "SELECT count(product_id) as number_of_product FROM products";
        $numberOfProduct = find($sql);
        return $numberOfProduct;
    }
    function countProductsByCategory($categoryId) {
        $sql = "SELECT count(product_id) as number_of_product FROM products WHERE product_category = ".$categoryId;
        $numberOfProduct = find($sql);
        return $numberOfProduct;
    }
?>