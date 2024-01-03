<?php 
    include_once "../services/productAttribute.services.php";
    include_once "../utils/queryString.php";
    $productCategoryId = getQueryString("product-category-id");
    if(!isset($productCategoryId) || !$productCategoryId) {
        $productAttributes = getAllProductAttributes();
    }else {
        $productAttributes = getProductsAttributesByProductCategory($productCategoryId);
    }
    if($productAttributes['code'] !== 200) {
        $response = $productAttributes;
        echo json_encode($response);
    }else {
        $newData = [];
        foreach($productAttributes['data'] as $item) { 
            $newData[$item['term_name']][] = ['term_taxonomy_id' => $item['term_taxonomy_id'], 'term_taxonomy_name' => $item['term_taxonomy_name']];
        };
        foreach($newData as $key => $value) {
            $newData[$key] = array_values(array_unique($value, SORT_REGULAR));
        }
        echo json_encode(['code' => 200, 'message' => 'Get product attributes success', 'data' => $newData]);
    }
?>