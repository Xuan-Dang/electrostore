<?php
    $url = getQueryString("url");
    if(!isset($url) || !$url) {
        $pageTitle = "Sản phẩm";
        $pageDescription = "";
    }else {
        $urlArray = explode(".", $url);
        if(!isset($urlArray[1])) {
            echo "Id không hợp lệ";
            exit();
        }
        $id = $urlArray[1];
        $sql = "SELECT product_category_name, product_category_description FROM product_categories WHERE product_category_id = ".$id;
        $productCategory = findOne($sql);
        if($productCategory['code'] !== 200) {
            echo $productCategory['message'] ;
            exit();
        }
        if(!$productCategory['data']) {
            $pageTitle = "404";
            $pageDescription = "";
        }else {
            $pageTitle = $productCategory['data']['product_category_name'];
            $pageDescription = $productCategory['data']['product_category_description'];
        }
    }
    include_once("inc/global/header.php");
?>

<!-- banner-2 -->
<div class="page-head_agile_info_w3l">

</div>
<!-- //banner-2 -->
<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="index.html">Home</a>
                    <i>|</i>
                </li>
                <li><?php echo $pageTitle ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3"><?php echo $pageTitle ?></h3>
        <!-- //tittle heading -->
        <div class="row">
            <!-- product left -->
            <div class="agileinfo-ads-display col-lg-9">
                <div class="wrapper">
                    <!-- first section -->
                    <div class="product-sec mb-4">
                        <div class="row" id="products-row">
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <button class="btn btn-primary d-none" id="products-loadmore-btn">Xem thêm</button>
                        </div>
                    </div>
                    <!-- //first section -->
                </div>
            </div>
            <!-- //product left -->
            <?php include_once "inc/product/sidebar.php" ?>
        </div>
    </div>
</div>
<!-- //top products -->
<?php  
    include_once("inc/global/footer.php");
    include_once("inc/global/script.php");
?>

<script src="js/products/index.js"></script>
<script>
document.addEventListener("DOMContentLoaded", async () => {
    <?php if(isset($id)) { ?>
    let productCategoryId = <?php echo $id ?>;
    <?php }else{ ?>
    let productCategoryId = "";
    <?php } ?>

    function setPage(page) {
        return page;
    }

    let page = setPage(1);

    let limit = 9;

    await renderProducts(productCategoryId, page, limit);

    await renderLoadmoreProductsBtn(productCategoryId, page, limit, setPage);
})
</script>
<script>
document.addEventListener("DOMContentLoaded", async () => {
    const productsSidebar = document.getElementById("products-sidebar")
    <?php if(isset($id)) { ?>
    let productCategoryId = <?php echo $id ?>;
    <?php }else{ ?>
    let productCategoryId = "";
    <?php } ?>
    const res = await getData(`api/product-attributes.php?product-category-id=${productCategoryId}`);
    if (res.code !== 200) return productsSidebar.innerHTML = "Đã có lỗi xả ra";
    const productAttributes = res.data;
    // const acc = {}
    // productAttributes.forEach((item) => {
    //     if(!acc[item.term_name]) {
    //         acc[item.term_name] = [];
    //     }
    //     acc[item.term_name].push(item)
    // })
    console.log("productAttributes: ", productAttributes)
    const news = productAttributes.reduce((acc, value) => {
        console.log("value: ", value)
        console.log("acc: ", acc)
        if (!acc[value.term_name]) {
            acc[value.term_name] = []
        }
        acc[value.term_name].push({
            term_taxonomy_id: value.term_taxonomy_id,
            term_taxonomy_name: value.term_taxonomy_name
        })
        return acc;
    }, {})
    console.log("news: ", news);
})
</script>