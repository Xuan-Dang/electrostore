<?php 
    include_once "../services/productAttribute.services.php";
    include_once "../utils/queryString.php";

    $productAttrKey = getQueryString("product-attr-key");
    $productCategory = getQueryString("product-category");

    if(!isset($productAttrKey) || !$productAttrKey) {
        $productAttrValues = [];
    }else {
        if(!isset($productCategory) || !$productCategory) {
            $productAttrValues = getProductAttrValues($productAttrKey);
        }else {
            $productAttrValues = getProductAttrValuesByProductCategory($productAttrKey, $productCategory);
        }
    }
    echo json_encode($productAttrValues);
?>