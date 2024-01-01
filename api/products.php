<?php 
    include_once "../services/products.services.php";
    include_once "../utils/queryString.php";
    $productCategoryId = getQueryString("product-category-id");
    $page = getQueryString("page");
    if(!isset($page) || !$page) {
        $page = 1;
    }
    if(!isset($productCategoryId) || !$productCategoryId) {
        $products = getProducts($page);
    }else {
        $products = getProductsByCategory($productCategoryId, $page);
    }
    echo json_encode($products);
?>