<?php 
    include_once "../services/products.services.php";
    include_once "../utils/queryString.php";
    $productCategoryId = getQueryString("product-category-id");
    if(!isset($productCategoryId) || !$productCategoryId) {
        $numberOfProduct = countProducts();
    }else {
        $numberOfProduct = countProductsByCategory($productCategoryId);
    }
    echo json_encode($numberOfProduct);
?>