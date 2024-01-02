<?php 
    include_once "../services/productAttribute.services.php";
    include_once "../utils/queryString.php";
    $productCategoryId = getQueryString("product-category-id");
    if(!isset($productCategoryId) || !$productCategoryId) {
        $productAttributes = getAllProductAttributes();
    }else {
        $productAttributes = getProductsAttributesByProductCategory($productCategoryId);
    }
    echo json_encode($productAttributes);
?>