<?php 
    $pageTitle = "Chi tiết sản phẩm";
    $pageDescription = "";
    $url = getQueryString('url');
    $urlArray = [];
    $productId = null;
    $productRes = null;
    $product = null;
    $productImagesListRes = null;
    $productImagesList = [];
    if(isset($url) && $url) {
        $urlArray = explode('.', $url);
    }
    if(count($urlArray) > 1 && isset($urlArray[1])) {
        $productId = $urlArray[1];
    }
    if(isset($productId) && $productId) {
        $sql = 
        "SELECT * FROM products 
        INNER JOIN images ON products.product_image = images.image_id 
        INNER JOIN product_images ON products.product_id = product_images.product_id 
        WHERE products.product_id = $productId";
        $sql2 = 
        "SELECT * FROM products 
        INNER JOIN product_images ON products.product_id = product_images.product_id 
        INNER JOIN images ON product_images.image_id = images.image_id 
        WHERE products.product_id = $productId";
        $productRes = findOne($sql);
        $productImagesListRes = find($sql2);
    }
    if(isset($productRes) && $productRes && $productRes['code'] === 200) {
        $product = $productRes['data'];
    }
    if(isset($productImagesListRes) && $productImagesListRes && $productImagesListRes['code'] == 200) {
        $productImagesList = $productImagesListRes['data'];
    }
    if(isset($product) && $product) {
        $pageTitle = $product['product_name'];
        $pageDescription = $product['product_description'];
    }
    include_once "inc/global/header.php";
?>
<pre>
   <?php print_r($product) ?>
</pre>
<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="index.html">Home</a>
                    <i>|</i>
                </li>
                <?php if(isset($pageTitle)) { ?>
                <li><?php echo $pageTitle; ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->

<!-- Single Page -->
<div class="banner-bootom-w3-agileits py-5">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h1 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <?php if(isset($pageTitle)) {
                echo $pageTitle;
            }else {
                echo "Chi tiết sản phẩm";
            } ?>
        </h1>
        <!-- //tittle heading -->
        <div class="row">
            <div class="col-lg-5 col-md-8 single-right-left ">
                <div class="grid images_3_of_2">
                    <div class="flexslider">
                        <ul class="slides">
                            <?php if(isset($productImagesList) && count($productImagesList) > 0) { ?>
                            <?php foreach($productImagesList as $image) { ?>
                            <li data-thumb="<?php echo $image['image_url'] ?>">
                                <div class="thumb-image">
                                    <img src="<?php echo $image['image_url'] ?>" data-imagezoom="true" class="img-fluid"
                                        alt="<?php echo $image['image_alt'] ?>"
                                        title="<?php echo $image['image_title'] ?>" loading="lazy">
                                </div>
                            </li>
                            <?php } ?>
                            <?php }else { ?>

                            <?php if(isset($product['image_url'])) { ?>
                            <li data-thumb="<?php echo $product['image_url'] ?>">
                                <div class="thumb-image">
                                    <img src="<?php echo $product['image_url'] ?>" data-imagezoom="true"
                                        class="img-fluid" alt="<?php echo $product['image_alt'] ?>">
                                </div>
                            </li>
                            <?php }else { ?>
                            <li>
                                <div class="thumb-image">
                                    Sản phẩm không có hình ảnh
                                </div>
                            </li>
                            <?php } ?>
                            <?php } ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 single-right-left simpleCart_shelfItem">
                <h2 class="mb-3">
                    <?php 
                        if(isset($pageTitle)) {
                            echo $pageTitle;
                        }else {
                            echo "Chi tiết sản phẩm";
                        }
                    ?>
                </h2>
                <p class="mb-3">
                    <span class="item_price">$200.00</span>
                    <del class="mx-2 font-weight-light">$280.00</del>
                    <label>Free delivery</label>
                </p>
                <div class="single-infoagile">
                    <ul>
                        <li class="mb-3">
                            Cash on Delivery Eligible.
                        </li>
                        <li class="mb-3">
                            Shipping Speed to Delivery.
                        </li>
                        <li class="mb-3">
                            EMIs from $655/month.
                        </li>
                        <li class="mb-3">
                            Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&C
                        </li>
                    </ul>
                </div>
                <div class="product-single-w3l">
                    <p class="my-3">
                        <i class="far fa-hand-point-right mr-2"></i>
                        <label>1 Year</label>Manufacturer Warranty
                    </p>
                    <ul>
                        <li class="mb-1">
                            3 GB RAM | 16 GB ROM | Expandable Upto 256 GB
                        </li>
                        <li class="mb-1">
                            5.5 inch Full HD Display
                        </li>
                        <li class="mb-1">
                            13MP Rear Camera | 8MP Front Camera
                        </li>
                        <li class="mb-1">
                            3300 mAh Battery
                        </li>
                        <li class="mb-1">
                            Exynos 7870 Octa Core 1.6GHz Processor
                        </li>
                    </ul>
                    <p class="my-sm-4 my-3">
                        <i class="fas fa-retweet mr-3"></i>Net banking & Credit/ Debit/ ATM card
                    </p>
                </div>
                <div class="occasion-cart">
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                        <form action="#" method="post">
                            <fieldset>
                                <input type="hidden" name="cmd" value="_cart" />
                                <input type="hidden" name="add" value="1" />
                                <input type="hidden" name="business" value=" " />
                                <input type="hidden" name="item_name" value="Samsung Galaxy J7 Prime" />
                                <input type="hidden" name="amount" value="200.00" />
                                <input type="hidden" name="discount_amount" value="1.00" />
                                <input type="hidden" name="currency_code" value="USD" />
                                <input type="hidden" name="return" value=" " />
                                <input type="hidden" name="cancel_return" value=" " />
                                <input type="submit" name="submit" value="Add to cart" class="button" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //Single Page -->
<?php 
    include_once "inc/global/footer.php";
    include_once "inc/global/script.php";
?>
<!-- imagezoom -->
<script src="js/imagezoom.js"></script>
<!-- //imagezoom -->
<!-- flexslider -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<script src="js/jquery.flexslider.js"></script>
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });
});
</script>
<!-- //FlexSlider-->