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
    $productAttributesRes = null;
    $productAttributes = null;
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
        $sql3 = 
        "SELECT attr_keys.attr_key_name, attr_values.attr_value_name FROM products 
        INNER JOIN product_attrs ON products.product_id = product_attrs.product_id 
        INNER JOIN attrs ON product_attrs.attr_id = attrs.attr_id 
        INNER JOIN attr_keys ON attrs.attr_key = attr_keys.attr_key_id 
        INNER JOIN attr_values ON attrs.attr_value = attr_values.attr_value_id 
        WHERE products.product_id = $productId";
        $productRes = findOne($sql);
        $productImagesListRes = find($sql2);
        $productAttributesRes = find($sql3);
    }
    if(isset($productRes) && $productRes && $productRes['code'] === 200) {
        $product = $productRes['data'];
    }
    if(isset($productImagesListRes) && $productImagesListRes && $productImagesListRes['code'] === 200) {
        $productImagesList = $productImagesListRes['data'];
    }
    if(isset($productAttributesRes) && $productAttributesRes && $productAttributesRes['code'] === 200) {
        $productAttributes = $productAttributesRes['data'];
    }
    if(isset($product) && $product) {
        $pageTitle = $product['product_name'];
        $pageDescription = $product['product_description'];
    }
    include_once "inc/global/header.php";
?>
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
<div class="banner-bootom-w3-agileits">
    <div class="container py-xl-4 py-lg-2">
        <div class="row">
            <?php if($product):  ?>
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
                <h1 class="mb-3">
                    <?php 
                        if(isset($pageTitle)) {
                            echo $pageTitle;
                        }else {
                            echo "Chi tiết sản phẩm";
                        }
                    ?>
                </h1>
                <p id="#price-group">
                    <?php if($product['product_max_price'] > 0):  ?>
                        <span class="item_price price-group__item"><?php echo $product['product_min_price'] ?></span>
                        <del class="mx-2 font-weight-light price-group__item"><?php echo $product['product_max_price'] ?></del>
                    <?php else: ?>
                        <span class="item_price price-group__item"><?php echo $product['product_min_price'] ?></span>
                    <?php endif; ?>
                </p>
                <?php if(isset($productAttributes) && $productAttributes): ?>
                <div class="product-single-w3l py-2 border-0">
                    <ul>
                        <?php foreach($productAttributes as $attr): ?>
                            <li class="mb-1">
                                <?php echo $attr['attr_key_name']; ?> : <?php echo $attr['attr_value_name'] ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
				</div>
                <?php endif; ?>
                <div class="single-infoagile py-2 border-top">
                    <?php echo $product['product_description'] ?>
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
                                <input type="submit" name="submit" value="Thêm vào giỏ" class="button" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <?php else: ?>
                <div class="col-lg-12 col-md-12 single-right-left ">
                    Không tìm thấy sản phẩm
                </div>
            <?php endif; ?>
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
<script>
    $(document).ready(function() {
        $(".price-group__item").each(function(index, item) {
            $(item).text(formatPrice($(item).text()));
        })
    })
</script>