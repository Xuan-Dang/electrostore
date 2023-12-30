<?php 
    include_once "../services/home.services.php";
    include_once "../utils/queryString.php";
    $categoryId = getQueryString("category-id");
    if(!isset($categoryId) || !$categoryId) return array("code" => 400, "message" => "ID danh mục sản phẩm không hợp lệ");
    $products = getProductsByCategory($categoryId);
    echo json_encode($products);
?>