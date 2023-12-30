<?php 
    include_once "../services/products.services.php";
    include_once "../utils/queryString.php";
    $productCategoryId = getQueryString("product-category-id");
    if(!isset($productCategoryId) || !$productCategoryId) {
        $products = getProducts();
    }else {
        $products = getProductsByCategory($productCategoryId);
    }
    echo json_encode($products);
?>