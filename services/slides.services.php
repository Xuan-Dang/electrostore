<?php 
    include_once "../db/db.php";
    function getAllSlide() {
        $sql = "SELECT * FROM slides INNER JOIN images ON slides.slide_image = images.image_id ORDER BY slides.slide_id ASC";
        $response = find($sql);
        return $response;
    }
?>