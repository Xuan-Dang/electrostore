<?php 
    // include_once("../db/db.php");
    function getProducts($page = 1, $limit = 9, $productTermId = [1], $productTaxonomyId = []) {
        if(!isset($page) || !$page) {
            $page = 1;
        }

        if(!isset($limit) || !$limit) {
            $limit = 9;
        }

        $offset = ($page - 1) * $limit;

        // $sql = 
        // "SELECT * FROM products 
        // INNER JOIN images 
        // ON products.product_image = images.image_id 
        // WHERE products.parent_id = 0 
        // ORDER BY product_id DESC 
        // LIMIT ".$limit." OFFSET ".$offset;

        $productTermIdString = implode(",",$productTermId);
        $productTaxonomyIdString = implode(", ",$productTaxonomyId);

        $testSql = 
        "SELECT * FROM product_attributes ".
        "INNER JOIN products ON product_attributes.product_id = products.product_id ".
        "INNER JOIN images ON products.product_image = images.image_id ".
        "WHERE product_attributes.product_term_id IN (".$productTermIdString.") ".
        "AND product_attributes.product_taxonomy_id IN (".$productTaxonomyIdString.")";

        $products = find($testSql);
        echo "<pre>";
        print_r($products);
        echo "</pre>";
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
        $sql = "SELECT * FROM products INNER JOIN images ON products.product_image = images.image_id WHERE products.parent_id = 0 AND products.product_category = ".$categoryId." ORDER BY product_id DESC LIMIT ".$limit." OFFSET ".$offset;
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