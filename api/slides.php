<?php 
    include_once "../services/slides.services.php";
    $slides = getAllSlide();
    echo json_encode($slides);
?>