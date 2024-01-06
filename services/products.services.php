<?php 
    include_once("../db/db.php");
    function getProducts($page = 1, $limit = 9, $attrKeys = [], $attrValues = []) {
        if(!isset($page) || !$page) {
            $page = 1;
        }

        if(!isset($limit) || !$limit) {
            $limit = 9;
        }

        $offset = ($page - 1) * $limit;

        $sql = 
        "SELECT * FROM products ".
        "INNER JOIN images ".
        "ON products.product_image = images.image_id ".
        "WHERE products.parent_id = 0 ".
        "ORDER BY product_id DESC ".
        "LIMIT ".$limit." OFFSET ".$offset;

        if(count($attrKeys) > 0 && count($attrValues) > 0) {
            $numberOfAttrKey = count($attrKeys);
            $attrKeysString = implode(",", $attrKeys);
            $attrValuesString = implode(",", $attrValues);
            $sql = 
            "SELECT * FROM products 
            INNER JOIN attrs ON attrs.attr_key IN ($attrKeysString) AND attrs.attr_value IN ($attrValuesString) 
            INNER JOIN product_attrs ON product_attrs.attr_id = attrs.attr_id 
            INNER JOIN images ON products.product_image = images.image_id 
            WHERE products.product_id = product_attrs.product_id 
            GROUP BY product_attrs.product_id HAVING COUNT(DISTINCT attr_key) = $numberOfAttrKey 
            ORDER BY products.product_id DESC LIMIT $limit OFFSET $offset";
        }
        
        $products = find($sql);

        return $products;
    };

    function getProductsByCategory($categoryId, $page = 1, $limit = 9, $attrKeys = [], $attrValues = []) {
        if(!isset($page) || !$page) {
            $page = 1;
        }
        
        if(!isset($limit) || !$limit) {
            $limit = 9;
        }

        $offset = ($page - 1) * $limit;

        $sql =
        "SELECT * FROM products ".
        "INNER JOIN images ON products.product_image = images.image_id ".
        "WHERE products.parent_id = 0 ". 
        "AND products.product_category = ".$categoryId." ".
        "ORDER BY product_id DESC LIMIT ".$limit." OFFSET ".$offset;

        if(count($attrKeys) > 0 && count($attrValues) > 0) {
            $numberOfAttrKey = count($attrKeys);
            $attrKeysString = implode(",", $attrKeys);
            $attrValuesString = implode(",", $attrValues);
            $sql = 
            "SELECT * FROM products 
            INNER JOIN attrs ON attrs.attr_key IN ($attrKeysString) AND attrs.attr_value IN ($attrValuesString) 
            INNER JOIN product_attrs ON product_attrs.attr_id = attrs.attr_id 
            INNER JOIN images ON products.product_image = images.image_id 
            WHERE products.product_id = product_attrs.product_id AND products.product_category = $categoryId 
            GROUP BY product_attrs.product_id HAVING COUNT(DISTINCT attr_key) = $numberOfAttrKey 
            ORDER BY products.product_id DESC LIMIT $limit OFFSET $offset";
        }

        $products = find($sql);

        return $products;
    }

    function countProducts($attrKeys = [], $attrValues = []) {
        $sql = "SELECT count(product_id) as number_of_product FROM products";

        if(count($attrKeys) > 0 && count($attrValues) > 0) {
            $numberOfAttrKey = count($attrKeys);
            $attrKeysString = implode(",", $attrKeys);
            $attrValuesString = implode(",", $attrValues);
            $sql = 
            "SELECT count(products.product_id) as number_of_product FROM products 
            INNER JOIN attrs ON attrs.attr_key IN ($attrKeysString) AND attrs.attr_value IN ($attrValuesString) 
            INNER JOIN product_attrs ON product_attrs.attr_id = attrs.attr_id 
            WHERE products.product_id = product_attrs.product_id 
            HAVING COUNT(DISTINCT attr_key) = $numberOfAttrKey";
        }

        $numberOfProduct = find($sql);

        return $numberOfProduct;
    }

    function countProductsByCategory($categoryId, $attrKeys = [], $attrValues = []) {
        $sql = "SELECT count(product_id) as number_of_product FROM products WHERE product_category = ".$categoryId;

        if(count($attrKeys) > 0 && count($attrValues) > 0) {
            $numberOfAttrKey = count($attrKeys);
            $attrKeysString = implode(",", $attrKeys);
            $attrValuesString = implode(",", $attrValues);
            $sql = 
            "SELECT count(products.product_id) as number_of_product FROM products 
            INNER JOIN attrs ON attrs.attr_key IN ($attrKeysString) AND attrs.attr_value IN ($attrValuesString) 
            INNER JOIN product_attrs ON product_attrs.attr_id = attrs.attr_id 
            WHERE products.product_id = product_attrs.product_id AND products.product_category = $categoryId 
            HAVING COUNT(DISTINCT attr_key) = $numberOfAttrKey";
        }

        $numberOfProduct = find($sql);

        return $numberOfProduct;
    }
?>