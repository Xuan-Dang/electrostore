<?php 
    include_once "../services/products.services.php";
    include_once "../utils/queryString.php";
    $productCategoryId = getQueryString("product-category");

    $url = $_SERVER['REQUEST_URI'];

    $parts = parse_url($url);

    if(isset($parts['query'])) {
        parse_str($parts['query'], $query);
    }

    $attrKeys = [];
    $attrValues = [];

    if(isset($query)) {
        foreach($query as $key => $value) {
            if(strpos($key, 'filter_') !== false && $value) {
                $newKey = str_replace('filter_', '', $key);
                array_push($attrKeys, $newKey);
                array_push($attrValues, $value);
            }
        }
    }

    if(!isset($productCategoryId) || !$productCategoryId) {
        $numberOfProduct = countProducts($attrKeys, $attrValues);
    }else {
        $numberOfProduct = countProductsByCategory($productCategoryId, $attrKeys, $attrValues);
    }
    echo json_encode($numberOfProduct);
?>