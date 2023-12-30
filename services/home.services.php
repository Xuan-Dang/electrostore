<?php 
    include_once "../db/db.php";
    function getProductCategory() {
        $sql = "SELECT * FROM product_categories ORDER BY product_category_id DESC";
        $response = find($sql);
        return $response;
    }
    function getProductsByCategory($categoryId) {
        $sql = "SELECT * FROM products INNER JOIN images ON products.product_image = images.image_id WHERE products.product_category = ".$categoryId. " ORDER BY products.product_id DESC LIMIT 3";
        $response = find($sql);
        return $response;
    }
?>