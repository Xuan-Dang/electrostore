<?php
    $pageTitle = "Electro Store";
    $pageDescription = "";
    include_once "inc/global/header.php";
?>
<!-- banner -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <!-- Indicators-->
    <ol class="carousel-indicators" id="home-carousel-indicators"></ol>
    <div class="carousel-inner" id="home-banner__wrapper"></div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- //banner -->

<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>O</span>ur
            <span>N</span>ew
            <span>P</span>roducts
        </h3>
        <!-- //tittle heading -->
        <div class="row">
            <div class="agileinfo-ads-display col-lg-12">
                <div class="wrapper" id="home-products-by-category-section"></div>
            </div>
        </div>
    </div>
</div>
<?php 
    include_once "inc/global/footer.php";
?>
<script src="js/home/index.js"></script>