<?php 
    include_once "../services/products.services.php";
    include_once "../utils/queryString.php";
    $productCategoryId = getQueryString("product-category-id");

    $page = getQueryString("page");

    $url = $_SERVER['REQUEST_URI'];

    $parts = parse_url($url);

    parse_str($parts['query'], $query);

    if(!isset($page) || !$page) {
        $page = 1;
    }

    if(!isset($limit) || !$limit) {
        $limit = 9;
    }

    if(!isset($productCategoryId) || !$productCategoryId) {
        $products = getProducts($page, $limit);
    }else {
        $products = getProductsByCategory($productCategoryId, $page, $limit);
    }

    echo json_encode($products);
?>