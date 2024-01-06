<?php 
    include_once "../services/products.services.php";
    include_once "../utils/queryString.php";
    $productCategoryId = getQueryString("product-category");

    $page = getQueryString("page");

    $url = $_SERVER['REQUEST_URI'];

    $parts = parse_url($url);

    parse_str($parts['query'], $query);

    $attrKeys = [];
    $attrValues = [];

    foreach($query as $key => $value) {
        if(strpos($key, 'filter_') !== false && $value) {
            $newKey = str_replace('filter_', '', $key);
            array_push($attrKeys, $newKey);
            array_push($attrValues, $value);
        }
    }

    if(!isset($page) || !$page) {
        $page = 1;
    }

    if(!isset($limit) || !$limit) {
        $limit = 9;
    }

    if(!isset($productCategoryId) || !$productCategoryId) {
        $products = getProducts($page, $limit, $attrKeys, $attrValues);
    }else {
        $products = getProductsByCategory($productCategoryId, $page, $limit, $attrKeys, $attrValues);
    }

    echo json_encode($products);
?>