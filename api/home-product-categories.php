<?php 
 include_once "../services/home.services.php";
 $productCategories = getProductCategory();
 echo json_encode($productCategories);
?>