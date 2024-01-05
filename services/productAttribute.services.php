<?php 
    include_once "../db/db.php";
    function getProductAttrKeys() {
        $sql = "SELECT * FROM attr_keys ORDER BY attr_key_name ASC";
        $productAttrKeys = find($sql);
        return $productAttrKeys;
    }
    function getProductAttrKeysProductCategory($productCategoryId) {
        $sql = 
        "SELECT products.product_id, attr_keys.attr_key_id, attr_keys.attr_key_name, attr_keys.attr_key_url 
        FROM Products 
        INNER JOIN product_attrs ON products.product_id = product_attrs.product_id 
        INNER JOIN attrs ON product_attrs.attr_id = attrs.attr_id 
        INNER JOIN attr_keys ON attrs.attr_key = attr_keys.attr_key_id 
        WHERE products.product_category = '$productCategoryId' 
        GROUP BY attrs.attr_key ORDER BY attr_keys.attr_key_name ASC";
        $productAttrKeys = find($sql);
        return $productAttrKeys;
    }
    function getProductAttrValues($productAttrKey) {
        $sql = 
        "SELECT * FROM attrs 
        INNER JOIN attr_values ON attrs.attr_value = attr_values.attr_value_id 
        WHERE attrs.attr_key = '$productAttrKey' 
        ORDER BY attr_values.attr_value_name ASC";
        $productAttrValues = find($sql);
        return $productAttrValues;
    }
    function getProductAttrValuesByProductCategory($productAttrKey, $productCategoryId) {
        $sql = 
        "SELECT products.product_id, attr_values.attr_value_id, attr_values.attr_value_name, attr_values.attr_value_url 
        FROM products 
        INNER JOIN product_attrs ON product_attrs.product_id = products.product_id 
        INNER JOIN attrs ON product_attrs.attr_id = attrs.attr_id  
        INNER JOIN attr_values ON attrs.attr_value = attr_values.attr_value_id 
        WHERE attrs.attr_key = '$productAttrKey' AND products.product_category = '$productCategoryId' 
        GROUP BY attr_values.attr_value_id ORDER BY attr_values.attr_value_name ASC";
        $productAttrValues = find($sql);
        return $productAttrValues;
    }
?>