<?php 
    include_once "../db/db.php";
    function getAllProductAttributes() {
        $sql = 
        "SELECT products.product_id, ". 
        "terms.term_id, terms.term_name, terms.term_url, ".
        "term_taxonomy.term_taxonomy_id, term_taxonomy.term_taxonomy_name, term_taxonomy.term_taxonomy_url, ".
        "product_attributes.product_term_id ".
        "FROM products ". 
        "INNER JOIN product_attributes ON products.product_id = product_attributes.product_id ".
        "INNER JOIN term_taxonomy ON product_attributes.product_taxonomy_id = term_taxonomy.term_taxonomy_id ".
        "INNER JOIN terms ON term_taxonomy.term_id = terms.term_id ".
        "ORDER BY term_taxonomy.term_taxonomy_name ASC";
        $productsAttributes = find($sql);
        return $productsAttributes;
    }
    function getProductsAttributesByProductCategory($productCategoryId) {
        $sql =
        "SELECT products.product_id, ".
        "terms.term_id, terms.term_name, terms.term_url, ".
        "term_taxonomy.term_taxonomy_id, term_taxonomy.term_taxonomy_name, term_taxonomy.term_taxonomy_url, ".
        "product_attributes.product_term_id ".
        "FROM products ".
        "INNER JOIN product_attributes ON products.product_id = product_attributes.product_id ".
        "INNER JOIN term_taxonomy ON product_attributes.product_taxonomy_id = term_taxonomy.term_taxonomy_id ".
        "INNER JOIN terms ON term_taxonomy.term_id = terms.term_id ".
        "WHERE products.product_category = ". $productCategoryId." ".
        "ORDER BY term_taxonomy.term_taxonomy_name ASC";
        $productsAttributes = find($sql);
        return $productsAttributes;
    }
?>