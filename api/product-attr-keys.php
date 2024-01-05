<?php 
    include_once "../services/productAttribute.services.php";
    include_once "../utils/queryString.php";

    $productCategoryId = getQueryString("product-category-id");
    if(!isset($productCategoryId) || !$productCategoryId) {
        $productAttrKeys = getProductAttrKeys();
    }else {
        $productAttrKeys = getProductAttrKeysProductCategory($productCategoryId);
    }
    echo json_encode($productAttrKeys);
?>